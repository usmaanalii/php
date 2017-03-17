<?php
    include("class_lib.php");

    $stefan = new Person(); // () is optional
    $jimmy = new Person;

    // using the setter method
    $stefan->set_name("Stefan Mischook");
    $jimmy->set_name("Nick Waddles");

    // using the getter method
    echo "Stefan's full name: " . $stefan->get_name();
    echo "\n";
    echo "Jimmy's full name: " . $jimmy->get_name();
    echo "\n";
?>

<?php
    include("class_lib.php");

    // using the constructor method
    $stefan = new Person("Stefan Mischook");
    echo "Stefan's full name: " . $stefan->get_name();
?>

<?php
    include("class_lib.php");

    // using private, public and protected keywords
    $stefan = new Person("Stefan' Mischook");
    echo "Stafan's full name: " . $stefan->get_name();

    // Since $pinn_number was declared private, this line of code will generate an error

    echo "Tell me private stuff: " . $stefan->pinn_number;
?>

<?php
    include("class_lib.php");

    // using private, public and protected keywords
    $stefan = new Person("Stefan' Mischook");
    echo "Stafan's full name: " . $stefan->get_name();
    echo "\n";

    // Using the Employee class

    $james = new Employee("Jhonny Fingera");
    echo "----> " . $james->get_name();
?>
