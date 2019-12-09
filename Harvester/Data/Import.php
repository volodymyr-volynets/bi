<?php

namespace Numbers\BI\Harvester\Data;
class Import extends \Object\Import {
	public $data = [
		'modules' => [
			'options' => [
				'pk' => ['sm_module_code'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Modules',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_module_code' => 'H9',
					'sm_module_type' => 20,
					'sm_module_name' => 'H/9 Harvester',
					'sm_module_abbreviation' => 'H/9',
					'sm_module_icon' => 'fas fa-tractor',
					'sm_module_transactions' => 0,
					'sm_module_multiple' => 0,
					'sm_module_activation_model' => null,
					'sm_module_custom_activation' => 0,
					'sm_module_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
				]
			]
		],
		'features' => [
			'options' => [
				'pk' => ['sm_feature_code'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Module\Features',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_feature_module_code' => 'H9',
					'sm_feature_code' => 'H9::HARVESTER',
					'sm_feature_type' => 10,
					'sm_feature_name' => 'H/9 Harvester',
					'sm_feature_icon' => 'fas fa-tractor',
					'sm_feature_activation_model' => null,
					'sm_feature_activated_by_default' => 1,
					'sm_feature_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
				],
				[
					'sm_feature_module_code' => 'H9',
					'sm_feature_code' => 'H9::COMMON_TYPES',
					'sm_feature_type' => 30,
					'sm_feature_name' => 'H/9 Common Harvester Types',
					'sm_feature_icon' => 'far fa-object-group',
					'sm_feature_activation_model' => '\Numbers\BI\Harvester\Harvester\Import',
					'sm_feature_activated_by_default' => 0,
					'sm_feature_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
				]
			]
		]
	];
}