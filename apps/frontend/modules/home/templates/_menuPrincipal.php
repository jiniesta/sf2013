<h1><a href=<?php echo url_for('/home') ?>>El Diario</a></h1>
<?php 
function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}
?>
<?php foreach ($secciones as $key => $value): ?>
	<?php $s = strtolower($value -> getSeccion()) ?>
	<?php $s = normaliza($s); ?>
	<button class="btn"><a href=<?php echo url_for('/home/'.$s) ?>><?php echo $value -> getSeccion() ?></a></button>
<?php endforeach; ?>
