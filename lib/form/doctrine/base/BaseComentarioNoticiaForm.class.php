<?php

/**
 * ComentarioNoticia form base class.
 *
 * @method ComentarioNoticia getObject() Returns the current form's model object
 *
 * @package    sf2013
 * @subpackage form
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseComentarioNoticiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'comentario_id' => new sfWidgetFormInputHidden(),
      'noticia_id'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'comentario_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('comentario_id')), 'empty_value' => $this->getObject()->get('comentario_id'), 'required' => false)),
      'noticia_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('noticia_id')), 'empty_value' => $this->getObject()->get('noticia_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('comentario_noticia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ComentarioNoticia';
  }

}
