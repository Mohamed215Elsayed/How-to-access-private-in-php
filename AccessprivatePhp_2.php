<!-- Beware: Visibility works on a per-class-base and does not prevent instances of the same class accessing each others properties! -->

<?php
class Foo
{
    private $name;

    public function debugname(Foo $object)
    {
        // this does NOT violate visibility although $bar is private
        echo $object->name, "\n";
    }

    public function setname($value)
    {
        // Neccessary method, for $name is invisible outside the class
        $this->name = $value;
    }
    
    public function setForeignname(Foo $object, $value)
    {
        // this does NOT violate visibility!
        $object->name = $value;
    }
}

$a = new Foo();//obj1
$b = new Foo();//obj2
$a->setname("mohamed");
$b->setname("elsayed");
$b->debugname($a);//mohamed
$a->debugname($b); //elsayed

$a->setForeignname($b, "ahmed");
$b->setForeignname($a, "ali");
$a->debugname($b);//ahmed
$b->debugname($a);//ali
?>