<?php
namespace GSoares\Annotation\Factory;

use GSoares\Annotation\Annotation;
use GSoares\Annotation\AnnotationBag;

/**
 * @package GSoares\Annotation\Factory
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class BagFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BagFactory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new BagFactory();
    }

    public function tearDown()
    {
        $this->factory = null;
    }

    /**
     * @test
     */
    public function testCreateAnnotationBoolean()
    {
        $annotation1 = $this->createAnnotation('myAnnotationBoolean1', true);
        $annotation2 = $this->createAnnotation('myAnnotationBoolean2', false);

        $bag = new AnnotationBag();
        $bag->add($annotation1);
        $bag->add($annotation2);

        $this->assertEquals($bag, $this->factory->create($this->getAnnotationBoolean()));
    }

    /**
     * @test
     */
    public function testCreateAnnotationString()
    {
        $annotation1 = $this->createAnnotation('myAnnotationString1', 'true');
        $annotation2 = $this->createAnnotation('myAnnotationString2', '
         multiple line *(&^%$#()
         string false
         ');

        $bag = new AnnotationBag();
        $bag->add($annotation1);
        $bag->add($annotation2);

        $this->assertEquals($bag, $this->factory->create($this->getAnnotationString()));
    }

    /**
     * @test
     */
    public function testCreateAnnotationNumber()
    {
        $annotation1 = $this->createAnnotation('myAnnotationNumber1', 1234);
        $annotation2 = $this->createAnnotation('myAnnotationNumber2', -1234);
        $annotation3 = $this->createAnnotation('myAnnotationNumber3', 1.234);

        $bag = new AnnotationBag();
        $bag->add($annotation1);
        $bag->add($annotation2);
        $bag->add($annotation3);

        $this->assertEquals($bag, $this->factory->create($this->getAnnotationNumber()));
    }

    /**
     * @test
     */
    public function testCreateAnnotationArray()
    {
        $array = [
            'index' => 'value',
            1 => true,
            'matrix' => [
                'a' => 'b'
            ]
        ];

        $annotation1 = $this->createAnnotation('myAnnotationArray1', $array);
        $annotation2 = $this->createAnnotation('myAnnotationArray2', $array);

        $bag = new AnnotationBag();
        $bag->add($annotation1);
        $bag->add($annotation2);

        $result = $this->factory->create($this->getAnnotationArray());

        $this->assertEquals($bag, $result);
    }

    private function getAnnotationNumber()
    {
        return "
        /** Comment that does not matter
         * Comment that does not matter
         *
         * @myAnnotationNumber1(1234)
         * @myAnnotationNumber2(-1234)
         * @myAnnotationNumber3(1.234)
         */
        ";
    }

    private function getAnnotationString()
    {
        return "
        /** Comment that does not matter
         * Comment that does not matter
         *
         * @myAnnotationString1('true')
         * @myAnnotationString2('
         * multiple line *(&^%$#()
         * string false
         * '
         * )
         */
        ";
    }

    private function getAnnotationBoolean()
    {
        return "
        /** Comment that does not matter
         * Comment that does not matter
         *
         * @myAnnotationBoolean1(true)
         * @myAnnotationBoolean2(false)
         */
        ";
    }

    private function getAnnotationArray()
    {
        return "
        /** Comment that does not matter
         * Comment that does not matter
         *
         * @myAnnotationArray1(
         *    [
         *        'index' => 'value',
         *        1 => true,
         *        'matrix' => [
         *            'a' => 'b'
         *        ]
         *    ]
         * )
         * @myAnnotationArray2(
         *    'index' => 'value',
         *    1 => true,
         *    'matrix' => [
         *        'a' => 'b'
         *    ]
         * )
         */
        ";
    }

    /**
     * @param $name
     * @param $value
     * @return Annotation
     */
    private function createAnnotation($name, $value)
    {
        $annotation = new Annotation();
        $annotation->setName($name);
        $annotation->setValue($value);

        return $annotation;
    }
}
