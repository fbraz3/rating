<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 26/08/2017
 * Time: 00:26
 */

class FilmesDAO
{
    /**
     * @var PDO
     */
    private $db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    public function buscaFilmes(){

        $sql = "SELECT * FROM filmes";
        $sql = $this->db->query($sql);

        $resultado = $sql->fetchAll();

        if (!$resultado) return array();

        $filmes = array();
        foreach ($resultado as $filme){
            $filme = new Filmes($filme['titulo'], $filme['media'], $filme['id']);
            array_push($filmes, $filme);
        }

        return $filmes;

    }

    public function buscaFilme($id){
        $sql = "SELECT * FROM filmes WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $filme = $sql->fetch();

        if (!$filme) throw new UserException('Filme inválido');

        $filme = new Filmes($filme['titulo'], $filme['media'], $filme['id']);

        return $filme;
    }

    public function atualizaMedia(Filmes $filme){
        $media = $this->buscaMedia($filme);
        $sql = "UPDATE filmes SET media = :media WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':media', $media);
        $sql->bindValue(':id', $filme->getId(), PDO::PARAM_INT);
        if ($sql->execute()) return true;
        throw new UserException('Erro ao atualizar a média do filme, favor tente novamente');
    }

    private function buscaMedia(Filmes $filme){
        $sql = "SELECT (SUM(nota)/COUNT(*)) as media FROM votos WHERE votos.id_filme = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $filme->getId(), PDO::PARAM_INT);
        $sql->execute();
        $sql = $sql->fetch();
        if ($sql) return number_format($sql['media'], 1);
        throw new Exception('Erro ao buscar média atualizada');
    }

    private function setDb(PDO $db){
        $this->db = $db;
    }
}