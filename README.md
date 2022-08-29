# Array to Object Factory

## What is array to object factory?

This is a utility that help you to create a class and all dependencies of the class without mapping the values.

All objects are create using the construct methods so the data have to acomplish the validations you have.

Unique requisite is that the index of the values of the array have to be organize in the same level of hierarchy.

It have declare strict types so value 1 is not the same as '1'. PHP is not going to try to convert the int 1 to string '1'. In that case you will get a TypeError exception.

## Example

```
class SimpleClass
{
    protected string $name;
    protected bool $isActive;

    public function __construct(string $name, bool $isActive)
    {
        $this->name = $name;
        $this->isActive = $isActive;
    }
}
```

You can create this class doing this:

```
$data = [
    'name' => 'John Doe',
    'is_active' => false
];

$object = ArrayToObject::make($data, SimpleClass::class);
```

Array index are transformed to snake, camel and studly case to find the match between the array data and construct params of the object.

You can limit the conversion parssing a third parameter like this:

```
$object = ArrayToObject::make($data, SimpleClass::class, ArrayToObject::SNAKE);
```

Or even don't convert any data:
```
$object = ArrayToObject::make($data, SimpleClass::class, ArrayToObject::NONE);
```

Possible values are: 
```
ArrayToObject::ALL -> By default
ArrayToObject::SNAKE
ArrayToObject::CAMEL
ArrayToObject::STUDLY
ArrayToObject::NONE
```

Getting the original $data array as example:
```
$data = [
    'name' => 'John Doe',
    'is_active' => false
];
```

Array to object factory transform in the next array:

```
$data = [
    'name' => 'John Doe',
    'is_active' => false,
    'isActive' => false,
    'IsActive' => false,
];
```

If some of the index conversion exists in the original array the data will be override and the object can be construct with wrong data, to solve this you can force the conversion type to NONE or only the annotation you need

## Example Complex class

```
class Classroom
{
    protected int $number;
    protected Course $course;

    public function __construct(int $number, Course $course)
    {
        $this->number = $number;
        $this->course = $course;
    }
}

class Course
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

$data = [
    'number' => 1,
    'course' => [
        'Maths'
    ]
];

$result = ArrayToObject::make($data, Classroom::class);
```

## More examples

You can view the test folders to view some examples of collections and more complex class.

Feel free to report any issue and do any pull request to improve the package.

Thank you.