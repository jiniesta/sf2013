<?php

/**
 * sfGuardUser form.
 *
 * @package    sf2013
 * @subpackage form
 * @author     Javi
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
    unset($this->validatorSchema['algorithm']);
    unset($this->widgetSchema['algorithm']);
    
    unset($this->validatorSchema['salt']);
    unset($this->widgetSchema['salt']);
    
    unset($this->validatorSchema['is_active']);
    unset($this->widgetSchema['is_active']);
    
    unset($this->validatorSchema['is_super_admin']);
    unset($this->widgetSchema['is_super_admin']);
    
    unset($this->validatorSchema['last_login']);
    unset($this->widgetSchema['last_login']);
    
    unset($this->validatorSchema['created_at']);
    unset($this->widgetSchema['created_at']);
    
    unset($this->validatorSchema['updated_at']);
    unset($this->widgetSchema['updated_at']);
    
    unset($this->validatorSchema['groups_list']);
    unset($this->widgetSchema['groups_list']);
    
    unset($this->validatorSchema['permissions_list']);
    unset($this->widgetSchema['permissions_list']);
    
    unset($this->validatorSchema['noticias_list']);
    unset($this->widgetSchema['noticias_list']);
    
    unset($this->validatorSchema['comentarios_list']);
    unset($this->widgetSchema['comentarios_list']);
  }
}
