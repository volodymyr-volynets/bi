<?php

namespace Numbers\BI\BusinessIntelligence\Form;
class Filters extends \Object\Form\Wrapper\Base {
	public $form_link = 'bi_filters';
	public $module_code = 'BI';
	public $title = 'B/I Filters Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true,
			'import' => true,
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'general_container' => ['default_row_type' => 'grid', 'order' => 200],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'bi_filter_code' => [
				'bi_filter_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'required' => true, 'percent' => 95, 'navigation' => true],
				'bi_filter_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'bi_filter_name' => [
				'bi_filter_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			]
		],
		'general_container' => [
			'bi_filter_abacattr_id' => [
				'bi_filter_abacattr_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'ABAC Attribute', 'domain' => 'attribute_id', 'null' => true, 'percent' => 100, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\ABAC\Model\Attributes::optionsActive', 'options_params' => ['sm_abacattr_flag_attribute' => 1], 'onchange' => 'this.form.submit();']
			],
			'bi_filter_method' => [
				'bi_filter_method' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Method', 'domain' => 'code', 'percent' => 33, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Widgets\Attributes\Model\Methods'],
				'bi_filter_domain' => ['order' => 2, 'label_name' => 'Domain', 'domain' => 'code', 'null' => true, 'percent' => 33, 'method' => 'select', 'searchable' => true, 'options_model' => '\Object\Data\Domains::optionsNoSequences', 'onchange' => 'this.form.submit();'],
				'bi_filter_type' => ['order' => 3, 'label_name' => 'Type', 'domain' => 'code', 'percent' => 34, 'required' => true, 'method' => 'select', 'searchable' => true, 'options_model' => '\Object\Data\Types::optionsNoSequences']
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Filters',
		'model' => '\Numbers\BI\BusinessIntelligence\Model\Filters',
	];

	public function refresh(& $form) {
		if (!empty($form->values['bi_filter_abacattr_id'])) {
			$model = \Numbers\Backend\ABAC\Model\Attributes::getStatic([
				'where' => [
					'sm_abacattr_id' => $form->values['bi_filter_abacattr_id'],
					'sm_abacattr_flag_attribute' => 1
				],
				'single_row' => true,
				'no_cache' => true
			]);
			$form->values['bi_filter_domain'] = $model['sm_abacattr_domain'];
			$form->values['bi_filter_type'] = $model['sm_abacattr_type'];
		} else {
			// if we have domain we preset type
			if (!empty($form->values['bi_filter_domain'])) {
				$domains = \Object\Data\Domains::getStatic();
				$form->values['bi_filter_type'] = $domains[$form->values['bi_filter_domain']]['type'];
			}
		}
	}

	public function validate(& $form) {
		// if we have domain we preset type
		if (!empty($form->values['bi_filter_domain'])) {
			$domains = \Object\Data\Domains::getStatic();
			$form->values['bi_filter_type'] = $domains[$form->values['bi_filter_domain']]['type'];
		}
		if (!$form->hasErrors()) {
			if (!empty($form->values['bi_filter_abacattr_id'])) {
				$model = \Numbers\Backend\ABAC\Model\Attributes::getStatic([
					'where' => [
						'sm_abacattr_id' => $form->values['bi_filter_abacattr_id'],
						'sm_abacattr_flag_attribute' => 1
					],
					'single_row' => true,
					'no_cache' => true
				]);
				$form->values['bi_filter_domain'] = $model['sm_abacattr_domain'];
				$form->values['bi_filter_type'] = $model['sm_abacattr_type'];
				// method
				if (!in_array($form->values['bi_filter_method'], ['select', 'multiselect', 'autocomplete', 'multiautocomplete'])) {
					$form->error('danger', 'You can only have Select(s) and Autocomplete(s) if model is selected!', 'bi_filter_method');
				}
			} else {
				// method
				if (!in_array($form->values['bi_filter_method'], ['input', 'boolean'])) {
					$form->error('danger', 'You can only have Text and Boolean!', 'bi_filter_method');
				}
			}
		}
	}
}