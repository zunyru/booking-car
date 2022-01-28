<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


trait ImageUploadTrait
{
    /**
     * @var string
     */
    private $filesystem;

    /**
     * @var string
     */
    private $directory = '';

    public function uploadeImgae(
        $image,
        $path = '',
        $resizePercent = 1,
        $quality = 90,
        $width = 600,
        $height = 400,
        $name_file = ''
    )
    {

        $this->filesystem = config('filesystems.default');

        $extension = $image->getClientOriginalExtension();

        $new_file_name = $name_file;

        if (empty($name_file)) {
            $new_file_name = $image->getClientOriginalName();
            $new_file_name = Str::replace(".{$extension}", "", $new_file_name);
            $new_file_name = Str::random(10);
        }

        $file = $image->storeAs($path, "{$new_file_name}.{$extension}", $this->filesystem);
        $file = preg_replace('#/+#', '/', $file);

        $content = Storage::disk($this->filesystem)->get($file);
        $imageContent = Image::make($content);

        //resize
        if ($resizePercent < 1) {
            $imageContent = $imageContent->resize(
                ($width * $resizePercent),
                ($height * $resizePercent)
            );
        }

        $imageFile = "{$path}/{$new_file_name}.{$extension}";

        Storage::disk($this->filesystem)
            ->put($imageFile, $imageContent->encode($extension, $quality)->encoded);

        return $path = preg_replace('/^public\//', '', $file);
    }


}