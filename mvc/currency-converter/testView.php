<?php
    require_once 'Model.php';
    require_once 'View.php';

    $currencyConverter = new CurrencyConverter;

    $currencyConverter->set('100', 'GBP');

    $gbpView = new CurrencyConverterView($currencyConverter, 'GBP');
    echo $gbpView->output();

    $usdView = new CurrencyConverterView($currencyConverter, 'USD');
    echo $usdView->output();

    $eurView = new CurrencyConverterView($currencyConverter, 'EUR');
    echo $eurView->output();

    $yenView = new CurrencyConverterView($currencyConverter, 'YEN');
    echo $yenView->output();


?>
