<?php

namespace PropagatorPattern\Clauses;

use PropagatorPattern\Actions\ContractAction;
use PropagatorPattern\ContractAggregate;

interface Clause
{
    public function react(ContractAction $action, ContractAggregate $contract): void;
}