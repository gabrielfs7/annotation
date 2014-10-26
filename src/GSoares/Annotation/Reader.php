<?php

namespace GSoares\Annotation;

use GSoares\Annotation\Factory\BagFactory;

/**
 * @package GSoares\Annotation
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Reader
{

    /**
     * @var BagFactory
     */
    private $bagFactory;

    public function __construct(BagFactory $bagFactory = null)
    {
        $this->bagFactory = $bagFactory ?: new BagFactory();
    }

    /**
     * @param $className
     * @return mixed
     */
    public function readClass($className)
    {
        return $this->bagFactory->create((new \ReflectionClass($className))->getDocComment());
    }

    /**
     * @param $className
     * @param $propertyName
     * @return mixed
     */
    public function readProperty($className, $propertyName)
    {
        return $this->bagFactory->create((new \ReflectionProperty($className, $propertyName))->getDocComment());
    }

    /**
     * @param $className
     * @param $methodName
     * @return mixed
     */
    public function readMethod($className, $methodName)
    {
        return $this->bagFactory->create((new \ReflectionMethod($className, $methodName))->getDocComment());
    }
}