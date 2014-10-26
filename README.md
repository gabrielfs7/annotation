Annotation PHP!
=============

Create and retrieve content from your own PHP Class Annotations!

Samples
=============

```php
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

?>
```

### Read Class Annotations

```php
<?php
$reader = new GSoares\Annotation\Reader();
$annotationBag = $reader->readClass('GSoares\Annotation\Sample\SampleClass');

$annotationBag->get('myAnnotationBoolean'); //(boolean) true
$annotationBag->get('myAnnotationString'); //(string) String name
$annotationBag->get('myAnnotationString2'); //(string) String name
$annotationBag->get('myAnnotationNumber'); //(int) 123
$annotationBag->get('myAnnotationNumber2'); //(int) -123.84
$annotationBag->get('myAnnotationNumber3'); //(float) 123.456
$annotationBag->get('myAnnotationArray'); //(Array) ['a' => 'b', 'c' => 'c', ['d' => ['e', 'f']]]
$annotationBag->get('myAnnotationArray2'); //(Array) ['a' => 'b', 'c' => 'c', ['d' => ['e', 'f']]]
?>
```

### Read Class Property Annotations

```php
<?php
$reader = new GSoares\Annotation\Reader();
$annotationBag = $reader->readProperty(
    'GSoares\Annotation\Sample\SampleClass',
    'mySampleProperty'
);

$annotationBag->get('myAnnotationBoolean'); //(boolean) true
$annotationBag->get('myAnnotationString'); //(string) String name
$annotationBag->get('myAnnotationString2'); //(string) String name
$annotationBag->get('myAnnotationNumber'); //(int) 123
$annotationBag->get('myAnnotationNumber2'); //(int) -123.84
$annotationBag->get('myAnnotationNumber3'); //(float) 123.456
$annotationBag->get('myAnnotationArray'); //(Array) ['a' => 'b', 'c' => 'c', ['d' => ['e', 'f']]]
$annotationBag->get('myAnnotationArray2'); //(Array) ['a' => 'b', 'c' => 'c', ['d' => ['e', 'f']]]
?>
```

### Read Class Method Annotations

```php
<?php
$reader = new GSoares\Annotation\Reader();
$annotationBag = $reader->readMethod(
    'GSoares\Annotation\Sample\SampleClass',
    'mySampleMethod'
);

$annotationBag->get('myAnnotationBoolean'); //(boolean) true
$annotationBag->get('myAnnotationString'); //(string) String name
$annotationBag->get('myAnnotationString2'); //(string) String name
$annotationBag->get('myAnnotationNumber'); //(int) 123
$annotationBag->get('myAnnotationNumber2'); //(int) -123.84
$annotationBag->get('myAnnotationNumber3'); //(float) 123.456
$annotationBag->get('myAnnotationArray'); //(Array) ['a' => 'b', 'c' => 'c', ['d' => ['e', 'f']]]
$annotationBag->get('myAnnotationArray2'); //(Array) ['a' => 'b', 'c' => 'c', ['d' => ['e', 'f']]]
?>
```

Installation
=============

1. Project available in https://packagist.org/packages/gabrielfs7/annotation to install via composer.
