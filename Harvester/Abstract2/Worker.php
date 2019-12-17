<?php

namespace Numbers\BI\Harvester\Abstract2;
abstract class Worker {
	abstract public function measure(string $start, string $finish) : array;
}
