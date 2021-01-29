<!-- https://codeshare.io/dwm14 -->
<!-- https://github.com/jperaudon/bastonDWM14 -->
<?php
    spl_autoload_register(function ($class_name) {
        include 'classes/' . $class_name . '.php';
    });
    
    $player1 = new Warrior(100, 'Tartaglia');
    $player2 = new Mage(100, 'Ganyu');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>
<body>
<header></header>
<main>
    <h1>Les Combatants entrent en scene</h1>
    <div class="flex">
        <section>
            <h3><?= "$player1->name vs $player2->name"; ?></h3>
            <p>
                <?php while ($player1->isAlive() && $player2->isAlive()): ?>
                    <div>
                        <div class="firstStep flex">
                            <div>
                                <?= $player1->action($player2);?>
                            </div>
                            <div>
                                <?= "$player1->name HP: $player1->healthPoints <br>";?>
                            </div>
                        </div>
                        <?php $result = "$player1->name a gagné !";?>
                        <?php if ($player2->isAlive()): ?>
                        <div class="secondStep flex">
                            <div>
                                <?= $player2->action($player1); ?>
                            </div>
                            <div>
                                <?= "$player2->name HP: $player2->healthPoints <br>"; ?>
                            </div>
                        </div>
                    </div>
                        <?php $result = "$player2->name a gagné !";?>
                    <?php endif ?>
                    <?= '<br>';?>
                <?php endwhile ?>
            </p>
        </section>
        <aside>
            <img class="roundedImage roundedImageShadow" src="./img/Genshin-Impact-Tartaglia-Header.jpg" alt="Tartaglia">
            <img class="roundedImage roundedImageShadow" src="./img/Ganyu-Genshin-Impact-1381158.jpg" alt="Ganyu">
        </aside>
    </div>
    <h3><?= $result;?></h3>
</main>
<footer></footer>
</body>
</html>


<!--  -->