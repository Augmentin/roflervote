<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Collection extends Model
{
    use HasFactory;
    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'collections';

    /**
     * Get all music
     */
    public function getSongs()
    {
        return $this->hasManyThrough(Music::class, MusicCollectionRelations::class,
        'collection' , 'id', 'id' , 'music'
        );
    }

    public function image(){
        return $this->hasOne(CollectionsImage::class , "id" , "image");
    }

    /**
     * @return Builder
     */
    public static function getPubicCollections(){
        return \App\Models\Collection::withImage()->where("isPublic" , true);
    }

    /**
     * @return Builder
     */
    public static function withImage(){
        return \App\Models\Collection::select(['collections.*' ,  'images_collections.id as image_id', 'images_collections.name as image_name'])->leftJoin('images_collections', 'images_collections.id' , '=' , 'collections.image' );
    }

}
