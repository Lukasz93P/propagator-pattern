<?php

namespace PropagatorPattern\Evens;

class EmployeeHasReceivedBonus extends ContractEvent
{
    private int $bonusValue;

    public function __construct(int $bonusValue)
    {
        $this->bonusValue = $bonusValue;
    }

    public function getBonusValue(): int
    {
        return $this->bonusValue;
    }
}