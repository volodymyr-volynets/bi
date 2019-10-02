<?php

namespace Numbers\BI\BusinessIntelligence\Model;
class DataSources extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'BI';
	public $title = 'B/I Data Sources';
	public $name = 'bi_data_sources';
	public $pk = ['bi_datasource_tenant_id', 'bi_datasource_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'bi_datasource_';
	public $columns = [
		'bi_datasource_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'bi_datasource_id' => ['name' => 'Data Source #', 'domain' => 'datasource_id_sequence'],
		'bi_datasource_parent_datasource_id' => ['name' => 'Parent Data Source #', 'domain' => 'datasource_id', 'null' => true],
		'bi_datasource_name' => ['name' => 'Name', 'domain' => 'name'],
		'bi_datasource_type_id' => ['name' => 'Type #', 'domain' => 'type_id', 'options_model' => '\Numbers\BI\BusinessIntelligence\Model\DataSource\Types'],
		'bi_datasource_sql' => ['name' => 'SQL', 'domain' => 'sql_query', 'null' => true],
		'bi_datasource_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'bi_data_sources_pk' => ['type' => 'pk', 'columns' => ['bi_datasource_tenant_id', 'bi_datasource_id']],
		'bi_datasource_name_un' => ['type' => 'unique', 'columns' => ['bi_datasource_tenant_id', 'bi_datasource_name']],
		'bi_datasource_parent_datasource_id_fk' => [
			'type' => 'fk',
			'columns' => ['bi_datasource_tenant_id', 'bi_datasource_parent_datasource_id'],
			'foreign_model' => '\Numbers\BI\BusinessIntelligence\Model\DataSources',
			'foreign_columns' => ['bi_datasource_tenant_id', 'bi_datasource_id']
		]
	];
	public $indexes = [
		'bi_data_sources_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['bi_datasource_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'bi_datasource_tenant_id' => 'wg_audit_tenant_id',
			'bi_datasource_id' => 'wg_audit_datasource_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}