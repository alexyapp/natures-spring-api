<?php

namespace App\Http\Controllers\Api;

use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    /**
     * Upload an image.
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->extension();
            $filename = time() . '.' . $extension;
            $path = public_path('uploads');
    
            $img = Image::make($file);

            if ($img->width() > $img->height()) { // portrait
                $img->resize(1024, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $img->save($path . '/' . $filename);
            } else { // landscape
                $img->resize(null, 850, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $img->save($path . '/' . $filename);
            }
    
            return response()->json([
                'filepath' => config('app.url') . '/uploads/' . $filename,
                'filename' => $filename,
                'message' => 'Image uploaded successfully.'
            ]);
        }
    }
}
