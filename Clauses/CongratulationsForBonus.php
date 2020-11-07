<?php

namespace PropagatorPattern\Clauses;

use PropagatorPattern\Actions\BonusAccrued;
use PropagatorPattern\Actions\ContractAction;
use PropagatorPattern\ContractAggregate;
use PropagatorPattern\Evens\EmployeeReceivedCongratulations;

class CongratulationsForBonus implements Clause
{
    public function react(ContractAction $action, ContractAggregate $contract): void
    {
        if (!$action instanceof BonusAccrued) {
            return;
        }

        $contract->addEvent(new EmployeeReceivedCongratulations());
    }
}