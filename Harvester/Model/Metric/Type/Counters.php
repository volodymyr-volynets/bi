<?php

namespace Numbers\BI\Harvester\Model\Metric\Type;
class Counters extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'H9';
	public $title = 'H/9 Metric Type Counters';
	public $name = 'h9_metric_type_counters';
	public $pk = ['h9_metrtpcounter_tenant_id', 'h9_metrtpcounter_metrtype_code', 'h9_metrtpcounter_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'h9_metrtpcounter_';
	public $columns = [
		'h9_metrtpcounter_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'h9_metrtpcounter_metrtype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
		'h9_metrtpcounter_code' => ['name' => 'Code', 'domain' => 'code'],
		'h9_metrtpcounter_name' => ['name' => 'Name', 'domain' => 'name'],
		'h9_metrtpcounter_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'h9_metric_type_counters_pk' => ['type' => 'pk', 'columns' => ['h9_metrtpcounter_tenant_id', 'h9_metrtpcounter_metrtype_code', 'h9_metrtpcounter_code']],
		'h9_metrtpcounter_metrtype_code_fk' => [
			'type' => 'fk',
			'columns' => ['h9_metrtpcounter_tenant_id', 'h9_metrtpcounter_metrtype_code'],
			'foreign_model' => '\Numbers\BI\Harvester\Model\Metric\Types',
			'foreign_columns' => ['h9_metrtype_tenant_id', 'h9_metrtype_code']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [
		'h9_metrtpcounter_name' => 'name',
		'h9_metrtpcounter_inactive' => 'inacive'
	];
	public $options_active = [
		'h9_metrtpcounter_inactive' => 0
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