<?php

namespace spec\Genesis\API\Request\WPF;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use \Genesis\API as API;

require_once __DIR__ . '/../../../SpecHelper.php';

class CreateSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Genesis\API\Request\WPF\Create');
    }

    function it_can_build_stucture()
    {
        $this->setRequestParameters();
        $this->Build();
        $this->getDocument()->shouldNotBeEmpty();
    }

    function it_should_fail_when_no_parameters()
    {
        $this->shouldThrow('\Genesis\Exceptions\BlankRequiredField')->duringSend();
    }

    function it_should_send_without_issues()
    {
        $this->setRequestParameters();
        $this->shouldNotThrow('\Genesis\Exceptions\BlankRequiredField')->duringSend();
        $this->getGenesisResponse()->shouldNotBeEmpty();
    }

    function setRequestParameters()
    {
        $faker = \Faker\Factory::create();

        $faker->addProvider(new \Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new \Faker\Provider\Payment($faker));
        $faker->addProvider(new \Faker\Provider\en_US\Address($faker));
        $faker->addProvider(new \Faker\Provider\en_US\PhoneNumber($faker));
        $faker->addProvider(new \Faker\Provider\Internet($faker));

        $this->setTransactionId(mt_rand(PHP_INT_SIZE, PHP_INT_MAX));
        $this->setAmount(mt_rand(100, 100000));
        $this->setCurrency('USD');
        $this->setUsage($faker->text);
        $this->setDescription('Genesis PHP Client Example Request');
        $this->setNotificationUrl($faker->url);
        $this->setReturnSuccessUrl($faker->url);
        $this->setReturnFailureUrl($faker->url);
        $this->setReturnCancelUrl($faker->url);
        $this->setCustomerEmail($faker->email);
        $this->setCustomerPhone($faker->phoneNumber);
        $this->setBillingFirstName($faker->firstName);
        $this->setBillingLastName($faker->lastName);
        $this->setBillingAddress1($faker->streetAddress);
        $this->setBillingZipCode($faker->postcode);
        $this->setBillingCity($faker->city);
        $this->setBillingState($faker->state);
        $this->setBillingCountry($faker->countryCode);
        $this->addTransactionType('sale');
        $this->addTransactionType('sale3d');
    }

    public function getMatchers()
    {
        return array(
            'beEmpty' => function($subject) {
                    return empty($subject);
                },
        );
    }
}