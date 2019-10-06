<?php

namespace Numbers\BI\BusinessIntelligence\Form;
class DataSources extends \Object\Form\Wrapper\Base {
	public $form_link = 'bi_data_sources';
	public $module_code = 'BI';
	public $title = 'B/I Data Sources Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true,
			'import' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
		'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
		'tables_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\BI\BusinessIntelligence\Model\DataSource\Tables',
			'details_pk' => ['bi_datsrctable_model_id'],
			'required' => true,
			'order' => 35000,
		],
		'filters_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\BI\BusinessIntelligence\Model\DataSource\Filters',
			'details_pk' => ['bi_datsrcfilter_filter_code'],
			'required' => false,
			'order' => 35001,
		],
		'columns_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 0,
			'details_key' => '\Numbers\BI\BusinessIntelligence\Model\DataSource\Columns',
			'details_pk' => ['bi_datsrccolumn_column_code'],
			'required' => false,
			'order' => 35001,
		],
	];
	public $rows = [
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'SQL Query'],
			'tables' => ['order' => 200, 'label_name' => 'Tables'],
			'filters' => ['order' => 300, 'label_name' => 'Filters'],
			'columns' => ['order' => 400, 'label_name' => 'Columns'],
		]
	];
	public $elements = [
		'top' => [
			'bi_datasource_code' => [
				'bi_datasource_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'required' => true, 'percent' => 95, 'navigation' => true],
				'bi_datasource_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'bi_datasource_name' => [
				'bi_datasource_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			]
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
			],
			'tables' => [
				'tables' => ['container' => 'tables_container', 'order' => 100],
			],
			'filters' => [
				'filters' => ['container' => 'filters_container', 'order' => 100],
			],
			'columns' => [
				'columns' => ['container' => 'columns_container', 'order' => 100],
			]
		],
		'general_container' => [
			'bi_datasource_sql' => [
				'bi_datasource_sql' => ['order' => 1, 'row_order' => 100, 'label_name' => 'SQL', 'domain' => 'sql_query', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'textarea', 'rows' => 15],
			]
		],
		'tables_container' => [
			'row1' => [
				'bi_datsrctable_model_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Table', 'domain' => 'model_id', 'null' => true, 'required' => true, 'percent' => 95, 'method' => 'select', 'details_unique_select' => true, 'options_model' => '\Numbers\Backend\Db\Common\Model\Models::optionsActive', 'onchange' => 'this.form.submit();'],
				'bi_datsrctable_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'row2' => [
				'bi_datsrctable_sql' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Preset', 'type' => 'text', 'null' => true, 'percent' => 100, 'custom_renderer' => '\Numbers\BI\BusinessIntelligence\Form\DataSources::renderSQL']
			]
		],
		'filters_container' => [
			'row1' => [
				'bi_datsrcfilter_filter_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Filter', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 80, 'method' => 'select', 'details_unique_select' => true, 'options_model' => '\Numbers\BI\BusinessIntelligence\Model\Filters::optionsActive', 'onchange' => 'this.form.submit();'],
				'bi_datsrcfilter_mandatory' => ['order' => 2, 'label_name' => 'Mandatory', 'type' => 'boolean', 'percent' => 15],
				'bi_datsrcfilter_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'row2' => [
				'bi_datsrcfilter_sql' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Preset', 'type' => 'text', 'null' => true, 'percent' => 100, 'custom_renderer' => '\Numbers\BI\BusinessIntelligence\Form\DataSources::renderFilter']
			]
		],
		'columns_container' => [
			'row1' => [
				'bi_datsrccolumn_column_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Column', 'domain' => 'code', 'null' => true, 'required' => true, 'readonly' => true],
			],
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP,
		]
	];
	public $collection = [
		'name' => 'Data Sources',
		'model' => '\Numbers\BI\BusinessIntelligence\Model\DataSources',
		'details' => [
			'\Numbers\BI\BusinessIntelligence\Model\DataSource\Tables' => [
				'name' => 'Tables',
				'pk' => ['bi_datsrctable_tenant_id', 'bi_datsrctable_datasource_code', 'bi_datsrctable_model_id'],
				'type' => '1M',
				'map' => ['bi_datasource_tenant_id' => 'bi_datsrctable_tenant_id', 'bi_datasource_code' => 'bi_datsrctable_datasource_code']
			],
			'\Numbers\BI\BusinessIntelligence\Model\DataSource\Filters' => [
				'name' => 'Filters',
				'pk' => ['bi_datsrcfilter_tenant_id', 'bi_datsrcfilter_datasource_code', 'bi_datsrcfilter_filter_code'],
				'type' => '1M',
				'map' => ['bi_datasource_tenant_id' => 'bi_datsrcfilter_tenant_id', 'bi_datasource_code' => 'bi_datsrcfilter_datasource_code']
			],
			'\Numbers\BI\BusinessIntelligence\Model\DataSource\Columns' => [
				'name' => 'Columns',
				'pk' => ['bi_datsrccolumn_tenant_id', 'bi_datsrccolumn_datasource_code', 'bi_datsrccolumn_column_code'],
				'type' => '1M',
				'map' => ['bi_datasource_tenant_id' => 'bi_datsrccolumn_tenant_id', 'bi_datasource_code' => 'bi_datsrccolumn_datasource_code']
			]
		]
	];

	public function validate(& $form) {
		if ($form->hasErrors()) {
			return;
		}
		// load parser, from private for now
		$current_path = explode(':', get_include_path());
		$current_path[] = './../libraries/private/crodas/sql-parser/src/';
		set_include_path(implode(PATH_SEPARATOR, $current_path));
		$parser = new \SQLParser();
		try {
			$sql = str_replace(["\t", "\n", "\r", '"'], [' ', ' ', ' ', '`'], $form->values['bi_datasource_sql']);
			// extract tables
			$all_sql_models = \Helper\Parser::match($sql, '[model[', ']]', ['all' => true, 'raw' => true]);
			$all_sql_filters = \Helper\Parser::match($sql, '[filter[', ']]', ['all' => true, 'raw' => true]);
			foreach ($all_sql_models as $k => $v) {
				$sql = str_replace($v, 'model_index_replace_' . $k, $sql);
			}
			foreach ($all_sql_filters as $k => $v) {
				$sql = str_replace($v, '\'' . 'filter_index_replace_' . $k . '\'', $sql);
			}
			$queries = $parser->parse($sql);
		} catch (\Exception $e) {
			$form->error(DANGER, \Numbers\BI\BusinessIntelligence\Helper\Messages::PARSE_ERROR, 'bi_datasource_sql');
			$form->error(DANGER, $e->getMessage(), 'bi_datasource_sql');
			return;
		}
		if (empty($queries[0]) && !$queries[0]->getAllTables()) {
			$form->error(DANGER, \Numbers\BI\BusinessIntelligence\Helper\Messages::PARSE_NO_TABLES, 'bi_datasource_sql');
			return;
		}
		if (count($queries) > 1) {
			$form->error(DANGER, \Numbers\BI\BusinessIntelligence\Helper\Messages::PARSE_ONE_QUERY_ONLY, 'bi_datasource_sql');
			return;
		}
		if (!($queries[0] instanceof \SQL\Select)) {
			$form->error(DANGER, \Numbers\BI\BusinessIntelligence\Helper\Messages::PARSE_SELECT_ONLY, 'bi_datasource_sql');
			return;
		}
		// process all tables
		$all_tables = $queries[0]->getAllTables();
		$all_columns = $queries[0]->getAllColumnsAsArray();
		foreach ($all_tables as $k => $v) {
			if (strpos($v, 'model_index_replace_') !== false) {
				unset($all_tables[$k]);
			}
		}
		if (!empty($all_tables)) {
			foreach ($all_tables as $k => $v) {
				$form->error(DANGER, \Numbers\BI\BusinessIntelligence\Helper\Messages::PARSE_DIRECT_TABLE, 'bi_datasource_sql', [
					'unique_options_hash' => true,
					'replace' => [
						'[table]' => $v,
					]
				]);
			}
			return;
		}
		// models
		$all_sql_models_converted = [];
		foreach ($all_sql_models as $v) {
			$all_sql_models_converted[str_replace(['[model[', ']]'], '', $v)] = $v;
		}
		$data = \Numbers\Backend\Db\Common\Model\Models::getStatic([
			'pk' => ['sm_model_id'],
		]);
		foreach ($form->values['\Numbers\BI\BusinessIntelligence\Model\DataSource\Tables'] as $k => $v) {
			$form->values['\Numbers\BI\BusinessIntelligence\Model\DataSource\Tables'][$k]['bi_datsrctable_name'] = $data[$v['bi_datsrctable_model_id']]['sm_model_name'];
			if (!empty($all_sql_models_converted[$data[$v['bi_datsrctable_model_id']]['sm_model_name']])) {
				unset($all_sql_models_converted[$data[$v['bi_datsrctable_model_id']]['sm_model_name']]);
			}
		}
		if (!empty($all_sql_models_converted)) {
			foreach ($all_sql_models_converted as $k => $v) {
				$form->error(DANGER, \Numbers\BI\BusinessIntelligence\Helper\Messages::PARSE_MODEL_NOT_FOUND, 'bi_datasource_sql', [
					'unique_options_hash' => true,
					'replace' => [
						'[model]' => $v,
					]
				]);
			}
			return;
		}
		// filters
		$all_sql_filters_converted = [];
		foreach ($all_sql_filters as $v) {
			$all_sql_filters_converted[str_replace(['[filter[', ']]'], '', $v)] = $v;
		}
		$data = \Numbers\BI\BusinessIntelligence\Model\Filters::getStatic([
			'pk' => ['bi_filter_code'],
		]);
		foreach ($form->values['\Numbers\BI\BusinessIntelligence\Model\DataSource\Filters'] as $k => $v) {
			$form->values['\Numbers\BI\BusinessIntelligence\Model\DataSource\Filters'][$k]['bi_datsrcfilter_name'] = $data[$v['bi_datsrcfilter_filter_code']]['bi_filter_name'];
			if (!empty($all_sql_filters_converted[$data[$v['bi_datsrcfilter_filter_code']]['bi_filter_name']])) {
				unset($all_sql_filters_converted[$data[$v['bi_datsrcfilter_filter_code']]['bi_filter_name']]);
			}
		}
		if (!empty($all_sql_filters_converted)) {
			foreach ($all_sql_filters_converted as $k => $v) {
				$form->error(DANGER, \Numbers\BI\BusinessIntelligence\Helper\Messages::PARSE_FILTER_NOT_FOUND, 'bi_datasource_sql', [
					'unique_options_hash' => true,
					'replace' => [
						'[filter]' => $v,
					]
				]);
			}
			return;
		}
		// columns
		$form->values['\Numbers\BI\BusinessIntelligence\Model\DataSource\Columns'] = [];
		foreach ($all_columns as $k => $v) {
			$form->values['\Numbers\BI\BusinessIntelligence\Model\DataSource\Columns'][] = ['bi_datsrccolumn_column_code' => $v];
		}
	}

	public function renderSQL(& $form, & $options, & $value, & $neighbouring_values) {
		if (!empty($neighbouring_values['bi_datsrctable_model_id'])) {
			$data = \Numbers\Backend\Db\Common\Model\Models::getStatic([
				'where' => [
					'sm_model_id' => $neighbouring_values['bi_datsrctable_model_id']
				],
				'pk' => null,
				'single_row' => true
			]);
			$model = \Factory::model($data['sm_model_code'], true);
			$object = new \Object\Query\Builder($model->db_link);
			$object->from('[model[' . $data['sm_model_name'] . ']]', 'a');
			$columns = $model->columns;
			unset($columns[$model->column_prefix . 'tenant_id']);
			$object->columns(array_keys($columns));
			return \HTML::highlight(['value' => $object->sql()]);
		} else {
			return '';
		}
	}

	public function renderFilter(& $form, & $options, & $value, & $neighbouring_values) {
		if (!empty($neighbouring_values['bi_datsrcfilter_filter_code'])) {
			$data = \Numbers\BI\BusinessIntelligence\Model\Filters::getStatic([
				'where' => [
					'bi_filter_code' => $neighbouring_values['bi_datsrcfilter_filter_code']
				],
				'pk' => null,
				'single_row' => true
			]);
			return '[filter[' . $data['bi_filter_name'] . ']]';
		} else {
			return '';
		}
	}
}