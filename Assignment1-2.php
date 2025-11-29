<?php 

// VARIABLES
$goal = "How to clean your System Unit properly.";
$prep_time = "10 minutes";
$pc_count = 1; 
$difficulty = "Medium";
$cost_cleaning = 250; // estimated cost
$estimated_cleaning= "30-90 minutes";

// ARRAYS
$tools = [
    "Microfiber cloth",
    "Air duster",
    "Small brush",
    "Isopropyl alcohol (99%)",
    "Screwdriver"
];

// ASSOCIATIVE ARRAYS
$steps = [
    "Step 1" => "Turn off pc and unplug cables.",
    "Step 2" => "Open the pc case with screwdriver.",
    "Step 3" => "Use air duster to blow dust (Prevent fans from spinning to avoid damage).",
    "Step 4" => "Wipe surfaces with microfiber cloth + alcohol.",
    "Step 5" => "Use brush to clean tight spaces.",
    "Step 6" => "Reassemble case and plug cables back.",
    "Step 7" => "Check if everything is dry, cables are connected, and power on the pc."
];

// EXPRESSIONS & TYPE JUGGLING
$total_cost = $cost_cleaning * $pc_count;
$total_time = $prep_time . " prep + " . $estimated_cleaning . " cleaning time";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Cleaning Guide</title>
</head>
<body>

<?php require_once 'header.php'; ?>

<main>
    <p><b>Guide:</b> <?= $goal; ?></p>
    <p>Preparation Time: <?= $prep_time; ?></p>
    <p>Estimated Cleaning Time: <?= $total_time; ?></p>
    <p>Difficulty: <?= $difficulty; ?></p>
    <p>Total Cost: P <?= $total_cost; ?></p>
    <p>Number of PCs: <?= $pc_count; ?></p>
    <h3>Tools Needed</h3>
    <ul>
        <li><?= $tools[0]; ?></li>
        <li><?= $tools[1]; ?></li>
        <li><?= $tools[2]; ?></li>
        <li><?= $tools[3]; ?></li>
        <li><?= $tools[4]; ?></li>
    </ul>

    <h3>Step-by-Step Instructions</h3>
    <ol>
        <li><?php echo $steps['Step 1']; ?></li>
        <li><?php echo $steps['Step 2']; ?></li>
        <li><?php echo $steps['Step 3']; ?></li>
        <li><?php echo $steps['Step 4']; ?></li>
        <li><?php echo $steps['Step 5']; ?></li>
        <li><?php echo $steps['Step 6']; ?></li>
        <li><?php echo $steps['Step 7']; ?></li>
    </ol>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
