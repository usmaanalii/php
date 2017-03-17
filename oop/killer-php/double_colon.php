<?php
    /**
     * Description
     */
    class Person
    {
        var $name;

        function __construct($persons_name)
        {
            $this->name = $persons_name;
        }

        public function get_name()
        {
            return $this->name;
        }

        // protected methods and properties restrict access
        protected function set_name($new_name)
        {
            if ($this->name != "Jimmy Two Guns") {
                $this->name = strtoupper($new_name);
            }
        }
    }

    /**
     * Inherits from Person
     */
    class Employee extends Person
    {

        protected function set_name($new_name)
        {
            if ($new_name == "Stefan Sucks") {
                $this->name = $new_name;
            }
            elseif ($new_name == "Jhonny Fingers") {

                // double colon operator to access base class method
                Person::set_name($new_name);

                // can use parent::set_name
            }
        }

        function __contruct($employee_name)
        {
            $this->set_name($employee_name);
        }
    }


?>
