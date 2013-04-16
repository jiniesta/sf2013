<?php

/**
 * SeccionNoticia form base class.
 *
 * @method SeccionNoticia getObject() Returns the current form's model object
 *
 * @package    sf2013
 * @subpackage form
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSeccionNoticiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'seccion_id'  => new sfWidgetFormInputHidden(),
      'importancia' => new sfWidgetFormInputText(),
      'noticia_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'seccion_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('seccion_id')), 'empty_value' => $this->getObject()->get('seccion_id'), 'required' => false)),
      'importancia' => new sfValidatorInteger(array('required' => false)),
      'noticia_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('noticia_id')), 'empty_value' => $this->getObject()->get('noticia_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('seccion_noticia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SeccionNoticia';
  }

}
