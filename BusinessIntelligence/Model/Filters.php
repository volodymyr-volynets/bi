<?php

namespace Numbers\BI\BusinessIntelligence\Model;
class Filters extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'BI';
	public $title = 'B/I Filters';
	public $name = 'bi_filters';
	public $pk = ['bi_filter_tenant_id', 'bi_filter_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'bi_filter_';
	public $columns = [
		'bi_filter_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'bi_filter_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'bi_filter_name' => ['name' => 'Name', 'domain' => 'name'],
		'bi_filter_domain' => ['name' => 'Domain', 'domain' => 'code', 'null' => true],
		'bi_filter_type' => ['name' => 'Type', 'domain' => 'code'],
		'bi_filter_abacattr_id' => ['name' => 'ABAC Attribute #', 'domain' => 'attribute_id', 'null' => true],
		'bi_filter_method' => ['name' => 'Method', 'domain' => 'code', 'options_model' => '\Numbers\Tenants\Widgets\Attributes\Model\Methods'],
		'bi_filter_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'bi_filters_pk' => ['type' => 'pk', 'columns' => ['bi_filter_tenant_id', 'bi_filter_code']],
		'bi_filter_name_un' => ['type' => 'unique', 'columns' => ['bi_filter_tenant_id', 'bi_filter_name']],
		'bi_filter_abacattr_id_fk' => [
			'type' => 'fk',
			'columns' => ['bi_filter_abacattr_id'],
			'foreign_model' => '\Numbers\Backend\ABAC\Model\Attributes',
			'foreign_columns' => ['sm_abacattr_id']
		]
	];
	public $indexes = [
		'bi_filters_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['bi_filter_code', 'bi_filter_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'bi_filter_tenant_id' => 'wg_audit_tenant_id',
			'bi_filter_code' => 'wg_audit_filter_code'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'bi_filter_name' => 'name',
		'bi_filter_inactive' => 'inacive'
	];
	public $options_active = [
		'bi_filter_inactive' => 0
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