<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


trait StorageDeleteModelTrail{
    public function deleteTrait($id, $model){
        try{
            $model->find($id)->delete();
            return response()->json([
              'code'=>200,
              'message'=>'seccess'
            ], 200);
          }catch( \Exception $excep)
          {
            Log::error('Mess: '. $excep->getMessage() . 'Line: '.$excep->getLine());
            return response()->json([
              'code'=>500,
              'message'=>'fail'
            ], 500);
          }
    }
}