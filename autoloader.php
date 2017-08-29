<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 25/08/2017
 * Time: 23:51
 */
function autoload($class){
    require_once('class/'.$class.'.php');
}

spl_autoload_register('autoload');