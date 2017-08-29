<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 26/08/2017
 * Time: 00:23
 */

class Filmes
{
    private $id;
    private $titulo;
    private $media;

    public function __construct($titulo, $media, $id = null)
    {
        $this->id = $this->setId($id);
        $this->titulo = $this->setTitulo($titulo);
        $this->media = $this->setMedia($media);
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getMedia(){
        return $this->media;
    }

    public function getId(){
        return $this->id;
    }

    private function setId($id){
        if (is_numeric($id) || is_null($id)) return $id;
        throw new UserException('Filme inválido');
    }

    private function setTitulo($titulo){
        if (!is_null($titulo)) return $titulo;
        throw new UserException('Título inválido ou nulo');
    }

    private function setMedia($media){
        if (is_numeric($media)) return $media;
        throw new Exception('Média inválida');
    }
}