<?php

namespace PropagatorPattern;

use PropagatorPattern\Actions\ContractAction;
use PropagatorPattern\Clauses\Clause;
use PropagatorPattern\Evens\ContractEvent;
use PropagatorPattern\Evens\EmployeeHasReceivedRaise;

class ContractAggregate implements Contract
{
    private int $pay;

    /**
     * @var Clause[]
     */
    private array $clauses;

    public function doSomething(): void
    {
        // Contract is doing something
    }

    public function doSomethingElse(): void
    {
        // Contract is doing something else
    }

    public function react(ContractAction $action): void
    {
        foreach ($this->clauses as $clause) {
            $clause->react($action, $this);
        }
    }

    public function addEvent(ContractEvent $event): void
    {
        //Assume that this method simply adds event to the collection like it is usually done in the aggregate implementations
        $this->registerEvent($event);

        if ($event instanceof EmployeeHasReceivedRaise) {
            $this->applyThatEmployeeHasReceivedRaise($event);
        }
    }

    private function applyThatEmployeeHasReceivedRaise(EmployeeHasReceivedRaise $event): void
    {
        $this->pay = $event->getNewPay();
    }

    public function payValue(): int
    {
        return $this->pay;
    }
}