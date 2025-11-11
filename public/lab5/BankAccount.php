<?php
require_once "AccountInterface.php";

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    public function __construct($currency, $balance = 0) {
        $this->currency = $currency;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума поповнення має бути позитивною.");
        }
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума зняття має бути позитивною.");
        }
        if ($amount > $this->balance - self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів на рахунку.");
        }
        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function __toString() {
        return "Баланс: {$this->balance} {$this->currency}";
    }
}
