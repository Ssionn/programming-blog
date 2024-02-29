<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;

class UploadController extends Controller
{
    public function store($id)
    {
        if (request()->hasFile('avatar')) {
            $file = request()->file('avatar');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('avatars/tmp/' . $folder, $filename, ['disk' => 'public']);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
                'post_id' => $id,
            ]);

            return $folder;
        }

        return '';
    }
}
