<?php
class Test
{
    private $name;
    public function __construct($username)
    {
        $this->name = $username;
    }
    private function private_bar()
    {
        echo 'Accessed the private method(private_bar).';
    }
    public function baz(Test $other)
    {
        // We can change the private property:
        $other->name = 'hello';
        echo $other->name ."<br>";
        // We can also call the private method:
        $other->private_bar();
    }
}
$test = new Test('test');
// echo $test->name;//Fatal error: Uncaught Error: Cannot access private property Test::$name from global scope
// $test->private_bar();//fatal error: Uncaught Error: Call to private method Test::private_bar() from global scope
$test->baz(new Test('other'));
// our output 
// hello
// Accessed the private method(private_bar).
