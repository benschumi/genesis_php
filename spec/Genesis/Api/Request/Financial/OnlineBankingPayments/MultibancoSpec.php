<?php

namespace spec\Genesis\Api\Request\Financial\OnlineBankingPayments;

use Genesis\Api\Request\Financial\OnlineBankingPayments\Multibanco;
use PhpSpec\ObjectBehavior;
use spec\SharedExamples\Genesis\Api\Request\Financial\AsyncAttributesExample;
use spec\SharedExamples\Genesis\Api\Request\Financial\NeighborhoodAttributesExamples;
use spec\SharedExamples\Genesis\Api\Request\Financial\PendingPaymentAttributesExamples;
use spec\SharedExamples\Genesis\Api\Request\RequestExamples;

class MultibancoSpec extends ObjectBehavior
{
    use AsyncAttributesExample;
    use NeighborhoodAttributesExamples;
    use PendingPaymentAttributesExamples;
    use RequestExamples;

    public function it_is_initializable()
    {
        $this->shouldHaveType(Multibanco::class);
    }

    public function it_should_fail_when_missing_required_params()
    {
        $this->testMissingRequiredParameters([
            'amount',
            'currency',
            'billing_country',
            'return_success_url',
            'return_failure_url'
        ]);
    }

    public function it_should_fail_when_country_not_valid_param()
    {
        $this->setRequestParameters();
        $this->setBillingCountry('BG');
        $this->shouldThrow()->during('getDocument');
    }

    protected function setRequestParameters()
    {
        $this->setDefaultRequestParameters();

        $this->setCurrency('EUR');
        $this->setBillingCountry('PT');
    }

    public function it_should_fail_when_email_not_valid_param()
    {
        $this->shouldThrow()->during('setCustomerEmail', [ 'fdsfsfsf' ]);
    }
}
