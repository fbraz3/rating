<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 25/08/2017
 * Time: 23:48
 */

require_once ('autoloader.php');
require_once ('header.php');

try{
    $db = Database::getPDO();
    $filmesDAO = new FilmesDAO($db);
    $filmes = $filmesDAO->buscaFilmes();

}catch (UserException $e){

    echo $e->getMessage();

}catch (Exception $e){

    die('Erro: '.$e->getMessage());

}
?>

    <table class="table">
        <thead>
            <tr>
                <td>Filme</td>
                <td>Nota</td>
                <td>Media</td>
            </tr>
        </thead>
        <tbody>
    <?php

    foreach ($filmes as $filme){ ?>
             <tr>
                 <td>
                     <?=$filme->getTitulo()?>
                 </td>
                 <td>
                     <a href="votar.php?id_filme=<?=$filme->getId()?>&nota=1"><span class="glyphicon glyphicon-star"></span></a>
                     <a href="votar.php?id_filme=<?=$filme->getId()?>&nota=2"><span class="glyphicon glyphicon-star"></span></a>
                     <a href="votar.php?id_filme=<?=$filme->getId()?>&nota=3"><span class="glyphicon glyphicon-star"></span></a>
                     <a href="votar.php?id_filme=<?=$filme->getId()?>&nota=4"><span class="glyphicon glyphicon-star"></span></a>
                     <a href="votar.php?id_filme=<?=$filme->getId()?>&nota=5"><span class="glyphicon glyphicon-star"></span></a>
                 </td>
                 <td>
                     <?=$filme->getMedia()?>
                 </td>
             </tr>
    <?php } ?>
        </tbody>
    </table>
</body>
<script
    src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>