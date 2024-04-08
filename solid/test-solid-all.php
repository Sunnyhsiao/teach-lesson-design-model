<?php
interface PaymentGateway {
    public function processPayment($amount);
}

class PayPalGateway implements PaymentGateway {
    public function processPayment($amount) {
        // Process payment via PayPal
        return "Processed payment of $amount via PayPal.";
    }
}

class CreditCardGateway implements PaymentGateway {
    public function processPayment($amount) {
        // Process payment via credit card
        return "Processed payment of $amount via credit card.";
    }
}

class PaymentProcessor {
    private $gateway;

    public function __construct(PaymentGateway $gateway) {
        $this->gateway = $gateway;
    }

    public function processPayment($amount) {
        // Process payment logic...

        // Process payment using the selected gateway
        return $this->gateway->processPayment($amount);
    }
}

$amount = 100;

// Process payment via PayPal
$payPalGateway = new PayPalGateway();
$paymentProcessor = new PaymentProcessor($payPalGateway);
echo $paymentProcessor->processPayment($amount) . "\n";

// Process payment via credit card
$creditCardGateway = new CreditCardGateway();
$paymentProcessor = new PaymentProcessor($creditCardGateway);
echo $paymentProcessor->processPayment($amount) . "\n";
