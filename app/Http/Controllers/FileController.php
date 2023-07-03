<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $fileName = $request->input('fileName');
        $file = $request->file('file');

        if ($file->getSize() > 100 * 1024) {
            return response('File size exceeds 100KB', 500);
        }

        $file->storeAs('', $fileName, 'uploads');

        return response('File uploaded', 201);
    }

    public function download(Request $request)
    {
        $fileName = $request->input('fileName');

        if (!Storage::disk('uploads')->exists($fileName)) {
            return response('File not found', 404);
        }

        return response()->download(storage_path('app/uploads/' . $fileName));
    }
}
