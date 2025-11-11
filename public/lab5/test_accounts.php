<?php
require_once "SavingsAccount.php";

echo "<h2>Тестування банківських рахунків</h2>";

try {
    $account1 = new BankAccount("USD", 100);
    echo "Створено рахунок: $account1<br>";

    $account1->deposit(50);
    echo "Після поповнення: $account1<br>";

    $account1->withdraw(30);
    echo "Після зняття: $account1<br>";

    $savings = new SavingsAccount("EUR", 200);
    echo "<br>Створено накопичувальний рахунок: $savings<br>";

    $savings->applyInterest();
    echo "Після нарахування відсотків: $savings<br>";

    echo "<br>Спроба зняти 500 EUR:<br>";
    $savings->withdraw(500);

} catch (Exception $e) {
    echo "<b>Помилка:</b> " . $e->getMessage() . "<br>";
}

try {
    echo "<br>Спроба поповнити рахунок на -100:<br>";
    $account1->deposit(-100);
} catch (Exception $e) {
    echo "<b>Помилка:</b> " . $e->getMessage() . "<br>";
}
