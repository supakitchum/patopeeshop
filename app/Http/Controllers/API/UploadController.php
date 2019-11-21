<?php

namespace App\Http\Controllers\API;

use App\Model\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function add(Request $request,$pid){
        $targetDir = '/uploads';
        $index =  $request->input('chunkIndex');          // the current file chunk index
        $totalChunks = $request->input('chunkCount');
        try{
            $file = $request->file('fileBlob');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = uniqid().'_'. time() . '.' . $extension;
            $targetFile = $targetDir.'/'.$filename;  // your target file path
            if ($totalChunks > 1) {                  // create chunk files only if chunks are greater than 1
                $targetFile .= '_' . str_pad($index, 4, '0', STR_PAD_LEFT);
            }
            if ($file->move('uploads/', $filename)) {
                $chunks = glob("{$targetDir}/{$filename}_*");
                $allChunksUploaded = $totalChunks > 1 && count($chunks) == $totalChunks;
                if ($allChunksUploaded) {           // all chunks were uploaded
                    $outFile = $targetDir.'/'.$filename;
                    // combines all file chunks to one file
                    combineChunks($chunks, $outFile);
                }
                ProductImage::create([
                    'pid' => $pid,
                    'path' => 'uploads/'.$filename
                ]);
                $fileId = 1; // some unique key to identify the file
                $config[] = [
                    'type' => 'image',      // check previewTypes (set it to 'other' if you want no content preview)
                    'fileId' => $fileId,    // file identifier
                    'size' => 5000,    // file size
                    'key' => $fileId,
                    'caption' => $filename,
                    'url' => '/api/image/delete/'.$pid,
                    'downloadUrl' => asset('uploads/'. $filename), // the url to download the file
                ];
                return response()->json(["chunkIndex" => $index]);
            }
            return response(['status' => 'error','message' => 'Upload image fail.'],500);
        }catch (Exception $e){
            return response(['status' => 'error','message' => $e],500);
        }
    }

    // combine all chunks
// no exception handling included here - you may wish to incorporate that
    public function combineChunks($chunks, $targetFile) {
        // open target file handle
        $handle = fopen($targetFile, 'a+');

        foreach ($chunks as $file) {
            fwrite($handle, file_get_contents($file));
        }

        // you may need to do some checks to see if file
        // is matching the original (e.g. by comparing file size)

        // after all are done delete the chunks
        foreach ($chunks as $file) {
            @unlink($file);
        }

        // close the file handle
        fclose($handle);
    }

    public function delete(Request $request,$pid)
    {
        $image = ProductImage::where(['pid' => $pid,'path' => $request->input('key')]);
        try{
            $image->delete();
            $flgDelete = unlink($request->input('key'));
            if($flgDelete)
            {
                return response(['status' => "success"],200);
            }
            else
            {
                return response(['status' => "Not found file."],404);
            }
        }catch (Exception $e){
            return response(['status' => "Not found file."],404);
        }
    }
}
