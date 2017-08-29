<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 28/08/2017
 * Time: 19:58
 */
require_once ('config.php');
require_once ('autoloader.php');

try{
    $filmesDAO = new FilmesDAO($db);
    $filme = $filmesDAO->buscaFilme($_GET['id_filme']);

    $voto = new Voto($_GET['id_filme'], $_GET['nota']);
    $votoDAO = new VotoDAO($db);
    $votoDAO->registra($voto);
    $filmesDAO->atualizaMedia($filme);

    header('Location: index.php');
    die();

}catch (UserException $e){
    echo $e->getMessage();
}catch (Exception $e){
    echo "Erro ao computar seu voto, favor entrar em contato com o suporte";
}