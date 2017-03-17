5.24 - Inheriting and extending a class
<?php

    $object = new Subscriber;
    $object->name = "Fred";
    $object->password = "pword";
    $object->phone = "012 345 6789";
    $object->email = "Fred@bloggs.com";
    $object->display();

    class User
    {
        public $name, $password;

        function save_user()
        {
            echo "Save User code goes here";
        }
    }

    class Subscriber extends User
    {
        public $phone, $email;

        function display()
        {
            echo "Name: " . $this->name . "\n";
            echo "Pass: " . $this->password . "\n";
            echo "Phone: " . $this->phone . "\n";
            echo "Email: " . $this->email;
        }
    }
?>

5.25 - Overriding a method and using the parent operator
<?php
    $object = new Son;
    $object->test(); // Luke
    $object->test2(); // Father

    class Dad
    {
        function test()
        {
            echo "[Class Dad] I am your father\n";
        }
    }

    class Son extends Dad
    {
        function test()
        {
            echo "[Class Son] I am Luke\n";
        }

        function test2()
        {
            parent::test(); // uses the original method
        }
    }

?>

5.6 - Calling the parent class Constructor
<?php
    $object = new Tiger();

    echo "Tigers have..\n";
    echo "Fur: " . $object->fur . "\n";
    echo "Stripes: " . $object->stripes;

    class Wildcat
    {
        public $fur; // Wildcats have fur

        function __construct()
        {
            $this->fur = "TRUE";
        }
    }

    class Tiger extends Wildcat
    {
        public $stripes; // Tigers have stripes

        function __construct()
        {
            parent::__construct(); // Call parent constructor first
            $this->stripes = "TRUE";
        }
    }

?>

5.27 - Creating a final method
<?php
    class User
    {
        final function copyright()
        {
            echo "This class was written by Usmaan Ali";
        }
    }
?>
