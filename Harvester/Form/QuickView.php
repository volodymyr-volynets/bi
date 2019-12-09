<?php

namespace Numbers\BI\Harvester\Form;
class QuickView extends \Object\Form\Wrapper\Report {
	public $form_link = 'h9_quick_view';
	public $module_code = 'H(';
	public $title = 'H/9 Quick View Report';
	public $options = [
		'segment' => self::SEGMENT_REPORT,
		'actions' => [
			'refresh' => true,
			'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
		]
	];
	public $containers = [
		'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
		'filter' => ['default_row_type' => 'grid', 'order' => 1500],
		'types' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\BI\Harvester\Model\Metric\Type\Counters',
			'details_pk' => ['h9_metrtpcounter_metrtype_code', 'h9_metrtpcounter_code'],
			'required' => true,
			'order' => 1600,
		],
		'sort' => self::LIST_SORT_CONTAINER,
		self::REPORT_BUTTONS => ['default_row_type' => 'grid', 'order' => 2000, 'class' => 'numbers_form_filter_sort_container'],
	];
	public $rows = [
		'tabs' => [
			'filter' => ['order' => 100, 'label_name' => 'Filter'],
			'sort' => ['order' => 400, 'label_name' => 'Sort'],
		]
	];
	public $elements = [
		'tabs' => [
			'filter' => [
				'filter' => ['container' => 'filter', 'order' => 100],
				'types' => ['container' => 'types', 'order' => 100]
			],
			'sort' => [
				'sort' => ['container' => 'sort', 'order' => 100]
			]
		],
		'filter' => [
			'dates' => [
				'start_date' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Start Datetime', 'type' => 'datetime', 'null' => true, 'required' => true, 'percent' => 40, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'end_date' => ['order' => 2, 'label_name' => 'End Datetime', 'type' => 'datetime', 'null' => true, 'required' => true, 'percent' => 40, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'interval' => ['order' => 3, 'label_name' => 'Interval', 'domain' => 'code', 'null' => true, 'default' => '15 minutes', 'required' => true, 'percent' => 20, 'method' => 'select', 'options_model' => '\Numbers\Framework\Helper\Model\Date\Intervals', 'options_options' => ['i18n' => 'skip_sorting']],
			]
		],
		'types' => [
			'row1' => [
				'h9_metrtpcounter_metrtype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\BI\Harvester\Model\Metric\Types::optionsActive', 'onchange' => 'this.form.submit();'],
				'h9_metrtpcounter_code' => ['order' => 2, 'label_name' => 'Counter', 'domain' => 'code', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\BI\Harvester\Model\Metric\Type\Counters::optionsActive', 'options_depends' => ['h9_metrtpcounter_metrtype_code' => 'detail::h9_metrtpcounter_metrtype_code']],
			]
		],
		'sort' => [
			'__sort' => [
				'__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::REPORT_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
				'__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
			]
		],
		self::REPORT_BUTTONS => self::REPORT_BUTTONS_DATA
	];
	const REPORT_SORT_OPTIONS = [
		'time' => ['name' => 'Time'],
	];
	public $report_default_sort = [
		'time' => SORT_ASC
	];
	public function buildReport(& $form) {
		// create new report
		$report = new \Object\Form\Builder\Report();
		// chart
		if (!empty($form->values['__graph'])) {
			$report->addReport(CHART, $form, [
				'skip_filter' => true,
				'type' => CHART,
				'chart_type' => 'lines',
				'chart_name' => 'Metrics',
				'chart_labels_column' => 'datetime',
				'chart_limit' => 23
			]);
			$report->addHeader(CHART, 'row1', [
				'um_user_name' => ['label_name' => self::BYGROUP[$form->values['__group']]['name'], 'percent' => 30],
				'num_of_jobs' => ['label_name' => 'Jobs', 'percent' => 5, 'align' => 'right'],
			]);
		}
		$counter_columns = array_extract_values_by_key($form->values['\Numbers\BI\Harvester\Model\Metric\Type\Counters'], 'h9_metrtpcounter_code', ['unique' => true]);
		$all_columns = array_merge(['h9_metric_id', 'h9_metric_metrtype_code', 'h9_metric_datetime'], $counter_columns);
		$data = \Numbers\BI\Harvester\Model\Metrics::getStatic([
			'where' => [
				'h9_metric_metrtype_code' => array_extract_values_by_key($form->values['\Numbers\BI\Harvester\Model\Metric\Type\Counters'], 'h9_metrtpcounter_metrtype_code', ['unique' => true]),
				'h9_metric_datetime;>=' => $form->values['start_date'],
				'h9_metric_datetime;<=' => $form->values['end_date'],
			],
			'columns' => $all_columns,
			'pk' => ['h9_metric_id']
		]);
		$all_counter_names = \Numbers\BI\Harvester\Model\Metric\Type\Counters::getStatic([
			'pk' => ['h9_metrtpcounter_metrtype_code', 'h9_metrtpcounter_code']
		]);
		// report
		$report->addReport(DEF, $form);
		$row1 = [
			'datetime' => ['label_name' => 'Datetime', 'percent' => 20],
		];
		$percent = 80 / count($form->values['\Numbers\BI\Harvester\Model\Metric\Type\Counters']);
		foreach ($form->values['\Numbers\BI\Harvester\Model\Metric\Type\Counters'] as $k => $v) {
			$row1[$k] = ['label_name' => $all_counter_names[$v['h9_metrtpcounter_metrtype_code']][$v['h9_metrtpcounter_code']]['h9_metrtpcounter_name'], 'percent' => $percent, 'align' => 'right'];
		}
		$report->addHeader(DEF, 'row1', $row1);
		// add data to report
		$counter = 1;
		$date0 = $form->values['start_date'];
		do {
			$date1 = \Helper\Date::addInterval($date0, '+' . $form->values['interval']);
			$date1 = \Helper\Date::addInterval($date1, '-1 second');
			$one_row = [
				'datetime' => \Format::datetime($date0),
			];
			$data_founds = [];
			foreach ($form->values['\Numbers\BI\Harvester\Model\Metric\Type\Counters'] as $k => $v) {
				$one_row[$k] = 0;
				foreach ($data as $k2 => $v2) {
					if ($v2['h9_metric_metrtype_code'] == $v['h9_metrtpcounter_metrtype_code']) {
						if (\Helper\Date::between($v2['h9_metric_datetime'], $date0, $date1)) {
							$one_row[$k]+= $v2[$v['h9_metrtpcounter_code']];
							$data_founds[$k2] = $k2;
						}
					}
				}
			}
			foreach ($data_founds as $v) {
				unset($data[$v]);
			}
			$even = $counter % 2 ? ODD : EVEN;
			$report->addData(DEF, 'row1', $even, $one_row);
			// chart
			if (!empty($form->values['__graph'])) {
				$report->addData(CHART, 'row1', $even, $chart);
			}
			// increment
			$counter++;
			$date0 = \Helper\Date::addInterval($date0, '+' . $form->values['interval']);
		} while(\Helper\Date::is($date0, $form->values['end_date']) <= 0);
		// add number of rows
		$report->addNumberOfRows(DEF, $counter - 1);
		// free up memory
		unset($data);
		// we must return report object
		return $report;
	}
}