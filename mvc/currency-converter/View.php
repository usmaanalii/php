<?php
    require_once 'Model.php';
    /**
     * View class
     */
    class CurrencyConverterView
    {
        private $converter;
        private $currency;

        public function __construct(CurrencyConverter $converter, $currency)
        {
            $this->converter = $converter;
            $this->currency = $currency;
        }

        public function output()
        {
            $html =
                '<form action="?action=convert" method="post">
                    <input name="currency" type="hidden" value="' .  $this->currency  . '"/>
                        <label>' . $this->currency . ' : </label>
                    <input name="amount" type="text" value="' . $this->converter->get($this->currency) . '"/>
                    <input type="submit" value="Convert"/></form>';

            return $html;
        }
    }

?>
