<?php

namespace Numbers\BI\Harvester\Model\Metric;
class Types extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'H9';
	public $title = 'H/9 Metric Types';
	public $name = 'h9_metric_types';
	public $pk = ['h9_metrtype_tenant_id', 'h9_metrtype_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'h9_metrtype_';
	public $columns = [
		'h9_metrtype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'h9_metrtype_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'h9_metrtype_name' => ['name' => 'Name', 'domain' => 'name'],
		'h9_metrtype_model' => ['name' => 'Model', 'domain' => 'code'],
		'h9_metrtype_cron_expression' => ['name' => 'Cron Expression', 'domain' => 'code', 'null' => true],
		'h9_metrtype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'h9_metric_types_pk' => ['type' => 'pk', 'columns' => ['h9_metrtype_tenant_id', 'h9_metrtype_code']],
	];
	public $indexes = [
		'h9_metric_types_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['h9_metrtype_code', 'h9_metrtype_name']]
	];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [
		'h9_metrtype_name' => 'name',
		'h9_metrtype_inactive' => 'inacive'
	];
	public $options_active = [
		'h9_metrtype_inactive' => 0
	];
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