<?php if($sf_user->isAuthenticated()){ ?>
  <?php echo $sf_user->getUsername(); ?> / <?php echo link_to("Cierra sesión", "@logout") ?>
<?php }else{  ?>
  <a href="/usuario/new">Regístrate</a> / <?php echo link_to("Inicia sesión", "@login") ?>
<?php } ?>
