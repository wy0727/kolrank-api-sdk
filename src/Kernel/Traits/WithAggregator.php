<?php

namespace Kolrank\Sdk\Api\Kernel\Traits;

use Kolrank\Sdk\Api\Kernel\Kolrank;

trait WithAggregator
{
    /**
     * Aggregate.
     */
    protected function aggregate()
    {
        foreach (Kolrank::config() as $key => $value) {
            $this['config']->set($key, $value);
        }
    }
}