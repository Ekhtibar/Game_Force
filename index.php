<?php
// Подключение к базе данных

$conn = new mysqli("localhost", "root", "root", "games");

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запрос к базе данных
$sql = "SELECT * FROM `game-card`";
$result = $conn->query($sql);
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
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>GameForce</title>
</head>
<body>
    <header class="header">
        <div class="container" style="max-width: 1250px">
            <section class="top">
                <div class="navbar">
                    <div class="navbar__menu">
                        <a href="index.php" class="navbar__menu-item">Ana sehife</a>
                        <a href="#" class="navbar__menu-item">Yeni oyunlar</a>
                        <a href="#" class="navbar__menu-item">Butun oyunlar</a>
                    </div>
                    <div class="search-box">
                        <input type="text" id="searchInput" placeholder="Oyun axtar...." class="search-input">
                        <img src="./images/search-icon.svg" alt="" class="search-icon">
                    </div>
                </div>
                <div class="navbar__bottom">
                    <a href="#" class="logo-link">
                        <img src="./images/gameforce-logo.svg" alt="" class="logo">
                    </a>
                    <div class="navbar__bottom__category">
                        <a href="./pages/category-page.php?category=Action" class="navbar__bottom__category__item">Action</a>
                        <a href="./pages/category-page.php?category=Role-Playing" class="navbar__bottom__category__item">Role-Playing</a>
                        <a href="./pages/category-page.php?category=Adventure" class="navbar__bottom__category__item">Adventure</a>
                        <a href="./pages/category-page.php?category=PVP" class="navbar__bottom__category__item">PVP</a>
                        <a href="./pages/category-page.php?category=OtherCategory" class="navbar__bottom__category__item">OtherCategory</a>
                    </div>

                </div>
            </section>
        </div>
    </header>
    <section class="games-section-head">
        <div class="container games-head" style="max-width: 1250px">
            <h1 class="games-title_text">Oyunlar</h1>
            <div class="games-head__navbar">
                <a href="./pages/category-page.php?category=Simulator" class="games-head__navabr__item">Simulator</a>
                <a href="./pages/category-page.php?category=Open%20world" class="games-head__navabr__item">Open world</a>
                <a href="./pages/category-page.php?category=Survival" class="games-head__navabr__item">Survival</a>
                <a href="./pages/category-page.php?category=Historical" class="games-head__navabr__item">Historical</a>
            </div>

        </div>
    </section>
    <section class="games">
        <div class="container" style="max-width: 1250px">
            <div class="games-container">
                <div class="games-container__column-1" style='justify-content: center; align-items: start; '>
                <?php
                    if ($result->num_rows > 0) {
                        $counter = 0;
                        while ($row = $result->fetch_assoc()) {
                            if ($counter % 4 === 0 && $counter !== 0) {
                                echo "</div><div class='games-container__row'>";
                            }

                            echo "<div class='game-card' style='justify-content: center'>";
                            echo "<a href='./pages/view-page.php?game_id=" . $row["game_id"] . "' class='game-card__link'>";
                            echo "<img src='" . $row["game_main_photo"] . "' alt='' class='game-card__img'>";
                            echo "</a>";
                            echo "<a href='./pages/view-page.php?game_id=" . $row["game_id"] . "' class='game-card__link'>";
                            echo "<h1 class='game-card__title'>" . $row["game_title"] . "</h1>";
                            echo "</a>";
                            echo "</div>";

                            $counter++;
                        }
                    } else {
                        echo "No games found.";
                    }
                    ?>
                </div>
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
    <footer class="footer">
        <div class="container">
            <div class="footer__inner">
                <a href="#" class="logo-link">
                    <img src="./images/gameforce-logo.svg" alt="" class="footer-logo" style='width: 120px'>
                </a>
                <div class="copyright-text">
                   © 2023 <a href="#" class="">GAMEFORCE.</a> Bütün hüquqlar qorunur.
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.tailwindcss.com"></script>


    <script src="./js/main.js"></script>
    <script src="../js/search.js"></script>
</body>
</html>
<?php

$conn->close();
?>