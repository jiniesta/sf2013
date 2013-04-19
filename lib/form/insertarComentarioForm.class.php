<?php
class insertarComentarioForm extends sfForms
{
	public function configure()
	{
		$this -> setWidgets(array(
			'texto' => new sfWidgetFormInputText(),
			))
	}
}
