<?php
  require_once dirname(__FILE__).'/../bootstrap/Doctrine.php';
  
  $test = new lime_test(1);

  $noticia = new Noticia();

  $noticias = Doctrine::getTable('Noticia') -> createQuery('q') -> execute();

  foreach ($noticias as $n) {
  	$test -> is($noticias,$n);
  }

?>