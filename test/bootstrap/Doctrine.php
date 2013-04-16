<?php
  include(dirname(__FILE__).'/unit.php');
  $conf=ProjectConfiguration::getApplicationConfiguration("frontend","test",true);
  new sfDataBaseManager($conf);
?>
