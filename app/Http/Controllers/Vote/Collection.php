<?php

namespace App\Http\Controllers\Vote;


use Illuminate\Http\Request;

class Collection extends \App\Http\Controllers\Controller
{
    public function getMusic( $id , Request $request  ){
        $limit = $request->get("limit");
        $limit = (int)$limit;


        if($limit < config('music.default.limit')){
            $limit = config('music.default.limit');
        }
        $collection = \App\Models\Collection::find($id);
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
}