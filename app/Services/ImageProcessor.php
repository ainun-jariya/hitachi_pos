<?php

namespace App\Services;

use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\File;
use App\Models\Image;

class ImageProcessor
{
    public $imagesPath = '';
    public $thumbnailPath = '';
    public function createDirectory(): void
    {
        $paths = [
            'image_path' => public_path('images/'),
            'thumbnail_path' => public_path('images/thumbs/')
        ];
        foreach ($paths as $key => $path) {
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
        }
        $this->imagesPath = $paths['image_path'];
        $this->thumbnailPath = $paths['thumbnail_path'];
    }

    public function saveImage($file, $model)
    {
        $this->createDirectory();

        $image = InterventionImage::make($file);
        // you can also use the original name
        $imageName = time().'-'.$file->getClientOriginalName();
        // save original image
        $image->save($this->imagesPath.$imageName);
        // resize and save thumbnail
        $image->resize(150,150);
        $image->save($this->thumbnailPath.$imageName);

        $imageModel = new Image();
        $imageModel->save([
            'file' => $this->imagesPath.$imageName,
            'size_type' => 'original',
        ]);
        $imageModel->imageable()->associate($model)->save();

        $imageModel = new Image();
        $imageModel->save([
            'file' => $this->imagesPath.$imageName,
            'size_type' => 'thumb',
        ]);
        $imageModel->imageable()->associate($model)->save();
    }
}
