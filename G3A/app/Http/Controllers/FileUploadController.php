<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{

    //essaie de l'implémentation de cloudinary
    public function showUploadForm()
    {
        return view('upload');
    }

    public function storeUploads(Request $request) // envoyer des images à cloudinary
    {
        cloudinary()->upload(request()->file('file')->getRealPath())->getSecurePath();

        return back()
            ->with('success', 'File uploaded successfully');
    }
}
