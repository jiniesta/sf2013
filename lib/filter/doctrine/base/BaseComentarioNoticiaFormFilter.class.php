<?php

/**
 * ComentarioNoticia filter form base class.
 *
 * @package    sf2013
 * @subpackage filter
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseComentarioNoticiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('comentario_noticia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ComentarioNoticia';
  }

  public function getFields()
  {
    return array(
      'comentario_id' => 'Number',
      'noticia_id'    => 'Number',
    );
  }
}
