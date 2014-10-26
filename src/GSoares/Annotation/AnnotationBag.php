<?php
namespace GSoares\Annotation;

/**
 * @package GSoares\RAP\Annotation
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AnnotationBag implements \IteratorAggregate, \Countable
{

    /**
     * @var Annotation[]
     */
    private $annotations;

    public function __construct()
    {
        $this->annotations = [];
    }

    /**
     * @param Annotation $annotation
     */
    public function add(Annotation $annotation)
    {
        $this->annotations[$annotation->getName()] = $annotation;
    }

    /**
     * @param $name
     * @return Annotation
     */
    public function get($name)
    {
        return array_key_exists($name, $this->annotations) ? $this->annotations[$name] : null;
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->$annotations);
    }

    /**
     * @return int
     */
    public function count()
    {
        $this->getIterator()->count();
    }
}