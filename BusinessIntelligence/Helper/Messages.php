<?php

namespace Numbers\BI\BusinessIntelligence\Helper;
class Messages {
	const PARSE_ERROR = 'Cannot parse query!';
	const PARSE_NO_TABLES = 'Tables not found!';
	const PARSE_ONE_QUERY_ONLY = 'Only one query allowed!';
	const PARSE_SELECT_ONLY = 'Only SELECT queries are allowed!';
	const PARSE_DIRECT_TABLE = 'You cannot query [table] directly!';
	const PARSE_MODEL_NOT_FOUND = 'You must preset [model]!';
	const PARSE_FILTER_NOT_FOUND = 'You must preset [filter]!';
}