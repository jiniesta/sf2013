	<div class="span12">
		<h1><?php echo $noticia -> getTitulo() ?></h1>
		<h4><?php echo $noticia -> getFecha() ?></h4>
		<h3><?php echo $noticia -> getSubtitulo() ?></h3>
		<p><?php echo $noticia -> getTexto() ?></p>
	</div>
	<div class="span6">
		<?php include_component("home","comentarios") ?>
	</div>