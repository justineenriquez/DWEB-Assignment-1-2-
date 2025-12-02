<?php
// Enriquez, Justine Paul A.
// WD-201 

$store_name = "JusTech Central Store";
$tax_rate = 12;
$total_value = 0;

$products = [
    [
        "name" => "Intel Core i5 12400F",
        "price" => 8700,
        "stock" => 10,
        "category" => "Processors",
    ],
    [
        "name" => "NVIDIA GTX 1660 Super",
        "price" => 12500,
        "stock" => 2,
        "category" => "Graphics Card",
    ],
    [
        "name" => "Kingbank 16GB DDR4 RAM",
        "price" => 3200,
        "stock" => 20,
        "category" => "Memory",
    ],
    [
        "name" => "Apacer 500GB SSD",
        "price" => 2600,
        "stock" => 0,
        "category" => "Storage",
    ],
];

foreach ($products as $p) {
    $total_value += $p["price"] * $p["stock"];
}

$total_tax = $total_value * ($tax_rate / 100);

// Header include
require_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= $store_name ?> - Product List</title>

<style>
body {
    background-color: #D4E8C1;
    font-family: Arial;
}

.container {
    width: 900px;
    margin: 40px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.2);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th {
    background: #A4C98A;
    padding: 10px;
}

td {
    border-bottom: 1px solid #eee;
    padding: 10px;
}

.status-good { 
    color: green; 
    font-weight: bold; 
}
.status-low { 
    color: #eede00ff; 
    font-weight: bold; 
}
.status-critical { 
    color: red; 
    font-weight: bold; 
}

button {
    background: #40634bff;
    color: white;
    border: none;
    padding: 7px 12px;
    border-radius: 5px;
}
button:disabled {
    background: #999;
}
img {
    width: 60px;
    height: 60px;
    border-radius: 5px;
}
</style>

</head>
<body>

<div class="container">

<h2 style="text-align:center;">PC parts available</h2>

<table>
    <tr>
        <th>Product / Status</th>
        <th>Category</th>
        <th>Original Price</th>
        <th>Special Price</th>
        <th>Action</th>
    </tr>

    <?php foreach ($products as $p) { 
        if ($p["stock"] == 0) {
            $status = "SOLD OUT";
            $class = "status-critical";
        } elseif ($p["stock"] < 5) {
            $status = "Low Stock (" . $p["stock"] . ")";
            $class = "status-low";
        } else {
            $status = "In Stock";
            $class = "status-good";
        }

        $sale_price = $p["price"] * 0.90;
    ?>
    
    <tr>
        <td>
            <b><?= $p["name"] ?></b><br>
            <span class="<?= $class ?>"><?= $status ?></span>
        </td>

        <td><?= $p["category"] ?></td>

        <td>₱<?= number_format($p["price"], 2) ?></td>

        <td>₱<?= number_format($sale_price, 2) ?> (10% OFF)</td>

        <td>
            <?php if ($p["stock"] > 0) { ?>
                <a href="stock.php?item=<?= urlencode($p['name']) ?>">
                    <button>Add to Cart</button>
                </a>
            <?php } else { ?>
                <button disabled>Out of Stock</button>
            <?php } ?>
        </td>
    </tr>

    <?php } ?>

</table>

<p style="margin-top:20px; text-align:center; font-size:12px;">
    Stock information is updated real-time. 
</p>

</div>

<?php include "footer.php"; ?>

</body>
</html>

