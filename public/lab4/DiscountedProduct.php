<?php
require_once "Product.php";

class DiscountedProduct extends Product {
    private float $discount; // у відсотках

    public function __construct(string $name, float $price, string $description, float $discount) {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    public function getDiscountedPrice(): float {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function getInfo(): void {
        $newPrice = $this->getDiscountedPrice();
        echo "Назва: {$this->name}<br>";
        echo "Стара ціна: {$this->price} грн<br>";
        echo "Знижка: {$this->discount}%<br>";
        echo "Нова ціна: {$newPrice} грн<br>";
        echo "Опис: {$this->description}<br><br>";
    }
}
?>
