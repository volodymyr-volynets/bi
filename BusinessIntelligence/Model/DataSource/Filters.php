<?php

namespace Numbers\BI\BusinessIntelligence\Model\DataSource;
class Filters extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'BI';
	public $title = 'B/I Data Source Filters';
	public $name = 'bi_data_source_filters';
	public $pk = ['bi_datsrcfilter_tenant_id', 'bi_datsrcfilter_datasource_code', 'bi_datsrcfilter_filter_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'bi_datsrcfilter_';
	public $columns = [
		'bi_datsrcfilter_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'bi_datsrcfilter_datasource_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'bi_datsrcfilter_filter_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'bi_datsrcfilter_name' => ['name' => 'Name', 'domain' => 'name'],
		'bi_datsrcfilter_mandatory' => ['name' => 'Mandatory', 'type' => 'boolean'],
		'bi_datsrcfilter_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'bi_data_source_filters_pk' => ['type' => 'pk', 'columns' => ['bi_datsrcfilter_tenant_id', 'bi_datsrcfilter_datasource_code', 'bi_datsrcfilter_filter_code']],
		'bi_datsrcfilter_datasource_code_fk' => [
			'type' => 'fk',
			'columns' => ['bi_datsrcfilter_tenant_id', 'bi_datsrcfilter_datasource_code'],
			'foreign_model' => '\Numbers\BI\BusinessIntelligence\Model\DataSources',
			'foreign_columns' => ['bi_datasource_tenant_id', 'bi_datasource_code']
		],
		'bi_datsrcfilter_filter_code_fk' => [
			'type' => 'fk',
			'columns' => ['bi_datsrcfilter_tenant_id', 'bi_datsrcfilter_filter_code'],
			'foreign_model' => '\Numbers\BI\BusinessIntelligence\Model\Filters',
			'foreign_columns' => ['bi_filter_tenant_id', 'bi_filter_code']
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