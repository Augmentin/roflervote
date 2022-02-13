<?php

use Illuminate\Http\Request;

class BetweenTwo extends \App\Http\Controllers\Controller
{
    public function getList(Request $request ){
        $count = $request->get("count");
        $count = (int)$count;
        $collection = $request->get("collection");
        $collectionCount =
        if($count > 64 ){
            $count = 64;
        }
        if($count < 8){
            $count = 8;
        }
    }
}