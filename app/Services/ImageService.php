<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Format;

class ImageService
{
    public function storeAndCompress(UploadedFile $file, string $directory, int $maxWidth = 1280, int $quality = 80): string
    {
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
        $path = trim($directory, '/').'/'.$filename;

        $image = Image::decodePath($file->getRealPath());

        if ($image->width() > $maxWidth) {
            $image->scale(width: $maxWidth);
        }

        $encoded = $image->encodeUsingFormat(Format::JPEG, quality: $quality);

        Storage::disk('public')->put($path, (string) $encoded);

        return $path;
    }

    public function delete(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
