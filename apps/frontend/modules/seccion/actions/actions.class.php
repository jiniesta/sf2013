<?php

/**
 * seccion actions.
 *
 * @package    sf2013
 * @subpackage seccion
 * @author     Javi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class seccionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->seccions = Doctrine_Core::getTable('Seccion')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SeccionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SeccionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($seccion = Doctrine_Core::getTable('Seccion')->find(array($request->getParameter('id'))), sprintf('Object seccion does not exist (%s).', $request->getParameter('id')));
    $this->form = new SeccionForm($seccion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($seccion = Doctrine_Core::getTable('Seccion')->find(array($request->getParameter('id'))), sprintf('Object seccion does not exist (%s).', $request->getParameter('id')));
    $this->form = new SeccionForm($seccion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($seccion = Doctrine_Core::getTable('Seccion')->find(array($request->getParameter('id'))), sprintf('Object seccion does not exist (%s).', $request->getParameter('id')));
    $seccion->delete();

    $this->redirect('seccion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $seccion = $form->save();

      $this->redirect('seccion/edit?id='.$seccion->getId());
    }
  }
}
