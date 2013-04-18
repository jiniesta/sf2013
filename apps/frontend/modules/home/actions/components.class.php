<?php
class homeComponents extends sfComponents{
  public function executeMenuPrincipal(sfWebRequest $request){
	$query = Doctrine_Query::create();
	$query -> from("seccion s");
	$valor = "Principal";
	$query -> where("s.tipo = ?",$valor);
	$secciones = $query -> execute();
	$this -> secciones = $secciones;
	foreach ($secciones as $key => $value) {
		$query = Doctrine_Query::create();
		$query -> from("seccion s");
		$valor = $value -> getSeccion();
		$query -> where("s.tipo = ?",$valor);
		$subsecciones[] = $query -> execute();	
	}
	$this -> subsecciones = $subsecciones;
  }
}
?>
