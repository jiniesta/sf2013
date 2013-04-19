<?php

/**
 * home actions.
 *
 * @package    sf2013
 * @subpackage home
 * @author     Javi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  
  public function executeIndex(sfWebRequest $request)
  {
  	$noticias = Doctrine::getTable('Noticia') -> createQuery('q') -> execute();
    $this -> noticias = $noticias;
  }

  public function executeDeportes(sfWebRequest $request)
  {
    $seccion = new Seccion();
    $seccion -> setSeccion('Deportes');
    $this -> noticias = $seccion -> getNoticias($seccion);
  }

  public function executePolitica(sfWebRequest $request)
  {
    $seccion = new Seccion();
    $seccion -> setSeccion('Política');
    $this -> noticias = $seccion -> getNoticias($seccion);      
  }

  public function executeEconomia(sfWebRequest $request)
  {
    $seccion = new Seccion();
    $seccion -> setSeccion('Economía');
    $this -> noticias = $seccion -> getNoticias($seccion);
  }

  public function executeInternacional(sfWebRequest $request)
  {
    $seccion = new Seccion();
    $seccion -> setSeccion('Internacional');
    $this -> noticias = $seccion -> getNoticias($seccion);
  }

  public function executeCultura(sfWebRequest $request)
  {
    $seccion = new Seccion();
    $seccion -> setSeccion('Cultura');
    $this -> noticias = $seccion -> getNoticias($seccion); 
  }

  public function executeVernoticia(sfWebRequest $request)
  {
    $this -> noticia = Doctrine_Query::create() -> from('Noticia n') -> where('n.id = ?',$_GET['id']) -> fetchOne();
  }
}
