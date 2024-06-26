<?php

namespace spec\Genesis\Api\Constants\Transaction\Parameters\Threeds\V2\Purchase;


use Genesis\Api\Constants\Transaction\Parameters\Threeds\V2\Purchase\Categories;
use PhpSpec\ObjectBehavior;

class CategoriesSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Categories::class);
    }

    public function it_should_be_array()
    {
        $this->getAll()->shouldBeArray();
    }
}
