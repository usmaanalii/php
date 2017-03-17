5.10 - Declaring a class and examining an object
<?php
    $object = new User;
    print_r($object);

    /**
     *  Docs ?
     */
    class User
    {
        public $name, $password;

        function save_user()
        {
            echo "Save User code goes here";
        }
    }

?>

5.11 - Creating and interacting with an object
<?php
    $object = new User;
    print_r($object); echo "\n";

    $object->name = "Joe";
    $object->password = "mypass";
    print_r($object); echo "\n";

    $object->save_user();

    /**
     *  Docs ?
     */
    class User
    {
        public $name, $password;

        function save_user()
        {
            echo "Save User code goes here";
        }
    }

?>

5.12 - Copying an object?
<?php
    $object1 = new User();
    $object1->name = "Alice";

    $object2 = $object1;
    $object2->name = "Amy";

    echo "object1 name = " . $object1->name . "\n"; // Amy !! (reference)
    echo "object2 name = " . $object2->name . "\n"; // Amy

    class User
    {
        public $name;
    }
?>

5.13 - Cloning an object
<?php
    $object1 = new User();
    $object1->name = "Alice";

    $object2 = clone $object1; // clone keyword
    $object2->name = "Amy";

    echo "object1 name = " . $object1->name . "\n"; // Amy !! (reference)
    echo "object2 name = " . $object2->name . "\n"; // Amy

    class User
    {
        public $name;
    }
?>

5.14 - Creating a constructor method
<?php
    class User
    {

        function User($param1, $param2) {
        }

        // Constructor statements
        public $username = "Guest";
    }
?>

5.15 - Creating a constructor method in PHP5
<?php
    class User
    {

        function __construct($param1, $param2)
        {
            // Constructor statements
            // public $username = "Guest";
        }
    }
?>


5.16 - Creating a destructor method in PHP5
<?php
    class User
    {
        function __destruct()
        {
            // Destructor code code goes here
        }
    }
?>

5.17 - Using the variable $this in a method
<?php
    class User
    {
        public $name, $password;

        function get_password()
        {
            return $this->password;
        }
    }

    $object = new User;
    $object->password = "secret";

    echo $object->get_password(); // secret
?>

5.18 - Creating and accessing a static method
<?php
    User::pwd_string();

    class User
    {
        static function pwd_string()
        {
            echo "Please enter your password";
        }
    }
?>

5.19 - Defining a property implicitly
<?php
    $object1 = new User();
    $object1->name = "Alice";

    echo $object1->name; // Alice
    class User {}
?>

5.20 - Valid and invalid property declarations
<?php
    class Test
    {
        public $name = "Paul Smith"; // Valid
        public $age = 42; // Valid
        // public $time = time();  InValid
        // public $score = $level * 2; Invalid
    }
?>

5.21 - Defining constants within a class
<?php
    Translate::lookup();

    class Translate
    {
        const ENGLISH = 0;
        const SPANISH = 1;
        const FRENCH = 2;
        const GERMAN = 3;
        // ......

        static function lookup()
        {
            echo self::SPANISH;
        }
    }
?>

5.22 - Changing property and method scope
<?php
    class Example
    {
        var $name = "Michael"; // Same as public
        public $age = 23; // Public property
        protected $usercount; // Protected property

        private function admin() // Private method
        {
            // Admin code goes here
        }
    }
?>

5.23 - Defining a class with a static property
<?php
    $temp = new Test();
    // trying to access static property from Class
    echo "Test A: " . Test::$static_property . "\n";
    // trying to access static method from instance
    echo "Test B: " . $temp->get_sp() . "\n";
    // undefined - trying to access static property from instance
    echo "Test C: " . $temp->$static_property . "\n";

    class Test
    {
        static $static_property = "I'm static";

        function get_sp()
        {
            return self::$static_property;
        }
    }
?>
