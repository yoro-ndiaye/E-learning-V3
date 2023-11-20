<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporalyImage;
use Illuminate\Support\Facades\Storage;


class TemporalyImageController extends Controller
{

    public function store(Request $request){



        if ($request->hasFile('tachefile')) {
            $file=$request->file('tachefile');
            $fileName=$file->getClientOriginalName();
            $folder=uniqid('tachefile-',true);
            $file->move('imagestmp/tmp/'.$folder,$fileName);

            TemporalyImage::create([
                'folder'=>$folder,
                'file'=>$fileName
            ]);
            return $folder;
        }
        return '';
    }

    public function deletetmpfile(){
        $temporaryImage = TemporalyImage::where('folder', request()->getContent())->first();

        if ($temporaryImage) {
                Storage::deleteDirectory('imagestmp/tmp/'.$temporaryImage->folder);
                $temporaryImage->delete();

        }
        return response()->noContent();
    }

}
