<?php
namespace GSoares\Annotation;

use GSoares\Annotation\Sample\SampleClass;

require __DIR__ . '/Sample/SampleClass.php';

/**
 * @package GSoares\Annotation\Factory
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class BagFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Reader
     */
    private $reader;

    public function setUp()
    {
        $this->reader = new Reader();
    }

    public function tearDown()
    {
        $this->reader = null;
    }

    /**
     * @test
     */
    public function testReadClass()
    {
        $this->compareBag($this->reader->readClass('GSoares\Annotation\Sample\SampleClass'));
    }

    /**
     * @test
     */
    public function testReadProperty()
    {
        $this->compareBag($this->reader->readProperty('GSoares\Annotation\Sample\SampleClass', 'mySampleProperty'));
    }

    /**
     * @test
     */
    public function testReadMethod()
    {
        $this->compareBag($this->reader->readMethod('GSoares\Annotation\Sample\SampleClass', 'mySampleMethod'));
    }

    private function compareBag(AnnotationBag $bag)
    {
        $this->assertEquals(true, $bag->get('myAnnotationBoolean')->getValue());
        $this->assertEquals('String name', $bag->get('myAnnotationString')->getValue());
        $this->assertEquals('String name', $bag->get('myAnnotationString2')->getValue());
        $this->assertEquals(123, $bag->get('myAnnotationNumber')->getValue());
        $this->assertEquals(-123.84, $bag->get('myAnnotationNumber2')->getValue());
        $this->assertEquals(123.456, $bag->get('myAnnotationNumber3')->getValue());
        $this->assertEquals($this->getArrayValue(), $bag->get('myAnnotationArray')->getValue());
        $this->assertEquals($this->getArrayValue(), $bag->get('myAnnotationArray2')->getValue());
    }

    private function getArrayValue()
    {
        return [
            'a' => 'b',
            'c' => 'c',
            [
                'd' => ['e', 'f']
            ]
        ];
    }
}
