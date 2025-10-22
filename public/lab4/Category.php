<?php
require_once "Product.php";

class Category {
    public string $name;
    private array $products = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function addProduct(Product $product): void {
        $this->products[] = $product;
    }

    public function showProducts(): void {
        echo "<h3>Категорія: {$this->name}</h3>";
        if (empty($this->products)) {
            echo "Немає товарів у цій категорії.<br><br>";
        } else {
            foreach ($this->products as $product) {
                $product->getInfo();
            }
        }
    }
}
?>
