<?php

/**
 * SeccionNoticia filter form base class.
 *
 * @package    sf2013
 * @subpackage filter
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSeccionNoticiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'importancia' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'importancia' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('seccion_noticia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SeccionNoticia';
  }

  public function getFields()
  {
    return array(
      'seccion_id'  => 'Number',
      'importancia' => 'Number',
      'noticia_id'  => 'Number',
    );
  }
}
