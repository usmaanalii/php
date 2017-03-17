<?php
    /**
     * Description of the class...
     */
    class Person
    {
        var $name; // var also produces public variables
            public $height;
            public $social_insurance;
            private $pinn_number;

        function __construct($persons_name)
        {
            $this->name = $persons_name;
        }

        protected function set_name($new_name)
        {
            if ($new_name != "Jimmy Two Guns") {
                $this->name = strtoupper($new_name);
            }
        }

        function get_name()
        {
            return $this->name; // this is a self-referencing variable
        }

        // this method can only be used by another method WITHIN the class
        private function get_pinn_number()
        {
            return $this->pinn_number;
        }
    }

    /**
     * Inheritance explanation
     */
    class Employee extends Person
    {

        function __construct($employee_name)
        {
            $this->set_name($employee_name);
        }

        protected function set_name($new_name)
        {
            if ($new_name == "Stefan Sucks") {
                $this->name = $new_name;
            }
        }
    }


?>
