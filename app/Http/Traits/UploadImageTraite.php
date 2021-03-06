<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

trait UploadImageTraite {
    public function uploadFile($folderName,$file)
    {   
        #CHECK IF THE GIVEN FOLDER IT DOSE EXIST IF NOT CREATE ONE.
        if(!Storage::disk('easy_file_uploader')->exists($folderName)) Storage::disk('easy_file_uploader')->makeDirectory($folderName);
        #CHECK IF THE FILE IS VALID.
        if(!$file->isValid()) throw new \Exception('ERROR ON UPLOAD FILES: '.$file->getErrorMessage());
        # UPLOAD THE FILE TO THE CHOSEN PATH AND DISK.
        $file_path = Storage::disk('easy_file_uploader')->put($folderName,$file);
        # CREATE THE FILE URL.
        $full_url_path = URL::to('/'.$folderName.'/'.basename($file_path));
        # RETURN THE FULL USEABLE URL THE USER CAN SAVE IN THE DATABASE.
        return $full_url_path;
    }
}
