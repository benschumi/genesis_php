<?php

namespace spec\Genesis\API\Request\Financial\Vouchers;

use PhpSpec\ObjectBehavior;

class AstropayCardSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Genesis\API\Request\Financial\Vouchers\AstropayCard');
    }

    public function it_can_build_structure()
    {
        $this->setRequestParameters();
        $this->getDocument()->shouldNotBeEmpty();
    }

    public function it_should_fail_when_no_parameters()
    {
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_return_success_url_parameter()
    {
        $this->setRequestParameters();
        $this->setReturnSuccessUrl(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_return_failure_url_parameter()
    {
        $this->setRequestParameters();
        $this->setReturnFailureUrl(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_missing_required_amount_param()
    {
        $this->setRequestParameters();
        $this->setAmount(null);
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_fail_when_country_not_br_param()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('BG');
        $this->shouldThrow()->during('getDocument');
    }

    public function it_should_set_consumer_reference_correctly()
    {
        $this->shouldNotThrow()->during(
            'setConsumerReference',
            [str_repeat('8', $this->object->getWrappedObject()->getMaxConsumerReferenceLen())]
        );
    }

    public function it_should_fail_when_consumer_reference_is_invalid()
    {
        $this->shouldThrow()->during(
            'setConsumerReference',
            [str_repeat('8', $this->object->getWrappedObject()->getMaxConsumerReferenceLen() + 1)]
        );
    }

    protected function setRequestParameters()
    {
        $faker = \Faker\Factory::create();

        $faker->addProvider(new \Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new \Faker\Provider\Payment($faker));
        $faker->addProvider(new \Faker\Provider\en_US\Address($faker));
        $faker->addProvider(new \Faker\Provider\en_US\PhoneNumber($faker));
        $faker->addProvider(new \Faker\Provider\Internet($faker));

        $this->setTransactionId($faker->numberBetween(1, PHP_INT_MAX));

        $this->setUsage('Genesis PHP Client Automated Request');
        $this->setRemoteIp($faker->ipv4);
        $this->setReturnSuccessUrl($faker->url);
        $this->setReturnFailureUrl($faker->url);
        $this->setAmount($faker->numberBetween(1, PHP_INT_MAX));
        $this->setCurrency('USD');
        $this->setConsumerReference('1234');
        $this->setCustomerEmail($faker->email);
        $this->setBillingFirstName($faker->firstName);
        $this->setBillingLastName($faker->lastName);
        $this->setBillingAddress1($faker->streetAddress);
        $this->setBillingZipCode($faker->postcode);
        $this->setBillingCity($faker->city);
        $this->setBillingState($faker->state);
        $this->setBillingCountry('BR');
    }

    public function getMatchers()
    {
        return array(
            'beEmpty' => function ($subject) {
                return empty($subject);
            },
        );
    }
}