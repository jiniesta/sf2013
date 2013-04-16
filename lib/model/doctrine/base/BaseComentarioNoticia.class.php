<?php

/**
 * BaseComentarioNoticia
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $comentario_id
 * @property integer $noticia_id
 * @property Noticia $Noticia
 * @property Comentario $Comentario
 * 
 * @method integer           getComentarioId()  Returns the current record's "comentario_id" value
 * @method integer           getNoticiaId()     Returns the current record's "noticia_id" value
 * @method Noticia           getNoticia()       Returns the current record's "Noticia" value
 * @method Comentario        getComentario()    Returns the current record's "Comentario" value
 * @method ComentarioNoticia setComentarioId()  Sets the current record's "comentario_id" value
 * @method ComentarioNoticia setNoticiaId()     Sets the current record's "noticia_id" value
 * @method ComentarioNoticia setNoticia()       Sets the current record's "Noticia" value
 * @method ComentarioNoticia setComentario()    Sets the current record's "Comentario" value
 * 
 * @package    sf2013
 * @subpackage model
 * @author     Javi
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseComentarioNoticia extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('comentario_noticia');
        $this->hasColumn('comentario_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('noticia_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Noticia', array(
             'local' => 'noticia_id',
             'foreign' => 'id'));

        $this->hasOne('Comentario', array(
             'local' => 'comentario_id',
             'foreign' => 'id'));
    }
}