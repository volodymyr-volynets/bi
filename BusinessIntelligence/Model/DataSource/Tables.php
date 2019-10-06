<?php

namespace Numbers\BI\BusinessIntelligence\Model\DataSource;
class Tables extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'BI';
	public $title = 'B/I Data Source Tables';
	public $name = 'bi_data_source_tables';
	public $pk = ['bi_datsrctable_tenant_id', 'bi_datsrctable_datasource_code', 'bi_datsrctable_model_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'bi_datsrctable_';
	public $columns = [
		'bi_datsrctable_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'bi_datsrctable_datasource_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'bi_datsrctable_model_id' => ['name' => 'Model #', 'domain' => 'model_id'],
		'bi_datsrctable_name' => ['name' => 'Name', 'domain' => 'name'],
		'bi_datsrctable_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'bi_data_source_tables_pk' => ['type' => 'pk', 'columns' => ['bi_datsrctable_tenant_id', 'bi_datsrctable_datasource_code', 'bi_datsrctable_model_id']],
		'bi_datsrctable_datasource_code_fk' => [
			'type' => 'fk',
			'columns' => ['bi_datsrctable_tenant_id', 'bi_datsrctable_datasource_code'],
			'foreign_model' => '\Numbers\BI\BusinessIntelligence\Model\DataSources',
			'foreign_columns' => ['bi_datasource_tenant_id', 'bi_datasource_code']
		],
		'bi_datsrctable_model_id_fk' => [
			'type' => 'fk',
			'columns' => ['bi_datsrctable_model_id'],
			'foreign_model' => '\Numbers\Backend\Db\Common\Model\Models',
			'foreign_columns' => ['sm_model_id']
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