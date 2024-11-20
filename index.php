<?php

include "./include/connection.php"; 
require_once "./view/head.inc.php";
?>
<body>
    <?php require "./view/nav.php"; ?>

    <div id="menu" class="parallax-window" data-parallax="scroll" data-image-src="img/antique-cafe-bg-02.jpg">
        <div class="container mx-auto tm-container py-24 sm:py-48">
            <div class="text-center mb-16">
                <h2 class="bg-white tm-text-brown py-6 px-12 text-4xl font-medium inline-block rounded-md">Our Cafe Menu</h2>
            </div>
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 items-center">
                <?php
                $stmt = $pdo->query("SELECT * FROM cafee");
                $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($items as $item) {
                    ?>
                    <div class="w-full m-5 rounded-xl px-4 py-6 sm:px-8 sm:py-10 tm-bg-brown ">
                        <div class="flex flex-row items-start mb-6">
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['item_name']); ?>" class="rounded-md mb-4 sm:mb-0 sm:mr-4">
                            <div class="ml-3 sm:ml-6">
                                <h3 class="text-lg sm:text-xl mb-2 sm:mb-3 tm-text-yellow"><?php echo htmlspecialchars($item['item_name']); ?></h3>
                                <div class="text-white text-md sm:text-lg font-light mb-1">S $<?php echo htmlspecialchars($item['price_small']); ?></div>
                                <div class="text-white text-md sm:text-lg font-light">L $<?php echo htmlspecialchars($item['price_large']); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    include "./view/about.php";
    include_once "./view/contact.php";
    require_once "./include/script.php";
    ?>
</body>
</html>
