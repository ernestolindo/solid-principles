<?php

abstract class PaymentMethod
{
    protected $amount;

    public function __construct($amount)
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Amount must be greater than 0.");
        }
        $this->amount = $amount;
    }

    abstract public function processPayment($overrideAmount = null);
}

class PayPalPayment extends PaymentMethod
{
    public function processPayment($overrideAmount = null)
    {
        $amount = $overrideAmount ?? $this->amount;
        echo "Processing $$amount via PayPal.\n";
    }
}

class CreditCardPayment extends PaymentMethod
{
    public function processPayment($overrideAmount = null)
    {
        $amount = $overrideAmount ?? $this->amount;
        echo "Processing $$amount via Credit Card.\n";
    }
}

class BitcoinPayment extends PaymentMethod
{
    public function processPayment($overrideAmount = null)
    {
        $amount = $overrideAmount ?? $this->amount;
        echo "Processing $$amount via Bitcoin.\n";
    }
}

// Example Usage
try {
    $paypal = new PayPalPayment(100);
    $paypal->processPayment(); // Default amount
    $paypal->processPayment(200); // Override amount

    $creditCard = new CreditCardPayment(150);
    $creditCard->processPayment();

    $bitcoin = new BitcoinPayment(250);
    $bitcoin->processPayment();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
