<?php

/**
 * ComentarioUsuario form base class.
 *
 * @method ComentarioUsuario getObject() Returns the current form's model object
 *
 * @package    sf2013
 * @subpackage form
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseComentarioUsuarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'comentario_id' => new sfWidgetFormInputHidden(),
      'usuario_id'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'comentario_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('comentario_id')), 'empty_value' => $this->getObject()->get('comentario_id'), 'required' => false)),
      'usuario_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('usuario_id')), 'empty_value' => $this->getObject()->get('usuario_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('comentario_usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ComentarioUsuario';
  }

}
