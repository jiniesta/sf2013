<?php
class homeComponents extends sfComponents{
  public function executeMenuPrincipal(sfWebRequest $request)
  {
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

  public function executeComentarios(sfWebRequest $request)
  {
  	$this->comentarios=Doctrine::getTable('Comentario')->createQuery('c')->where('noticia_id = ?',$_GET['id'])->orderBy('c.fecha DESC')->execute();
  	$this->usuario = $this->getUser()->getGuardUser();

  }

  public function executeBarraUsuario(sfWebRequest $request){
    
  }
}
?>
