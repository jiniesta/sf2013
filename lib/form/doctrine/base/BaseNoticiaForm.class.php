<?php

/**
 * Noticia form base class.
 *
 * @method Noticia getObject() Returns the current form's model object
 *
 * @package    sf2013
 * @subpackage form
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNoticiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'titulo'           => new sfWidgetFormInputText(),
      'subtitulo'        => new sfWidgetFormInputText(),
      'texto'            => new sfWidgetFormTextarea(),
      'fecha'            => new sfWidgetFormDate(),
      'autores_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
      'secciones_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Seccion')),
      'comentarios_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Comentario')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'titulo'           => new sfValidatorString(array('max_length' => 150)),
      'subtitulo'        => new sfValidatorString(array('max_length' => 250)),
      'texto'            => new sfValidatorString(array('max_length' => 10000)),
      'fecha'            => new sfValidatorDate(),
      'autores_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
      'secciones_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Seccion', 'required' => false)),
      'comentarios_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Comentario', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('noticia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Noticia';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['autores_list']))
    {
      $this->setDefault('autores_list', $this->object->Autores->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['secciones_list']))
    {
      $this->setDefault('secciones_list', $this->object->Secciones->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['comentarios_list']))
    {
      $this->setDefault('comentarios_list', $this->object->Comentarios->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAutoresList($con);
    $this->saveSeccionesList($con);
    $this->saveComentariosList($con);

    parent::doSave($con);
  }

  public function saveAutoresList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['autores_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Autores->getPrimaryKeys();
    $values = $this->getValue('autores_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Autores', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Autores', array_values($link));
    }
  }

  public function saveSeccionesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['secciones_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Secciones->getPrimaryKeys();
    $values = $this->getValue('secciones_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Secciones', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Secciones', array_values($link));
    }
  }

  public function saveComentariosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['comentarios_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Comentarios->getPrimaryKeys();
    $values = $this->getValue('comentarios_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Comentarios', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Comentarios', array_values($link));
    }
  }

}
