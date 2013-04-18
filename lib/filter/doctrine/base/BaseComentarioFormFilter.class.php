<?php

/**
 * Comentario filter form base class.
 *
 * @package    sf2013
 * @subpackage filter
 * @author     Javi
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseComentarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'texto'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'usuario_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'noticia_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Noticia'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'texto'      => new sfValidatorPass(array('required' => false)),
      'fecha'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'usuario_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'noticia_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Noticia'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('comentario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comentario';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'texto'      => 'Text',
      'fecha'      => 'Date',
      'usuario_id' => 'Number',
      'noticia_id' => 'ForeignKey',
    );
  }
}
