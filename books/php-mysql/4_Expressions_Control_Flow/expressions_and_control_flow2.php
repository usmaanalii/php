4.19 - An if statement
<?php
    if ($bank_balance < 100) {
        $money = 1000;
        $bank_balance += $money;
    }
?>

4.20 - An if..else statement
<?php
    if ($bank_balance < 100) {
        $money = 1000;
        $bank_balance += $money;
    }
    else {
        $savings += 50;
        $bank_balance -= 50;
    }
?>

4.21 - An if...elseif..else statment
<?php
    if ($bank_balance < 100) {
        $money = 1000;
        $bank_balance += $money;
    }
    elseif ($bank_balance > 200) {
        $savings += 100;
        $bank_balance -= 100;
    }
    else {
        $savings += 50;
        $bank_balance -= 50;
    }
?>

4.22 - Multiple line if..elseif statement
<?php
    if ($page == "Home") {
        echo "You selected Home";
    }
    elseif ($page == "About") {
        echo "You selected About";
    }
    elseif ($page == "News") {
        echo "You selected News";
    }
    elseif ($page == "Login") {
        echo "You selected Login";
    }
    elseif ($page == "Links") {
        echo "You selected Links";
    }
?>

4.23 - Switch statement
<?php
    switch ($page) {
        case 'Home':
            echo "You selected Home";
            break;
        case 'About':
            echo "You selected About";
            break;
        case 'News':
            echo "You selected News";
            break;
        case 'Login':
            echo "You selected Login";
            break;
        case 'Links':
            echo "You selected Links";
            break;
        default:
            echo "Unrecognisable selection";
            break; // not required
    }
?>

4.25 - Alternate swith statement syntax
<?php
switch ($page): // colon instead of {
    case 'Home':
        echo "You selected home";
        break;

    default:
        echo "What?";
        break;

endswitch; // instead of }
?>

4.26 - Using the ? operator
<?php
    // statement TRUE execution : FALSE execution
    echo $fuel <= 1 ? "Fill tank now" : "There's enough fuel";
?>

4.27 - Assiging a ? conditional result to a variable
<?php
    // $enough will get the value TRUE OR FALSE
    $enough = $fuel <= 1 ? FALSE : TRUE;
?>
