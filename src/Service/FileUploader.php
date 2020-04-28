<?php

namespace App\Service;

use Exception;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploader
{

    private $directorioDestino;
    private $slugger;

    public function __construct($directorioDestino, SluggerInterface $slugger)
    {
        $this->directorioDestino = $directorioDestino;
        $this->slugger = $slugger;
    }

    public function cargar(UploadedFile $file)
    {

        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $saveFileName = $this->slugger->slug($originalFileName);
        $fileName = $saveFileName . '-' . uniqid() . '.' . $file->guessExtension();

        try {
            $file->move(
                $this->getDirectorioDestino(), $fileName
            );
        } catch (FileException $exception) {
            throw new Exception('A ocurrido un error'. $exception);
        }

         return $fileName;

    }

    public function getDirectorioDestino(){
        return $this->directorioDestino;
    }

}
