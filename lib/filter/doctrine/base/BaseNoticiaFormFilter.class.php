<?php

/**
 * Noticia filter form base class.
 *
 * @package    sf2013
 * @subpackage filter
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNoticiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'titulo'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subtitulo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'texto'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'autores_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
      'secciones_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Seccion')),
    ));

    $this->setValidators(array(
      'titulo'         => new sfValidatorPass(array('required' => false)),
      'subtitulo'      => new sfValidatorPass(array('required' => false)),
      'texto'          => new sfValidatorPass(array('required' => false)),
      'fecha'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'autores_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
      'secciones_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Seccion', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('noticia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addAutoresListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.AutorNoticia AutorNoticia')
      ->andWhereIn('AutorNoticia.autor_id', $values)
    ;
  }

  public function addSeccionesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.SeccionNoticia SeccionNoticia')
      ->andWhereIn('SeccionNoticia.seccion_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Noticia';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'titulo'         => 'Text',
      'subtitulo'      => 'Text',
      'texto'          => 'Text',
      'fecha'          => 'Date',
      'autores_list'   => 'ManyKey',
      'secciones_list' => 'ManyKey',
    );
  }
}
