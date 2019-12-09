<?php

namespace Numbers\BI\Harvester\Controller;
class Schedule extends \Object\Controller\Permission {
	public function actionEdit() {
		$form = new \Numbers\BI\Harvester\Form\Task\Schedule([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}