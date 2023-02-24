<?php

namespace spec\Genesis\API\Constants\NonFinancial\KYC;

use Genesis\API\Constants\NonFinancial\KYC\ProfileCurrentStatuses;
use PhpSpec\ObjectBehavior;

/**
 * Class ProfileCurrentStatuses
 * @package spec\Genesis\API\Constants\NonFinancial\KYC
 */
class ProfileCurrentStatusesSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ProfileCurrentStatuses::class);
    }

    public function it_should_be_array()
    {
        $this->getAll()->shouldBeArray();
    }
}
