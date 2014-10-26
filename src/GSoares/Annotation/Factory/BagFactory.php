<?php

namespace GSoares\Annotation\Factory;

use GSoares\Annotation\Annotation;
use GSoares\Annotation\AnnotationBag;
use GSoares\Annotation\Exception\InvalidAnnotationValueException;

/**
 * @package GSoares\Annotation\Factory
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class BagFactory
{

    const LEFT_DELIMITER = '(';
    const RIGHT_DELIMITER = ')';

    /**
     * @param $annotation
     * @return AnnotationBag
     */
    public function create($annotation)
    {
        $annotationBag = new AnnotationBag();

        foreach ($this->getAnnotationParts($annotation) as $annotationPart) {
            $annotationBag->add($this->createByPart($annotationPart));
        }

        return $annotationBag;
    }

    /**
     * @param $annotation
     * @return array
     */
    private function getAnnotationParts($annotation)
    {
        $lines = preg_split('/@/', preg_replace('/(\/\*\*)|(\*\/)|(\* )/', '', $annotation));

        array_shift($lines);

        $out = [];

        foreach ($lines as $line) {
            if (trim($line) !== '') {
                $out[] = $line;
            }
        }

        return $out;
    }

    /**
     * @param $annotationPart
     * @return Annotation
     */
    private function createByPart($annotationPart)
    {
        $annotationName = $this->getName($annotationPart);
        $annotationValue = $this->getValue($annotationName, $annotationPart);

        $annotation = new Annotation();
        $annotation->setName($annotationName);
        $annotation->setValue($annotationValue);

        return $annotation;
    }

    /**
     * @param $annotationPart
     * @return string
     */
    private function getName($annotationPart)
    {
        return substr($annotationPart, 0, strpos($annotationPart, self::LEFT_DELIMITER));
    }

    /**
     * @param $annotationName
     * @param $annotationPart
     * @return mixed
     */
    private function getValue($annotationName, $annotationPart)
    {
        $value = str_replace($annotationName, '', $annotationPart);
        $value = trim(trim($value), self::RIGHT_DELIMITER . ',' . self::LEFT_DELIMITER);

        if ($this->isBoolean($value)) {
            return $this->getBooleanValue($value);
        }

        if ($this->isArray($value)) {
            return $this->getArrayValue($value);
        }

        if ($this->isNumber($value)) {
            return $this->getNumberValue($value);
        }

        if ($this->isString($value)) {
            return $this->getStringValue($value);
        }

        return $value;
    }

    /**
     * @param $value
     * @return bool
     */
    private function isBoolean($value)
    {
        return $value === 'false' || $value === 'true';
    }

    /**
     * @param $value
     * @return bool
     */
    private function isString($value)
    {
        $value = trim($value);

        return trim($value, '\'\"') !== $value;
    }

    /**
     * @param $value
     * @return bool
     */
    private function isArray($value)
    {
        return strstr($this->removeBreackLines($value), '=>') !== false;
    }

    /**
     * @param $value
     * @return boolean
     */
    private function isNumber($value)
    {
        return is_numeric($value);
    }

    /**
     * @param $value
     * @return string
     * @throws \GSoares\Annotation\Exception\InvalidAnnotationValueException
     */
    private function getArrayValue($value)
    {
        try {
            $part = $this->removeBreackLines($value);
            $part = preg_replace("/ {2,}/", ' ', $part);
            $part = trim($part);

            if (strpos($part, '[') === 0) {
                $part = trim($part, '[]');
            }

            $part = eval("return([$part]);");
        } catch (\Exception $e) {
            throw new InvalidAnnotationValueException($value);
        }

        return $part;
    }

    /**
     * @param $value
     * @return float|int
     */
    private function getNumberValue($value)
    {
        return strpos($value, '.') !== false ? (float) $value : (int) $value;
    }

    /**
     * @param $value
     * @return string
     */
    private function getStringValue($value)
    {
        return trim(trim($value), '\'\"');
    }

    /**
     * @param $value
     * @return boolean
     */
    private function getBooleanValue($value)
    {
        return $value === 'false' ? false : true;
    }

    /**
     * @param $value
     * @return string
     */
    private function removeBreackLines($value)
    {
        return preg_replace("/[\n]/", '', $value);
    }
}