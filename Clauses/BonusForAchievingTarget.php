<?php

namespace PropagatorPattern\Clauses;

use PropagatorPattern\Actions\BonusAccrued;
use PropagatorPattern\Actions\ContractAction;
use PropagatorPattern\Actions\TargetAchieved;
use PropagatorPattern\ContractAggregate;

class BonusForAchievingTarget implements Clause
{
    private float $bonusPercentage;

    public function react(ContractAction $action, ContractAggregate $contract): void
    {
        if (!$action instanceof TargetAchieved) {
            return;
        }

        $bonus = $contract->payValue() * $this->bonusPercentage;

        $contract->react(new BonusAccrued($bonus));
    }
}