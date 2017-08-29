<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 28/08/2017
 * Time: 20:07
 */

class VotoDAO
{
    /**
     * @var PDO
     */
    private $db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    public function registra(Voto $voto){

        $sql = "INSERT INTO votos SET id_filme = :id_filme, nota = :nota";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_filme', $voto->getId(), PDO::PARAM_INT);
        $sql->bindValue(':nota', $voto->getNota(), PDO::PARAM_INT);

        if ($sql->execute()) return true;

        throw new UserException('Erro ao registrar a nota, favor entrar em contato com o suporte.');
    }

    private function setDb(PDO $db){
        $this->db = $db;
    }
}