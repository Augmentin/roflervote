<?php
namespace App\Http\Controllers\Vote;
use Illuminate\Http\Request;

class BetweenTwo extends \App\Http\Controllers\Controller
{
    public function getList(Request $request ){
        $limit = $request->get("limit");
        $limit = (int)$limit;
        $collection = $request->get("collection");
        if(is_null($collection)){
            $collection = config('music.default.collection');
        }

        if($limit < config('music.default.limit')){
            $limit = config('music.default.limit');
        }
        /** @var Illuminate\Database\Eloquent\Builder $music */
        $music = \App\Models\Music::where("collection" ,$collection);

        $music = $music->limit($limit)->inRandomOrder()->get();
        return response()->json([
           "data" => $music,
        ]);
    }
}