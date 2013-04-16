<?php

/**
 * AutorNoticias form base class.
 *
 * @method AutorNoticias getObject() Returns the current form's model object
 *
 * @package    sf2013
 * @subpackage form
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAutorNoticiasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'noticia_id' => new sfWidgetFormInputHidden(),
      'autor_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'noticia_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('noticia_id')), 'empty_value' => $this->getObject()->get('noticia_id'), 'required' => false)),
      'autor_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('autor_id')), 'empty_value' => $this->getObject()->get('autor_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('autor_noticias[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AutorNoticias';
  }

}
