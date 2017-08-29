<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 28/08/2017
 * Time: 20:05
 */

class Voto
{
    private $id;
    private $id_filme;
    private $nota;

    public function __construct($id_filme, $nota, $id = null)
    {
        $this->id_filme = $this->setIdFilme($id_filme);
        $this->nota = $this->setNota($nota);
        $this->id = $this->setId($id);
    }

    public function getId(){
        return $this->id_filme;
    }

    public function getNota(){
        return $this->nota;
    }

    private function setIdFilme($id_filme){
        if (is_numeric($id_filme)) return $id_filme;
        throw new UserException('Filme inválido');
    }

    private function setNota($nota){
        if (is_numeric($nota) && $nota > 0 && $nota <= 5) return $nota;
        throw new UserException('Nota inválida');
    }

    private function setId($id){
        if (is_null($id) || is_numeric($id)) return $id;
        throw new UserException('Valor inválido para id');
    }
}