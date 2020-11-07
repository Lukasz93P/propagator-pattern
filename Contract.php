<?php

namespace PropagatorPattern;

use PropagatorPattern\Actions\ContractAction;

interface Contract
{
    public function doSomething(): void;

    public function doSomethingElse(): void;

    public function react(ContractAction $action): void;
}