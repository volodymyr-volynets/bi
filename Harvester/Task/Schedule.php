<?php

namespace Numbers\BI\Harvester\Task;
class Schedule extends \Numbers\Users\TaskScheduler\Abstract2\Task {

	public $task_code = 'H9_SCHEDULE';

	public function execute(array $parameters, array $options = []) : array {
		$result = [
			'success' => false,
			'error' => [],
			'data' => [
				'comments' => []
			]
		];
		if (empty($parameters['start_date'])) {
			$parameters['start_date'] = \Format::now('date');
		}
		if (empty($parameters['end_date'])) {
			$parameters['end_date'] = $parameters['start_date'];
		}
		// load types
		$all_types = \Numbers\BI\Harvester\Model\Metric\Types::getStatic([
			'where' => [
				'h9_metrtype_inactive' => 0
			],
			'pk' => ['h9_metrtype_code']
		]);
		$expression_model = new \Numbers\Users\TaskScheduler\Helper\Expression();
		foreach ($all_types as $k => $v) {
			$expression_model->addExpression($v['h9_metrtype_cron_expression']);
			if ($expression_model->isTime($parameters['start_date'])) {
				$model = new $v['h9_metrtype_model']();
				$model_result = $model->measure($parameters['start_date'], $parameters['end_date']);
				if ($model_result['success']) {
					$result['data']['comments'][] = i18n(null, 'Executed type [type].', ['replace' => ['[type]' => $v['h9_metrtype_name']]]);
				}
			}
		}
		$result['success'] = true;
		return $result;
	}
}