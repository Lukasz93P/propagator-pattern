<?php

namespace PropagatorPattern\Actions;

class BonusAccrued implements ContractAction
{
    private int $bonus;

    public function __construct(int $bonus)
    {
        $this->bonus = $bonus;
    }

    public function getBonus(): int
    {
        return $this->bonus;
    }
}