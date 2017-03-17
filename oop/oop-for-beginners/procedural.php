<?php
    function changeJob($person, $newjob)
    {
        $person['job'] = $newjob;

        return $person;
    }

    function happyBirthday($person)
    {
        ++$person['age'];

        return $person;
    }

    $person1 = array(
        'name' => 'Tom',
        'job' => 'Button-Pusher',
        'age' => 34
    );

    $person2 = array(
        'name' => 'John',
        'job' => 'Lever-pusher',
        'age' => 41
    );

    echo "<pre>Person 1: ", print_r($person1, TRUE), "</pre>";
    echo "<pre>Person 2: ", print_r($person2, TRUE), "</pre>";

    // Tom got a promotion and had a birthday
    $person1 = changeJob($person1, 'Box-Mover');
    $person1 = happyBirthday($person1);

    // John had a birthday
    $person2 = happyBirthday($person2);

    echo "<pre>Person 1: ", print_r($person1, TRUE), "</pre>";
    echo "<pre>Person 2: ", print_r($person2, TRUE), "</pre>";
?>
