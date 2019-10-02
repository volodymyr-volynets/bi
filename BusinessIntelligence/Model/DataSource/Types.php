<?php

namespace Numbers\BI\BusinessIntelligence\Model\DataSource;
class Types extends \Object\Data {
	public $module_code = 'BI';
	public $title = 'B/I Data Source Types';
	public $column_key = 'bi_datsrctype_id';
	public $column_prefix = 'bi_datsrctype_';
	public $orderby = ['bi_datsrctype_id' => SORT_ASC];
	public $columns = [
		'bi_datsrctype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'bi_datsrctype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		10 => ['bi_datsrctype_name' => 'Folder'],
		20 => ['bi_datsrctype_name' => 'Query'],
		30 => ['bi_datsrctype_name' => 'Subquery'],
	];
}