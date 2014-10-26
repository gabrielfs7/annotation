<?php

namespace GSoares\Annotation\Sample;

/**
 * @package GSoares\Annotation\Sample
 * @myAnnotationBoolean(true)
 * @myAnnotationString('String name')
 * @myAnnotationString2(String name)
 * @myAnnotationNumber(123)
 * @myAnnotationNumber2(-123.84)
 * @myAnnotationNumber3(123.456)
 * @myAnnotationArray(
 *     [
 *         'a' => 'b',
 *         'c' => 'c',
 *         [
 *             'd' => ['e', 'f']
 *         ]
 *     ]
 * )
 * @myAnnotationArray2(
 *     'a' => 'b',
 *     'c' => 'c',
 *     [
 *         'd' => ['e', 'f']
 *     ]
 * )
 */
class SampleClass
{

    /**
     * @myAnnotationBoolean(true)
     * @myAnnotationString('String name')
     * @myAnnotationString2(String name)
     * @myAnnotationNumber(123)
     * @myAnnotationNumber2(-123.84)
     * @myAnnotationNumber3(123.456)
     * @myAnnotationArray(
     *     [
     *         'a' => 'b',
     *         'c' => 'c',
     *         [
     *             'd' => ['e', 'f']
     *         ]
     *     ]
     * )
     * @myAnnotationArray2(
     *     'a' => 'b',
     *     'c' => 'c',
     *     [
     *         'd' => ['e', 'f']
     *     ]
     * )
     * @var teste
     */
    private $mySampleProperty;

    /**
     * @myAnnotationBoolean(true)
     * @myAnnotationString('String name')
     * @myAnnotationString2(String name)
     * @myAnnotationNumber(123)
     * @myAnnotationNumber2(-123.84)
     * @myAnnotationNumber3(123.456)
     * @myAnnotationArray(
     *     [
     *         'a' => 'b',
     *         'c' => 'c',
     *         [
     *             'd' => ['e', 'f']
     *         ]
     *     ]
     * )
     * @myAnnotationArray2(
     *     'a' => 'b',
     *     'c' => 'c',
     *     [
     *         'd' => ['e', 'f']
     *     ]
     * )
     */
    public function mySampleMethod()
    {

    }
} 