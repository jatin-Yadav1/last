<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (!function_exists('uploadImage')) {
    
    function uploadImage(UploadedFile $file, string $directory = "uploads")
    {
        if (!$file->isValid()) {
            throw new \Exception('Uploaded file is not valid.');
        }

        try {
            // Generate a unique filename
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

            // Full path with custom directory
            $storagePath = $directory . '/' . $fileName;

            // Store the file using Storage facade
            Storage::disk("public")->put($storagePath, file_get_contents($file));

            // Set file visibility to public
            Storage::disk("public")->setVisibility($storagePath, 'public');

            // Return the public URL of the uploaded file
            return Storage::url($storagePath);
        } catch (\Exception $e) {
            Log::error('Image upload failed: ' . $e->getMessage());
            throw new \Exception('Image upload failed.');
        }
    }
}

if (!function_exists('removeImage')) {
    /**
     * Remove an image from storage.
     *
     * @param string $filePath
     * @return bool
     * @throws \Exception
     */
    function removeImage(string $filePath): bool
    {
        try {
            // Convert URL to storage path if necessary
            $storagePath = str_replace(Storage::url(''), '', $filePath);

            // Check if file exists before deleting
            if (Storage::disk('public')->exists($storagePath)) {
                return Storage::disk('public')->delete($storagePath);
            } else {
                Log::warning("File not found: {$storagePath}");
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Error deleting file: {$e->getMessage()}");
            throw new \Exception('File deletion failed.');
        }
    }
}
