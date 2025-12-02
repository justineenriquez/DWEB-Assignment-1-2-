<?php
declare(strict_types=1); // 1. STRICT TYPES ON

// 2. MULTIDIMENSIONAL ARRAY (your product list)
$products = [
    "Intel Core i5-12400F" => ["price" => 8700.00, "stock" => 10],
    "NVIDIA GTX 1660 Super" => ["price" => 12500.00, "stock" => 4],
    "Kingbank 16GB DDR4 RAM" => ["price" => 3200.00, "stock" => 22],
    "Apacer 500GB SSD" => ["price" => 2600.00, "stock" => 0],
    "MSI B660M Motherboard" => ["price" => 5800.00, "stock" => 7],
    "ASUS TUF Gaming Case" => ["price" => 3100.00, "stock" => 14],
    "CoolerMaster 650W PSU" => ["price" => 2900.00, "stock" => 3]
];

// 3. GLOBAL TAX RATE
$tax_rate = 12; // percent

// 4. get_reorder_message()
function get_reorder_message(int $stock): string {
    // 5. TERNARY OPERATOR CHECKS IF STOCK < 10
    return ($stock < 10) ? "YES" : "NO";
}

// 6. get_total_value()
function get_total_value(float $price, int $qty): float {
    // 7. PRICE × QUANTITY
    return $price * $qty;
}

// 8. get_tax_due()
function get_tax_due(float $price, int $qty, int $tax_rate = 0): float {
    // 9. TOTAL VALUE × (TAX RATE ÷ 100)
    return ($price * $qty) * ($tax_rate / 100);
}

// Optional includes (navigation/header)
require_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Stock Monitoring - JusTech</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #D4E8C1; /* Minimalist green  */
        margin: 0;
        padding: 0;
    }

    .container {
        width: 900px;
        background: white;
        margin: 40px auto;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0,0,0,0.15);
    }

    h1 {
        text-align: center;
        color: #000000ff;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #A4C98A;
        color: black;
        padding: 10px;
    }

    td {
        border-bottom: 1px solid #eee;
        padding: 10px;
    }

    .yes { 
        color: red; 
        font-weight: bold; 
    }
    .no { 
        color: green; 
        font-weight: bold; 
    }

</style>

</head>
<body>

<div class="container">
    <h1>Stock Monitoring – JusTech Central Store</h1>

    <table>
        <tr>
            <th>Product Name</th>
            <th>Stock Level</th>
            <th>Re-order?</th>
            <th>Total Value (₱)</th>
            <th>Tax Due (₱)</th>
        </tr>

        <?php
        // 10. FOREACH LOOP USING product_name AND data
        foreach ($products as $product_name => $data) {

            // Extract values
            $price = $data["price"];
            $stock = $data["stock"];

            // 13. FUNCTION: reorder message
            $reorder = get_reorder_message($stock);

            // 14. FUNCTION: total value
            $value = get_total_value($price, $stock);

            // 15. FUNCTION: tax due
            $tax_due = get_tax_due($price, $stock, $tax_rate);
        ?>
        <!-- 11 & 12. TABLE ROW OUTPUT -->
        <tr>
            <td><?= $product_name ?></td>
            <td><?= $stock ?></td>
            <td class="<?= strtolower($reorder) ?>"><?= $reorder ?></td>
            <td>₱<?= number_format($value, 2) ?></td>
            <td>₱<?= number_format($tax_due, 2) ?></td>
        </tr>

        <?php } // END foreach ?>
    </table>

</div>

<?php include "footer.php"; ?>

</body>
</html>
