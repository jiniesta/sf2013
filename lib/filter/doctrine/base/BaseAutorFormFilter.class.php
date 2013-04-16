<?php

/**
 * Autor filter form base class.
 *
 * @package    sf2013
 * @subpackage filter
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAutorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellidos'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dni'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'noticias_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Noticia')),
    ));

    $this->setValidators(array(
      'nombre'        => new sfValidatorPass(array('required' => false)),
      'apellidos'     => new sfValidatorPass(array('required' => false)),
      'dni'           => new sfValidatorPass(array('required' => false)),
      'noticias_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Noticia', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('autor_filters[%s]');

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
      ->leftJoin($query->getRootAlias().'.AutorNoticia AutorNoticia')
      ->andWhereIn('AutorNoticia.noticia_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Autor';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'nombre'        => 'Text',
      'apellidos'     => 'Text',
      'dni'           => 'Text',
      'noticias_list' => 'ManyKey',
    );
  }
}
