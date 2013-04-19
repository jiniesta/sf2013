<!DOCTYPE HTML>
<html>
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title><?php include_slot('title','El Diario');?></title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="contenedor">
      <header>
        <div class="row-fluid">
          <center>
          <div class="span6 btn-group">
            <?php include_component("home","menuPrincipal") ?>
          </div>
          </center>
          <div class="span">
            <?php include_component("home","barraUsuario") ?>
          </div>
        </div>
      </header>
      <div id="cuerpo">
        <?php echo $sf_content ?>
      </div>
    </div>
  </body>
</html>
