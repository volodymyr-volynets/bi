<?php

namespace Numbers\BI\Harvester\Controller;
class QuickView extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\BI\Harvester\Form\QuickView([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}