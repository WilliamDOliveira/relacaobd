

/**
         * Tratar imagem
         * http://image.intervention.io/getting_started/installation#laravel
         * composer require intervention/image
         * Intervention\Image\ImageServiceProvider::class
         * 'Image' => Intervention\Image\Facades\Image::class
         */
        Intervention\Image\ImageServiceProvider::class,


<form method="post" action="{{ route('image.store') }}" enctype="multipart/form-data">
   {{ csrf_field() }}
    {{--  <input type='file' name="file[]" multiple />   --}}
    <input type='file' id="primaryImage" name="primaryImage" accept="image/*" /> 
    <input type="text" name="name" value="Image1">
    <input type="text" name="path" value="Path1">
  <button type="submit" class="btn btn-block btn-success">
      <i class="fa fa-save"></i> Salvar
  </button>
</form>




<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image as Img;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;

class ImageController extends Controller
{
    //

    public function index(){        
        return view('image');
    }

    public function store( Request $request ){

        $data =[
            "name" => $request->all()['name']  ,
            "path" => $request->all()['path']
        ];

        $primaryImage = $request->all()['primaryImage'];

        $image = Img::create( $data );
    
        if ($request->hasFile('primaryImage')) {
            $image->path_image = $this->saveImage($primaryImage, 1, 'imagem', 250);
            return $image->path_image; //Retorna a url onde se encontra a imagem
            // return redirect()->to($image->path_image); // Redireciona para a imagem criada
        }
    }

    public function saveImage($image, $id, $type, $size = 250 )
    {
        if (!is_null($image))
        {
            $file = $image;
            $extension = $image->getClientOriginalExtension();
            $fileName = time() . random_int(100, 999) .'.' . $extension; 
            $destinationPath = public_path('images/'.$type.'/'.$id.'/');
            $url = 'http://'.$_SERVER['HTTP_HOST'].'/images/'.$type.'/'.$id.'/'.$fileName;
            $fullPath = $destinationPath.$fileName;
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true);
            }
            $image = Image::make($file)
                ->resize($size, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg');
            $image->save($fullPath, 100);
            return $url;
        } else {
            // return 'http://'.$_SERVER['HTTP_HOST'].'/images/'.$type.'/placeholder300x300.jpg';
            return 'erro na função saveimage';
        }
    }

}//@endClass
