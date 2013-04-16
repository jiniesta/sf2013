<?php

/**
 * Autor form base class.
 *
 * @method Autor getObject() Returns the current form's model object
 *
 * @package    sf2013
 * @subpackage form
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAutorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'nombre'        => new sfWidgetFormInputText(),
      'apellidos'     => new sfWidgetFormInputText(),
      'dni'           => new sfWidgetFormInputText(),
      'noticias_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Noticia')),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'        => new sfValidatorString(array('max_length' => 10)),
      'apellidos'     => new sfValidatorString(array('max_length' => 100)),
      'dni'           => new sfValidatorString(array('max_length' => 9)),
      'noticias_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Noticia', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Autor', 'column' => array('dni')))
    );

    $this->widgetSchema->setNameFormat('autor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Autor';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['noticias_list']))
    {
      $this->setDefault('noticias_list', $this->object->Noticias->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveNoticiasList($con);

    parent::doSave($con);
  }

  public function saveNoticiasList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['noticias_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Noticias->getPrimaryKeys();
    $values = $this->getValue('noticias_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Noticias', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Noticias', array_values($link));
    }
  }

}
