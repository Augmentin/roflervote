<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
