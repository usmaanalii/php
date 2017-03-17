<?php
    require_once 'Model.php';

    $currencyConverter = new CurrencyConverter;

    $currencyConverter->set(100, 'GBP');

    echo "100 GBP is: ";
    echo $currencyConverter->get('USD') . ' USD / ';
    echo $currencyConverter->get('EUR') . ' EUR / ';
    echo $currencyConverter->get('YEN') . ' YEN';
?>
