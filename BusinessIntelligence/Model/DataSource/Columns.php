<?php

namespace Numbers\BI\BusinessIntelligence\Model\DataSource;
class Columns extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'BI';
	public $title = 'B/I Data Source Columns';
	public $name = 'bi_data_source_columns';
	public $pk = ['bi_datsrccolumn_tenant_id', 'bi_datsrccolumn_datasource_code', 'bi_datsrccolumn_column_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'bi_datsrccolumn_';
	public $columns = [
		'bi_datsrccolumn_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'bi_datsrccolumn_datasource_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'bi_datsrccolumn_column_code' => ['name' => 'Code', 'domain' => 'code'],
		'bi_datsrccolumn_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'bi_data_source_columns_pk' => ['type' => 'pk', 'columns' => ['bi_datsrccolumn_tenant_id', 'bi_datsrccolumn_datasource_code', 'bi_datsrccolumn_column_code']],
		'bi_datsrccolumn_datasource_code_fk' => [
			'type' => 'fk',
			'columns' => ['bi_datsrccolumn_tenant_id', 'bi_datsrccolumn_datasource_code'],
			'foreign_model' => '\Numbers\BI\BusinessIntelligence\Model\DataSources',
			'foreign_columns' => ['bi_datasource_tenant_id', 'bi_datasource_code']
		],
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}