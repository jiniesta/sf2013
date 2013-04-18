<?php

/**
 * Comentario form base class.
 *
 * @method Comentario getObject() Returns the current form's model object
 *
 * @package    sf2013
 * @subpackage form
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseComentarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'texto'      => new sfWidgetFormInputText(),
      'fecha'      => new sfWidgetFormDate(),
      'usuario_id' => new sfWidgetFormInputText(),
      'noticia_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Noticia'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'texto'      => new sfValidatorString(array('max_length' => 140)),
      'fecha'      => new sfValidatorDate(),
      'usuario_id' => new sfValidatorInteger(),
      'noticia_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Noticia'))),
    ));

    $this->widgetSchema->setNameFormat('comentario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comentario';
  }

}
