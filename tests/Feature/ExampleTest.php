<?php

namespace Tests\Feature;

use App\Models\Collection;
use App\Models\Music;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $s = $this->get('/kek/collection/image/c4e95e4c-9294-11ec-9b8b-c257c2e88d7b');
        $file = new UploadedFile(__DIR__ . "/ing/CD-mp3-russe-самые-яркие-Русские-хиты-за.jpeg"
            , "123", filesize(__DIR__ . "/ing/CD-mp3-russe-самые-яркие-Русские-хиты-за.jpeg"), null,
            true);

        $this->post("/kek/collection/image/" ,
            ["image"=> $file],
            ["application-type:multipart/form-data"] );
        $sss = new \App\Http\Controllers\Vote\Collection();
        $t = $sss->getMusic(2 , new Request(['id' => 2]));
        $t = $sss->getCollectionsInfo(new Request());
        $collection = Collection::find(2);
        $r = $collection->getSongs()->limit(8)->inRandomOrder()->get();
        $image = $collection->image()->get()->toArray();
        $s = $this->get("/list" );
        $music = Music::where("collection" , 1);
        $e = User::all();


        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
