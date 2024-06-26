<?php

namespace spec\Genesis\Api\Constants\Transaction\Parameters\OnlineBanking\Ideal;

use Genesis\Api\Constants\Transaction\Parameters\OnlineBanking\Ideal\AllowedBanks;
use PhpSpec\ObjectBehavior;

class AllowedBanksSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(AllowedBanks::class);
    }

    public function it_should_be_array()
    {
        $this::getAll()->shouldBeArray();
    }
}
