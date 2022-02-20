<?php

namespace App\Http\Controllers\Vote;



use Illuminate\Database\Eloquent\Builder;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Ramsey\Uuid\Uuid;
use Image;
class Collection extends \App\Http\Controllers\Controller
{
    public function getMusic( $id , Request $request  ){
        $limit = $request->get("limit");
        $limit = (int)$limit;


        if($limit < config('music.default.limit')){
            $limit = config('music.default.limit');
        }
        $collection = \App\Models\Collection::withImage()->where( 'collections.id'  , $id)->first();
        $music = collect();
        if($collection instanceof \App\Models\Collection){
            $songs = $collection->getSongs()->limit($limit)->inRandomOrder()->get();
            $music->put("collection" , $collection->toArray());
            $music->put("songs" , $songs->toArray());
        }

        return response()->json([
            "data" => $music,
        ]);
    }


    public function getCollectionsInfo(Request $request){
        /** @var Builder $collections */
        $result = \App\Models\Collection::getPubicCollections()->get();
        return response()->json([
            "data" => $result->toArray(),
        ]);
    }


    public function getMainView(Request $request){

        $result = \App\Models\Collection::getPubicCollections()->get();
        return view('layouts.main',  ["collections" => $result->toArray()]);
    }


    public function postImage(Request $request){
        if($request->hasFile("image")){
            $size = $request->file('image')->getSize();
            $request->file('image')->storeAs('/images/collections', Uuid::uuid1());
        }
    }

    public function getImage($id , Request $request){
        $path = storage_path('app/images/collections/') .$id;
        $url = Storage::url('images/collections/' .$id);
        if (Storage::exists('images/collections/' .$id)) {
            $img = Image::make($path);
            $img->resize(200, 200);

            return $img->response();
        }

    }
}