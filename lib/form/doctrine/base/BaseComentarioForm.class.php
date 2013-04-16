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
      'id'            => new sfWidgetFormInputHidden(),
      'texto'         => new sfWidgetFormInputText(),
      'fecha'         => new sfWidgetFormDate(),
      'usuario_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
      'noticias_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Noticia')),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'texto'         => new sfValidatorString(array('max_length' => 140)),
      'fecha'         => new sfValidatorDate(),
      'usuario_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
      'noticias_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Noticia', 'required' => false)),
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

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['usuario_list']))
    {
      $this->setDefault('usuario_list', $this->object->Usuario->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['noticias_list']))
    {
      $this->setDefault('noticias_list', $this->object->Noticias->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveUsuarioList($con);
    $this->saveNoticiasList($con);

    parent::doSave($con);
  }

  public function saveUsuarioList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['usuario_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Usuario->getPrimaryKeys();
    $values = $this->getValue('usuario_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Usuario', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Usuario', array_values($link));
    }
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
