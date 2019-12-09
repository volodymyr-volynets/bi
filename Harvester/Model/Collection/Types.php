<?php

namespace Numbers\BI\Harvester\Model\Collection;
class Types extends \Object\Collection {
	public $data = [
		'name' => 'Types',
		'model' => '\Numbers\BI\Harvester\Model\Metric\Types',
		'pk' => ['h9_metrtype_tenant_id', 'h9_metrtype_code'],
		'details' => [
			'\Numbers\BI\Harvester\Model\Metric\Type\Counters' => [
				'name' => 'Counters',
				'pk' => ['h9_metrtpcounter_tenant_id', 'h9_metrtpcounter_metrtype_code', 'h9_metrtpcounter_code'],
				'type' => '1M',
				'map' => ['h9_metrtype_tenant_id' => 'h9_metrtpcounter_tenant_id', 'h9_metrtype_code' => 'h9_metrtpcounter_metrtype_code']
			]
		]
	];
}