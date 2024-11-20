
<?php
include "./include/connection.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gaving the order</title>
    <style>
    
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 20px;
}

.form-container {
    max-width: 400px; /* Limit the width of the form */
    margin: auto; /* Center the form */
    padding: 20px;
    background-color: #ffffff; /* Background color for the form */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
}

h2 {
    text-align: center; /* Center the heading */
    color: #333; /* Dark text color */
    margin-bottom: 20px; /* Space below the heading */
}

.form-group {
    margin-bottom: 15px; /* Space between form fields */
}

label {
    display: block; /* Block display for labels */
    font-weight: bold; /* Bold text for labels */
    margin-bottom: 5px; /* Space below labels */
}

input[type="text"],
input[type="number"],
input[type="file"] {
    width: 100%; /* Full width for inputs */
    padding: 10px; /* Padding for inputs */
    border: 1px solid #ccc; /* Light border */
    border-radius: 4px; /* Rounded corners for inputs */
    box-sizing: border-box; /* Include padding and border in width */
}

button {
    width: 100%; /* Full width for button */
    padding: 10px; /* Padding for button */
    background-color: #007bff; /* Primary color */
    color: white; /* White text color */
    border: none; /* Remove border */
    border-radius: 4px; /* Rounded corners on button */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 16px; /* Font size for button text */
    transition: background-color 0.3s; /* Smooth transition for hover effect */
}

button:hover {
    background-color: #0056b3; /* Darker shade on hover */
}

input[type="file"] {
    padding: 5px; /* Padding for file input */
    border: 1px solid #ccc; /* Border for file input */
    border-radius: 4px; /* Rounded corners for file input */
    background-color: #f8f9fa; /* Light background for file input */
}
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Order Your Item</h2>
        <form action="order.php" method="POST" enctype="multipart/form-data">
                <label for="item_name">Item Name:</label>
                <input type="text" name="item_name" id="item_name" required>
                <label for="price_small">Price Small:</label>
                <input type="number" name="price_small" id="price_small" step="0.01" required>
                <label for="price_large">Price Large:</label>
                <input type="number" name="price_large" id="price_large" step="0.01" required>
                <label for="image">Upload Image:</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            <button type="submit" name="submit">Submit Order</button>
        </form>
    </div>
</body>
</html>