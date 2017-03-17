6.1 - Adding items to an array
<?php
    $paper[] = "Copter";
    $paper[] = "Inkjet";
    $paper[] = "Laser";
    $paper[] = "Photo";

    print_r($paper);
?>

6.2 - Adding items to an array using explicit locations
<?php
    $paper[0] = "Copter";
    $paper[1] = "Inkjet";
    $paper[2] = "Laser";
    $paper[3] = "Photo";

    print_r($paper);
?>

6.3 - Adding items to an array and retrieving them
<?php
    $paper[] = "Copter";
    $paper[] = "Inkjet";
    $paper[] = "Laser";
    $paper[] = "Photo";

    for ($j = 0; $j < 4; ++$j) {
        echo "$j: $paper[$j]\n";
    }
?>

6.4 - Adding items to an associative array and retrieving them
<?php
    $paper['copter'] = "Copter & Multipurpose";
    $paper['inkjet'] = "Inkjet Printer";
    $paper['laser'] = "Laser Printer";
    $paper['photo'] = "Photographic Paper";

    echo $paper['laser']; // Laser Printer
?>

6.5 - Adding items to an array using the array keyword
<?php
    $p1 = array("Copter", "Inkjet", "Laser", "Photo");

    echo "p1 element: " . $p1[2] . "\n";

    $p2 = array('copter' => "Copter & Multipurpose",
                'inkjet' => 'Inkjet Printer',
                'laser' => "Laser ",
                'photo' => "Photographic Paper");

    echo "p2 element: " . $p2['inkjet'] . "\n";
?>

6.6 - Walking through a numeric array using a foreach..as
<?php
    $paper = array("Copter", "Inkjet", "Laser", "Photo");
    $j = 0;

    foreach ($paper as $item) {
        echo "$j: $item\n";
        ++$j;
    }
?>

6.7 - Walking through an associative array using foreach...as
<?php
    $paper = array('copter' => "Copter & Multipurpose",
                'inkjet' => 'Inkjet Printer',
                'laser' => "Laser ",
                'photo' => "Photographic Paper");

    foreach ($paper as $item => $description) {
        echo "$item: $description\n";
    }
?>

6.8 - Walking through an associative array using each and list
<?php
    $paper = array('copter' => "Copter & Multipurpose",
                'inkjet' => 'Inkjet Printer',
                'laser' => "Laser ",
                'photo' => "Photographic Paper");

    while (list($item, $description) = each($paper)) {
        echo "$item: $description\n";
    }
?>

6.9 - Using the list function
<?php
    list($a, $b) = array('Alice', 'Bob');
    echo "a = $a b = $b";
?>

6.10 - Creating a multidimensional associative array
<?php
    $products = array(

        'paper' => array(

            'copter' => "Copter & Multipurpose",
            'inkjet' => 'Inkjet Printer',
            'laser' => "Laser ",
            'photo' => "Photographic Paper"
        ),

        'pens' => array(
            'ball' => "Ball point",
            'hilite' => 'Highlighters',
            'marker' => "Markers",
        ),

        'misc' => array(
            'tape' => "Stick Tape",
            'glue' => 'Adhesives',
            'clips' => "Paperclips",
        )
    );

    echo "\n";

    foreach ($products as $section => $items) {
        foreach ($items as $key => $value) {
            echo "$section:\t$key\t($value)\n";
        }
    }

    echo $products['misc']['glue']; // Adhesives

?>

6.12 - Exploding a string into an array using spaces
<?php
    $temp = explode(' ', "This is a sentence with seven words");

    print_r($temp);
?>

6.13 - Exploding a string delimited with *** into an array
<?php
    $temp = explode('***', "A***sentence***with***asterisks");

    print_r($temp);
?>

6.14 - Using the compact function
<?php  
    $fname = "Doctor";
    $sname = "Who";
    $planet = "Gallifrey";
    $system = "Gridlock";
    $constellation = "Kasterborous";

    $contact = compact('fname', 'sname', 'planet', 'system', 'constellation');

    print_r($contact);
?>
