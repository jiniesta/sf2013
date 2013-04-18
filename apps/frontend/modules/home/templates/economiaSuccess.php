<?php foreach($noticias as $noticia): ?>
	<div class="span8">
		<h3><a href="#"><?php echo $noticia -> getTitulo() ?></a></h3>
		<h6><?php echo $noticia -> getFecha() ?></h6>
		<h5><?php echo $noticia -> getSubtitulo() ?></h5>
		<p><?php echo $noticia -> getTexto() ?></p>
	</div>
<?php endforeach; ?>
