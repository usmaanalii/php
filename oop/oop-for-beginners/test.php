<?php

    /**
     * Description
     */
    class MyClass
    {
        // Class properties and methods go here
        public $prop1 = "I'm a class property!";

        public static $count = 0;

        public function __construct()
        {
            echo 'The class "', __CLASS__, '" was initiated!<br>';
        }

        public function __destruct()
        {
            echo 'The class "', __CLASS__, '" was destroyed. <br>';
        }

        public function __toString()
        {
            echo "Using the toString method: ";
            return $this->getProperty();
        }

        public function setProperty($newval)
        {
            $this->prop1 = $newval;
        }

        private function getProperty()
        {
            return $this->prop1 . "<br>";
        }

        public static function plusOne()
        {
            return "The count is " . ++self::$count . "<br>";
        }
    }

    class MyOtherClass extends MyClass
    {

        public function __construct()
        {
            parent::__construct(); // call the parent class's constructor
            echo "A new constructor in " . __CLASS__ . "<br>";
        }

        public function newMethod()
        {
            echo "From a new method in " . __CLASS__ . "<br>";
        }

        public function callProtected() // public method to call parent protected method
        {
            return $this->getProperty();
        }
    }

    do
    {
        // Call plusOne without instantiating MyClass
        echo MyClass::plusOne();
    } while ( MyClass::$count < 10 );
?>

<?php
    /**
     * A simple Class
     *
     * This is the long description for this class
     * ....
     *
     * @author Usmaan Ali
     * @copyright 2017
     * @license http://...
     */
    class SimpleClass
    {
        /**
        * A public variable
        *
        * @var string stores data for the class
        */
        public $foo;

        /**
        * Sets $foo to a new value upon class instantiation
        *
        * @param string $val a value required for the class
        * @return void
        */

        public function __construct($val)
        {
            $this->foo = $val;
        }

        /**
        * Multiplies two integers
        *
        * Accepts a pair of integers and returns the
        * product of the two.
        *
        * @param int $bat a number to be multiplied
        * @param int $baz a number to be multiplied
        * @return int the product of the two parameters
        */

        public function bar($bat, $baz)
        {
            return $bat * $baz;
        }
    }

?>
