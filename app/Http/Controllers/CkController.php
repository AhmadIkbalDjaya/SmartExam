<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkController extends Controller
{
    public function ckUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('ckeditor');

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/' . $fileName);
            $msg = "image upload successfully";
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
