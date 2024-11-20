<?php

include "./include/connection.php"; 

$name = "";
$email = "";
$message = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($message)) {
        $errors['message'] = "Message is required.";
    } elseif (strlen($message) > 500) {
        $errors['message'] = "Message cannot exceed 500 characters.";
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);
      
    }
}



?>

<div id="contact" class="parallax-window relative" data-parallax="scroll" data-image-src="img/antique-cafe-bg-04.jpg">
    <div class="container mx-auto tm-container pt-24 pb-48 sm:py-48">
        <div class="flex flex-col lg:flex-row justify-around items-center lg:items-stretch">
            <div class="flex-1 rounded-xl px-10 py-12 m-5 bg-white bg-opacity-80 tm-item-container">
                <h2 class="text-3xl mb-6 tm-text-green">Contact Us</h2>
                <p class="mb-6 text-lg leading-8">
                    Praesent tellus magna, consectetur sit amet volutpat eu, pulvinar vitae sem.
                    Sed ultrices. bg white 80% alpha. btn #066    
                </p>
                <p class="mb-10 text-lg">
                    <span class="block mb-2">Tel: <a href="tel:0100200340" class="hover:text-yellow-600 transition">010-020-0340</a></span>
                    <span class="block">Email: <a href="mailto:info@company.com" class="hover:text-yellow-600 transition">info@company.com</a></span>                        
                </p>
                <div class="text-center">
                    <a href="https://www.google.com/maps" class="inline-block text-white text-2xl pl-10 pr-12 py-6 rounded-lg transition tm-bg-green">
                        <i class="fas fa-map-marked-alt mr-8"></i>
                        Open Maps
                    </a>
                </div>                    
            </div>
            <div class="flex-1 rounded-xl p-12 pb-14 m-5 bg-black bg-opacity-50 tm-item-container">
                <form action="" method="POST" class="text-lg">
                    <input type="text" name="name" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Name" value="<?php echo htmlspecialchars($name); ?>" required />
                    <span class="error text-red-500"><?php echo $errors['name'] ?? ''; ?></span>

                    <input type="email" name="email" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required />
                    <span class="error text-red-500"><?php echo $errors['email'] ?? ''; ?></span>

                    <textarea rows="6" name="message" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Message..." required><?php echo htmlspecialchars($message); ?></textarea>
                    <span class="error text-red-500"><?php echo $errors['message'] ?? ''; ?></span>

                    <div class="text-right">
                        <button type="submit" class="text-white hover:text-yellow-500 transition">Send it</button>
                    </div>                        
                </form>
            </div>
        </div>
        <?php include_once "./view/footer.inc.php"; ?>
    </div>
</div>