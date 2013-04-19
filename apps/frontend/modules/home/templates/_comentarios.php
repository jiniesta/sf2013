<?php foreach($comentarios as $comentario): ?><hr>
<?php if ($comentario->getNoticia($comentario) == $comentario->getNoticia_id()): ?>
	<strong><span class="label"><?php echo $comentario->getUsuario($comentario) ?></span><br></strong>
	<div class="alert alert-success"><?php echo $comentario->getTexto() ?></div>
	<?php echo $comentario->getFecha() ?><hr>
<?php endif; ?>
<?php endforeach; ?>

<?php if($sf_user->isAuthenticated()): ?>
	<form action="/comentario/insertar" method="POST">
		<textarea name="texto"></textarea><br>
		<input type="hidden" name="id_not" value=<?php echo $_GET['id'] ?>>
		<input type="hidden" name="id_user" value=<?php echo $usuario->getId(); ?>>
		<input type="submit" value="comentar">
	</form>  
<?php else:  ?>
  <a href="/usuario/new">Regístrate para poder comentar</a> / <?php echo link_to("Inicia sesión", "@login") ?>
<?php endif; ?>


