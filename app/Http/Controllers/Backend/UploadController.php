<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //
    public function doUpload(Request $request)
    {
        $jenis = $request->get('jenis');
        $file = $request->file('file');
        $filename = $file->store('public/'.$jenis);
        // $filename = $file->store('public');

        $filename = str_replace('public', 'storage', $filename);
        $asset = asset($filename);
        return response()->json([
                'initialPreview' => ["<img src='$asset' class='file-preview-image kv-preview-data' style='width: auto; height: auto; max-width: 100%; max-height: 100%; image-orientation: from-image;' alt='$jenis' />"], // the thumbnail preview data (e.g. image)
                'initialPreviewConfig' => [
                    [
                        // 'caption' => 'Kartu Keluarga', // caption
                        'width' => '120px',
                        'url'=> '', // server delete action
                        'key'=> 100
                    ]
                ],
                'append' => true,
                'filename' =>str_replace('public/', 'storage/', $filename)
            ]
        );
    }
}
