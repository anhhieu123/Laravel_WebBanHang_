<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait{
    public function storageTraitUpload(Request $request, $fileName,$foderName){
        if($request->hasFile($fileName)){
            $file = $request->$fileName;
            $fileNameOriginal= $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' .$file->getClientOriginalExtension();
            $path = $request->file($fileName)->storeAs('public/'. $foderName .'/'.auth()->id(),$fileNameHash);
            $dataUploadTrait=[
                'file_name'=>$fileNameOriginal,
                'file_path'=> Storage::url($path),
            ];
            return $dataUploadTrait;
        }
        return null;     
    }

    public function storageTraitUploadMuti($file,$foderName){
        $fileNameOriginal= $file->getClientOriginalName();
        $fileNameHash = Str::random(20) . '.' .$file->getClientOriginalExtension();
        $path = $file->storeAs('public/'. $foderName .'/'.auth()->id(),$fileNameHash);
        $dataUploadTrait=[
            'file_name'=>$fileNameOriginal,
            'file_path'=> Storage::url($path),
        ];
        return $dataUploadTrait;
 
    }
}
?>

