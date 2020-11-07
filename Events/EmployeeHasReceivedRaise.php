<?php

namespace PropagatorPattern\Evens;

class EmployeeHasReceivedRaise extends ContractEvent
{
    private int $previousPay;

    private int $newPay;

    public function __construct(int $previousPay, int $newPay)
    {
        $this->previousPay = $previousPay;
        $this->newPay = $newPay;
    }

    public function getNewPay(): int
    {
        return $this->newPay;
    }

    public function getPreviousPay(): int
    {
        return $this->previousPay;
    }
}