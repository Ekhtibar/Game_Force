<?php
$conn = new mysqli("localhost", "root", "root", "games");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка наличия параметра category в запросе
if (isset($_GET['category'])) {
    $category = $_GET['category'];

    // Запрос к базе данных для получения данных о карточках с указанной категорией
    $sql = "SELECT * FROM `game-card` WHERE `category` = '$category'";
    $result = $conn->query($sql);

    
} else {
    echo "Category not specified.";
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.5.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>GameForce</title>
</head>
<body>
<header class="header">
        <div class="container">
            <section class="top">
                <div class="navbar">
                    <div class="navbar__menu">
                        <a href="../index.php" class="navbar__menu-item">Ana sehife</a>
                        <a href="#" class="navbar__menu-item">Yeni oyunlar</a>
                        <a href="#" class="navbar__menu-item">Butun oyunlar</a>
                    </div>
                    <div class="search-box">
                        <input type="text" placeholder="Oyun axtar...." class="search-input">
                        <img src="../images/search-icon.svg" alt="" class="search-icon">
                    </div>
                </div>
                <div class="navbar__bottom">
                    <a href="#" class="logo-link">
                        <img src="../images/gameforce-logo.svg" alt="" class="logo">
                    </a>
                    <div class="navbar__bottom__category">
                        <a href="./category-page.php?category=Action" class="navbar__bottom__category__item">Action</a>
                        <a href="./category-page.php?category=Role-Playing" class="navbar__bottom__category__item">Role-Playing</a>
                        <a href="./category-page.php?category=Adventure" class="navbar__bottom__category__item">Adventure</a>
                        <a href="./category-page.php?category=PVP" class="navbar__bottom__category__item">PVP</a>
                        <a href="./category-page.php?category=OtherCategory" class="navbar__bottom__category__item">OtherCategory</a>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <div class="container">
        <h3 class="category-name" style="margin-bottom: 20px;"><?php echo $category; ?> games</h3>
    </div>
    <section class="games">
        <div class="container">
            <div class="games-container">
                            <?php
                if ($result->num_rows > 0) {
                    $counter = 0;
                    echo "<div class='games-container__column-1' style='justify-content: center; align-items: start;'>";

                    while ($row = $result->fetch_assoc()) {
                        if ($counter % 4 === 0 && $counter !== 0) {
                            echo "</div><div class='games-container__row'>";
                        }

                        echo "<div class='game-card' style='justify-content: center'>";
                        echo "<a href='../pages/view-page.php?game_id=" . $row["game_id"] . "' class='game-card__link'>";
                        echo "<img src='" . $row["game_main_photo"] . "' alt='' class='game-card__img'>";
                        echo "</a>";
                        echo "<a href='../pages/view-page.php?game_id=" . $row["game_id"] . "' class='game-card__link'>";
                        echo "<h1 class='game-card__title'>" . $row["game_title"] . "</h1>";
                        echo "</a>";
                        echo "</div>";

                        $counter++;
                    }

                    echo "</div>";

                } else {
                    echo "Oyun tapilamdi";
                }
                ?>

                <div class="games-container__column-2">
                    <div class="ads">

                    </div>
                    <div class="ads">

                    </div>
                    <div class="ads">

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>