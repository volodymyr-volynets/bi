<?php

namespace Numbers\BI\Harvester\Harvester;
class ActiveSessions extends \Numbers\BI\Harvester\Abstract2\Worker {

	/**
	 * Measure
	 *
	 * @param string $start
	 * @param string $finish
	 * @return array
	 */
	public function measure(string $start, string $finish) : array {
		$result = [
			'success' => false,
			'error' => [],
		];
		// query database
		$query = \Numbers\Backend\Session\Db\Model\Sessions::queryBuilderStatic(['alias' => 'a', 'skip_acl' => true])->select();
		$query->columns([
			'counter' => 'COUNT(*)',
			'pages_total' => 'SUM(a.sm_session_pages_count)',
			'request_total' => 'SUM(a.sm_session_request_count)'
		]);
		$query->where('AND', ['a.sm_session_tenant_id', '=', \Tenant::id()]);
		$query->where('AND', ['a.sm_session_expires', '>=', 'now()', true]);
		$data = $query->query();
		return \Numbers\BI\Harvester\Model\Metrics::collectionStatic()->merge([
			'h9_metric_metrtype_code' => 'SM_ACTIVE_SESSIONS',
			'h9_metric_datetime' => $start,
			'h9_metric_counter1' => $data['rows'][0]['counter'] ?? 0,
			'h9_metric_counter2' => $data['rows'][0]['pages_total'] ?? 0,
			'h9_metric_counter3' => $data['rows'][0]['request_total'] ?? 0,
		]);
	}
}