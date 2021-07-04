
@servers(['web' => $production])

@setup
    $releases_dir = $appdir . '/releases';
    $release = date('YmdHis');
    $new_release_dir = $releases_dir .'/'. $release;
@endsetup

@story('deploy')
    clone_repository
    run_composer
    install_front
    cleanup_devfiles
    update_symlinks
    rebuild_cache
@endstory

@task('clone_repository')
    echo 'Cloning repository'
    [ -d {{ $releases_dir }} ] || mkdir {{ $releases_dir }}
    git clone --depth 1 {{ $repository }} {{ $new_release_dir }}
    cd {{ $new_release_dir }}
    git reset --hard {{ $commit }}
@endtask

@task('run_composer')
    echo "Starting deployment ({{ $release }})"
    cd {{ $new_release_dir }}
    mkdir -p {{ $appdir }}/current/vendor
    cp -R {{ $appdir }}/current/vendor {{ $new_release_dir }}/
    composer install --prefer-dist --no-scripts -q -o
@endtask

@task('install_front')
    echo "Installing frontend..."
    mkdir -p {{ $appdir }}/current/node_modules
    cp -R {{ $appdir }}/current/node_modules {{ $new_release_dir }}/
    cd {{ $new_release_dir }}
    npm install
    npm run production
@endtask

@task('update_symlinks')
    echo "Linking storage directory"
    rm -rf {{ $new_release_dir }}/storage
    ln -nfs {{ $appdir }}/storage {{ $new_release_dir }}/storage

    echo 'Linking .env file'
    ln -nfs {{ $appdir }}/.env {{ $new_release_dir }}/.env

    echo 'Rsync current release'
    rsync -rl --delete {{ $new_release_dir }}/ {{ $appdir }}/current/

    echo 'Cleanup temporary dir'
    rm -rf {{ $new_release_dir }}
@endtask


@task('cleanup_devfiles')
    echo "Cleanup dev files"
    find  {{ $new_release_dir }} -type f -name ".git*" -exec rm {} \;
    find  {{ $new_release_dir }} -type d -name ".idea" -prune -exec rm -rf {} \;
    find  {{ $new_release_dir }} -type d -name ".git" -prune -exec rm -rf {} \;
    find  {{ $new_release_dir }} -type f -iname "README.md" -exec rm {} \;
    rm -rf {{ $new_release_dir }}/tests
    rm -rf {{ $new_release_dir }}/.env.example
    rm -rf {{ $new_release_dir }}/docker-compose.yml
    rm -rf {{ $new_release_dir }}/package.json
    rm -rf {{ $new_release_dir }}/.styleci.yml
    rm -rf {{ $new_release_dir }}/phpunit.xml
    rm -rf {{ $new_release_dir }}/.gitlab-ci.yml
    rm -rf {{ $new_release_dir }}/webpack.mix.js
    rm -rf {{ $new_release_dir }}/Envoy.blade.php
    rm -rf {{ $new_release_dir }}/server.php
    mkdir -p {{ $appdir }}/storage/framework
    mkdir -p {{ $appdir }}/storage/framework/cache
    mkdir -p {{ $appdir }}/storage/framework/sessions
    mkdir -p {{ $appdir }}/storage/framework/views
    chgrp -R www-data {{ $new_release_dir }}/
@endtask

@task('rebuild_cache')
    php {{ $appdir }}/current/artisan migrate
    php {{ $appdir }}/current/artisan route:clear
    php {{ $appdir }}/current/artisan route:cache
    php {{ $appdir }}/current/artisan view:clear
    php {{ $appdir }}/current/artisan view:cache
@endtask
