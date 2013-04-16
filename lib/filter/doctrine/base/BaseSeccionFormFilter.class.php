<?php

/**
 * Seccion filter form base class.
 *
 * @package    sf2013
 * @subpackage filter
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSeccionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'seccion'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'noticias_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Noticia')),
    ));

    $this->setValidators(array(
      'tipo'          => new sfValidatorPass(array('required' => false)),
      'seccion'       => new sfValidatorPass(array('required' => false)),
      'noticias_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Noticia', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('seccion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addNoticiasListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('SeccionNoticia.noticia_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Seccion';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'tipo'          => 'Text',
      'seccion'       => 'Text',
      'noticias_list' => 'ManyKey',
    );
  }
}
