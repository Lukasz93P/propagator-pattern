<?php

namespace PropagatorPattern\Clauses;

use PropagatorPattern\Actions\ContractAction;
use PropagatorPattern\Actions\TargetAchieved;
use PropagatorPattern\ContractAggregate;
use PropagatorPattern\Evens\EmployeeHasReceivedRaise;

class RaiseForAchievingTarget implements Clause
{
    private float $raisePercentage;

    public function react(ContractAction $action, ContractAggregate $contract): void
    {
        if (!$action instanceof TargetAchieved) {
            return;
        }

        $previousPay = $contract->payValue();
        $newPay = $previousPay * (1 + $this->raisePercentage);

        $contract->addEvent(new EmployeeHasReceivedRaise($previousPay, $newPay));
    }
}