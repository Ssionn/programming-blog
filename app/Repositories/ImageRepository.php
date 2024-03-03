<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ImageRepository
{
    public function storeImagesInArray($postId): array
    {
        $images = DB::table('temporary_files')
            ->where('post_id', $postId)
            ->select('folder', 'filename')
            ->get();

        $imagesArray = [];

        foreach ($images as $image) {
            $imagesArray[] = [
                'post_id' => $postId,
                'folder' => $image->folder,
                'filename' => $image->filename,
                'path' => asset('storage/avatars/tmp/' . $image->folder . '/' . $image->filename),
                'extension' => pathinfo($image->filename, PATHINFO_EXTENSION),
            ];
        }

        return $imagesArray;
    }
}
