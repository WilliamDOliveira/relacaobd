

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

        // $data =[
        //     "name" => $request->all()['name']  ,
        //     "path" => $request->all()['path']
        // ];
        
        // $image = Img::create( $data );
    
        if ($request->hasFile('primaryImage')) {//se existir o arquivo faz a função
            //armazena var file
            $imageFile = $request->all()['primaryImage'];
            //options
            $size = getimagesize( $imageFile );//retorna um array com os atributos da imagem [0] = width [1] = height
            $width = ($size[0] > 1920 ) ? 1920 : $size[0];//retorna width da imagem, e já ajusta o tamanho maximo para 1920
            //retorna endereço completo da imagem aonde ela está sendo salva
            $imageUrl = $this->saveImage($imageFile, 1, 'imagem', $width );
            return $imageUrl; //Retorna a url onde se encontra a imagem
            // return redirect()->to($image->path_image); // Redireciona para a imagem criada
        }
    }

    public function saveImage($image, $id, $type, $width = 250 )
    {
        if (!is_null($image))
        {
            $file = $image;
            $extension = $image->getClientOriginalExtension();
            $extension = $extension == 'jpeg' ? 'jpg' : $extension;//converte jpeg para jpg
            if( ( $extension != 'jpg') && ( $extension != 'png') ){
                return 'Formato inválido';
            }
            $fileName = time() . random_int(100, 999) .'.' . $extension; 
            $destinationPath = public_path('images/'.$type.'/'.$id.'/');
            $url = 'http://'.$_SERVER['HTTP_HOST'].'/images/'.$type.'/'.$id.'/'.$fileName;
            $fullPath = $destinationPath.$fileName;
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775, true);
            }
            $image = Image::make($file)//abre a imagem para poder ediar 
                ->resize($width, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg');//transforma em jpg
            $image->save($fullPath, 70);//cria imagem nova de acordo com os parametros
            return $url;
        } else {
            // return 'http://'.$_SERVER['HTTP_HOST'].'/images/'.$type.'/placeholder300x300.jpg';
            return 'erro na função saveimage';
        }
    }

}//@endClass

