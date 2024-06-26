<?php

namespace spec\Genesis\Api\Request\Financial\Preauthorization;

use Genesis\Api\Request\Financial\Preauthorization\PartialReversal;
use PhpSpec\ObjectBehavior;
use spec\SharedExamples\Genesis\Api\Request\RequestExamples;

class PartialReversalSpec extends ObjectBehavior
{
    use RequestExamples;

    public function it_is_initializable()
    {
        $this->shouldHaveType(PartialReversal::class);
    }

    public function it_should_fail_when_missing_required_params()
    {
        $this->testMissingRequiredParameters([
            'reference_id',
            'amount',
            'currency'
        ]);
    }

    protected function setRequestParameters()
    {
        $faker = $this->getFaker();

        $this->setTransactionId($faker->numberBetween(1, PHP_INT_MAX));
        $this->setAmount(100);
        $this->setCurrency('EUR');
        $this->setReferenceId($faker->numberBetween(1, PHP_INT_MAX));
    }
}
