<?php

namespace PropagatorPattern\Clauses;

use PropagatorPattern\Actions\BonusAccrued;
use PropagatorPattern\Actions\ContractAction;
use PropagatorPattern\ContractAggregate;
use PropagatorPattern\Evens\EmployeeHasReceivedBonus;

class BonusLimit implements Clause
{
    private int $limit;

    public function react(ContractAction $action, ContractAggregate $contract): void
    {
        if (!$action instanceof BonusAccrued) {
            return;
        }

        $bonusAfterApplyingLimit = min($this->limit, $action->getBonus());

        $contract->addEvent(new EmployeeHasReceivedBonus($bonusAfterApplyingLimit));
    }
}