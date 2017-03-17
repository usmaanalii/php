<?php

    /**
     * Simple class
     */
    class CurrencyConverter
    {
        private $baseValue = 0;

        private $rates = [
            'GBP' => 1.0,
            'USD' => 0.6,
            'EUR' => 0.83,
            'YEN' => 0.0058
        ];

        public function get($currency)
        {
            if (isset($this->rates[$currency])) {
                $rate = 1 / $this->rates[$currency];

                return round($this->baseValue * $rate, 2);
            } else {
                return 0;
            }

        }

        public function set($amount, $currency = 'GBP')
        {
            if (isset($this->rates[$currency])) {
                $this->baseValue = $amount * $this->rates[$currency];
            }
        }
    }
?>
