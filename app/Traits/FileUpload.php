<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\throwException;

trait FileUpload
{
    // Upload File
    public function uploadFile(UploadedFile $file, string $dir = 'uploads', $disk = 'public'): ?string
    {

        // Validate disk type
        if (!in_array($disk, ['public', 'local'])) {
            throw new Exception("Invalid disk type?. Must be either 'public' or 'local' ");
        }

        // handle file upload
        try {

            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($dir, $fileName, $disk);
            return "/$dir/$fileName";

        } catch (\Throwable $th) {
            throw $th;
        }

        return null;
    } // End Method


    // Delete File
    public function deleteFile(string $path, string $disk = 'public'): bool
    {
        if (!in_array($disk, ['public', 'local'])) {
            throw new Exception("Invalid disk type?. Must be either 'public' or 'local' ");
        }

        if ($disk == 'public') {
            if (File::exists(public_path($path))) {
                File::delete(public_path($path));
                return true;
            }

        } else {
            File::exists(storage_path($path));
            File::delete(storage_path($path));
            return true;
        }

        return false;

    } // End Method


}
