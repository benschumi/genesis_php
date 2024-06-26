<?php

namespace spec\Genesis\Api\Constants\Transaction\Parameters\Alternatives;

use Genesis\Api\Constants\Transaction\Parameters\Alternatives\PurposeOfRemittances;
use PhpSpec\ObjectBehavior;

class PurposeOfRemittancesSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(PurposeOfRemittances::class);
    }

    public function it_should_be_array()
    {
        $this::getAll()->shouldBeArray();
    }
}
