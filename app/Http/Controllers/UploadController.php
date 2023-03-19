<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request){
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $filename=$file->getClientOriginalName();
            $folder=uniqid().'-'.now()->timestamp;
            $file->storeAs('upload/tmp'.$folder,$filename);
            return $folder;

        }

        return '';
    }
}
