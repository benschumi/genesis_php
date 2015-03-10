<?php

namespace spec\Genesis\Builders\XML;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class XMLWriterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Genesis\Builders\XML\XMLWriter');
    }

    function it_can_generate_content()
    {
        $this->populateNodes(array('root' => array('node1'=>'value1', 'node2'=>'value2')));
        $this->getOutput()->shouldNotBeEmpty();
    }

    function it_can_generate_valid_xml()
    {
        $this->populateNodes(array('root' => array('node1'=>'value1', 'node2'=>'value2')));
        $this->getOutput()->shouldNotBeEmpty();
        $this->getOutput()->shouldBeValidXML();
    }

	function it_can_escape_illegal_characters()
	{
		$this->populateNodes(array('root' => array('amp'=>'http://domain.tld/?arg1=normal&arg2=<&arg3=>'), null));
		$this->getOutput()->shouldNotBeEmpty();
		$this->getOutput()->shouldBeValidXML();
		$this->getOutput()->shouldMatch('/&lt;/');
		$this->getOutput()->shouldMatch('/&amp;/');
		$this->getOutput()->shouldMatch('/&gt;/');
	}

    function getMatchers()
    {
        return array(
            'beEmpty' => function($subject) {
                return empty($subject);
            },
            'beValidXML' => function($subject) {
                return (simplexml_load_string($subject)) ? true : false;
            },
        );
    }
}
