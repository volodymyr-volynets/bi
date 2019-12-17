<?php

namespace Numbers\BI\Harvester\Harvester;
class Import extends \Object\Import {
	public $data = [
		'metric_types' => [
			'options' => [
				'pk' => ['h9_metrtype_tenant_id', 'h9_metrtype_code'],
				'model' => '\Numbers\BI\Harvester\Model\Collection\Types',
				'method' => 'save'
			],
			'data' => [
				[
					'h9_metrtype_tenant_id' => null,
					'h9_metrtype_code' => 'SM_ACTIVE_SESSIONS',
					'h9_metrtype_name' => 'S/M Active Sessions',
					'h9_metrtype_model' => '\Numbers\BI\Harvester\Harvester\ActiveSessions',
					'h9_metrtype_cron_expression' => '*/5 * * * * *',
					'h9_metrtype_inactive' => 0,
					'\Numbers\BI\Harvester\Model\Metric\Type\Counters' => [
						[
							'h9_metrtpcounter_code' => 'h9_metric_counter1',
							'h9_metrtpcounter_name' => 'Active Sessions',
							'h9_metrtpcounter_inactive' => 0
						],
						[
							'h9_metrtpcounter_code' => 'h9_metric_counter2',
							'h9_metrtpcounter_name' => 'Total Pages',
							'h9_metrtpcounter_inactive' => 0
						],
						[
							'h9_metrtpcounter_code' => 'h9_metric_counter3',
							'h9_metrtpcounter_name' => 'Total Requests',
							'h9_metrtpcounter_inactive' => 0
						]
					]
				],
			]
		],
	];
}