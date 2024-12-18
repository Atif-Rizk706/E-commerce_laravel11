<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait ImageUploadTrait
{

    public function saveImage(Request $request, $folder)
    {
        // Check if the request has a file named 'image'
        if ($request->hasFile('image')) {

            return $request->file('image')->store($folder, 'public');
        }

        return null;
    }
}
