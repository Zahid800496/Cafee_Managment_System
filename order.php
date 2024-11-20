
<?php
session_start();
include "./include/connection.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $price_small = $_POST['price_small'];
    $price_large = $_POST['price_large'];
    
    $image = $_FILES['image'];
    if ($image['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; 
        $uploadFile = $uploadDir . basename($image['name']);
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
            $stmt = $pdo->prepare("INSERT INTO cafee (item_name, price_small, price_large, image) VALUES (?, ?, ?, ?)");
            $stmt->execute([$item_name, $price_small, $price_large, $uploadFile]);

            $_SESSION['last_order'] = [
                'item_name' => $item_name,
                'price_small' => $price_small,
                'price_large' => $price_large,
                'image' => $uploadFile
            ];
            setcookie('last_order_item', $item_name, time() + (30 * 24 * 60 * 60), "/");

            header("Location: index.php");
            exit;
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "Error uploading file.";
    }
}
?>