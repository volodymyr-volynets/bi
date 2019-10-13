<?php

namespace Numbers\BI\BusinessIntelligence\Model;
class DataSources extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'BI';
	public $title = 'B/I Data Sources';
	public $name = 'bi_data_sources';
	public $pk = ['bi_datasource_tenant_id', 'bi_datasource_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'bi_datasource_';
	public $columns = [
		'bi_datasource_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'bi_datasource_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'bi_datasource_name' => ['name' => 'Name', 'domain' => 'name'],
		'bi_datasource_sql' => ['name' => 'SQL', 'domain' => 'sql_query'],
		'bi_datasource_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'bi_data_sources_pk' => ['type' => 'pk', 'columns' => ['bi_datasource_tenant_id', 'bi_datasource_code']],
		'bi_datasource_name_un' => ['type' => 'unique', 'columns' => ['bi_datasource_tenant_id', 'bi_datasource_name']],
	];
	public $indexes = [
		'bi_data_sources_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['bi_datasource_code', 'bi_datasource_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'bi_datasource_tenant_id' => 'wg_audit_tenant_id',
			'bi_datasource_code' => 'wg_audit_datasource_code'
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