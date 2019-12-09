<?php

namespace Numbers\BI\Harvester\Model\Metric;
class FieldIDs extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'H9';
	public $title = 'H/9 Metric Field IDs';
	public $name = 'h9_metric_field_ids';
	public $pk = ['h9_metrfield_tenant_id', 'h9_metrfield_metric_id', 'h9_metrfield_field_code', 'h9_metrfield_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'h9_metrfield_';
	public $columns = [
		'h9_metrfield_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'h9_metrfield_metric_id' => ['name' => 'Metric #', 'domain' => 'big_id'],
		'h9_metrfield_field_code' => ['name' => 'Field Code', 'domain' => 'code'],
		'h9_metrfield_id' => ['name' => 'Field Code', 'domain' => 'big_id'],
	];
	public $constraints = [
		'h9_metric_field_ids_pk' => ['type' => 'pk', 'columns' => ['h9_metrfield_tenant_id', 'h9_metrfield_metric_id', 'h9_metrfield_field_code', 'h9_metrfield_id']],
		'h9_metrfield_metric_id_fk' => [
			'type' => 'fk',
			'columns' => ['h9_metrfield_tenant_id', 'h9_metrfield_metric_id'],
			'foreign_model' => '\Numbers\BI\Harvester\Model\Metrics',
			'foreign_columns' => ['h9_metric_tenant_id', 'h9_metric_id']
		]
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