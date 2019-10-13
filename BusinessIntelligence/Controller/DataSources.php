<?php

namespace Numbers\BI\BusinessIntelligence\Controller;
class DataSources extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\BI\BusinessIntelligence\Form\List2\DataSources([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\BI\BusinessIntelligence\Form\DataSources([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\BI\BusinessIntelligence\Form\DataSources',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}