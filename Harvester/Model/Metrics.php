<?php

namespace Numbers\BI\Harvester\Model;
class Metrics extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'H9';
	public $title = 'H/9 Metrics';
	public $name = 'h9_metrics';
	public $pk = ['h9_metric_tenant_id', 'h9_metric_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'h9_metric_';
	public $columns = [
		'h9_metric_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'h9_metric_id' => ['name' => 'Metric #', 'domain' => 'big_id_sequence'],
		'h9_metric_metrtype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
		'h9_metric_datetime' => ['name' => 'Datetime', 'type' => 'datetime'],
		'h9_metric_counter1' => ['name' => 'Counter 1', 'domain' => 'bigcounter', 'null' => true, 'default' => null],
		'h9_metric_counter2' => ['name' => 'Counter 2', 'domain' => 'bigcounter', 'null' => true, 'default' => null],
		'h9_metric_counter3' => ['name' => 'Counter 3', 'domain' => 'bigcounter', 'null' => true, 'default' => null],
		'h9_metric_counter4' => ['name' => 'Counter 4', 'domain' => 'bigcounter', 'null' => true, 'default' => null],
		'h9_metric_counter5' => ['name' => 'Counter 5', 'domain' => 'bigcounter', 'null' => true, 'default' => null],
		'h9_metric_amount1' => ['name' => 'Amount 1', 'domain' => 'bigamount', 'null' => true, 'default' => null],
		'h9_metric_amount2' => ['name' => 'Amount 2', 'domain' => 'bigamount', 'null' => true, 'default' => null],
		'h9_metric_amount3' => ['name' => 'Amount 3', 'domain' => 'bigamount', 'null' => true, 'default' => null],
		'h9_metric_amount4' => ['name' => 'Amount 4', 'domain' => 'bigamount', 'null' => true, 'default' => null],
		'h9_metric_amount5' => ['name' => 'Amount 5', 'domain' => 'bigamount', 'null' => true, 'default' => null],
	];
	public $constraints = [
		'h9_metrics_pk' => ['type' => 'pk', 'columns' => ['h9_metric_tenant_id', 'h9_metric_id']],
		'h9_metric_metrtype_code_fk' => [
			'type' => 'fk',
			'columns' => ['h9_metric_tenant_id', 'h9_metric_metrtype_code'],
			'foreign_model' => '\Numbers\BI\Harvester\Model\Metric\Types',
			'foreign_columns' => ['h9_metrtype_tenant_id', 'h9_metrtype_code']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [
		'h9_metric_name' => 'name',
		'h9_metric_inactive' => 'inacive'
	];
	public $options_active = [
		'h9_metric_inactive' => 0
	];
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