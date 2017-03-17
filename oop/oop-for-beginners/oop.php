<?php

    /**
     * Person class
     */
    class Person
    {
        private $_name;
        private $_job;
        private $_age;

        function __construct($name, $job, $age)
        {
            $this->_name = $name;
            $this->_job = $job;
            $this->_age = $age;
        }

        public function changeJob($newjob)
        {
            $this->_job = $newjob;
        }

        public function happyBirthday()
        {
            ++$this->_age;
        }
    }

    // Create two new people
    $person1 = new Person("Tom", "Button-Pusher", 34);
    $person2 = new Person("John", "Lever Puller", 41);

    echo "<pre>Person 1: ", print_r($person1, TRUE), "</pre>";
    echo "<pre>Person 2: ", print_r($person2, TRUE), "</pre>";

    // Tom
    $person1->changeJob('Box-mover');
    $person1->happyBirthday();

    // John
    $person2->happyBirthday();

    echo "<pre>Person 1: ", print_r($person1, TRUE), "</pre>";
    echo "<pre>Person 2: ", print_r($person2, TRUE), "</pre>";

?>
