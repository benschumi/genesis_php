<?php

namespace spec\Genesis\Api\Constants\Transaction\Parameters;

use Genesis\Api\Constants\Transaction\Parameters\MpiProtocolVersions;
use PhpSpec\ObjectBehavior;

class MpiProtocolVersionsSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(MpiProtocolVersions::class);
    }

    public function it_should_be_array()
    {
        $this->getAll()->shouldBeArray();
    }
}
