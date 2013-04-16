<?php

/**
 * BaseComentario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $texto
 * @property date $fecha
 * @property Doctrine_Collection $Usuario
 * @property Doctrine_Collection $Noticias
 * @property Doctrine_Collection $ComentarioNoticia
 * @property Doctrine_Collection $ComentarioUsuario
 * 
 * @method string              getTexto()             Returns the current record's "texto" value
 * @method date                getFecha()             Returns the current record's "fecha" value
 * @method Doctrine_Collection getUsuario()           Returns the current record's "Usuario" collection
 * @method Doctrine_Collection getNoticias()          Returns the current record's "Noticias" collection
 * @method Doctrine_Collection getComentarioNoticia() Returns the current record's "ComentarioNoticia" collection
 * @method Doctrine_Collection getComentarioUsuario() Returns the current record's "ComentarioUsuario" collection
 * @method Comentario          setTexto()             Sets the current record's "texto" value
 * @method Comentario          setFecha()             Sets the current record's "fecha" value
 * @method Comentario          setUsuario()           Sets the current record's "Usuario" collection
 * @method Comentario          setNoticias()          Sets the current record's "Noticias" collection
 * @method Comentario          setComentarioNoticia() Sets the current record's "ComentarioNoticia" collection
 * @method Comentario          setComentarioUsuario() Sets the current record's "ComentarioUsuario" collection
 * 
 * @package    sf2013
 * @subpackage model
 * @author     Javi
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseComentario extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('comentario');
        $this->hasColumn('texto', 'string', 140, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 140,
             ));
        $this->hasColumn('fecha', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardUser as Usuario', array(
             'refClass' => 'ComentarioUsuario',
             'local' => 'comentario_id',
             'foreign' => 'usuario_id'));

        $this->hasMany('Noticia as Noticias', array(
             'refClass' => 'ComentarioNoticia',
             'local' => 'comentario_id',
             'foreign' => 'noticia_id'));

        $this->hasMany('ComentarioNoticia', array(
             'local' => 'id',
             'foreign' => 'comentario_id'));

        $this->hasMany('ComentarioUsuario', array(
             'local' => 'id',
             'foreign' => 'comentario_id'));
    }
}