<?php

namespace spec\Genesis\Api\Constants\Transaction\Parameters\Alternatives;

use Genesis\Api\Constants\Transaction\Parameters\Alternatives\AccountTypes;
use PhpSpec\ObjectBehavior;

class AccountTypesSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountTypes::class);
    }

    public function it_should_be_array()
    {
        $this::getAll()->shouldBeArray();
    }
}
