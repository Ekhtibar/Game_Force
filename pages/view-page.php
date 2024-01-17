<?php
$conn = new mysqli("localhost", "root", "root", "games");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка наличия параметра game_id в запросе
if (isset($_GET['game_id'])) {
    $game_id = $_GET['game_id'];

    // Запрос к базе данных для получения данных об игре
    $sql = "SELECT * FROM `game-card` WHERE `game_id` = $game_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Получение данных об игре
        $row = $result->fetch_assoc();

        // Теперь вы можете использовать значения $row для вывода данных на странице
        $game_title = $row['game_title'];
        $release_date = $row['release_date'];
        $category = $row['category'];
        $game_description = $row['game_description'];
        $game_detailed_description	= $row['game_detailed_description'];
        $creator = $row['creator'];
        $platform = $row['platform'];
        $interface_language = $row['interface_language'];
        $cpu = $row['cpu'];
        $ram = $row['ram'];
        $game_video_link = $row['game_video_link'];
        $video_card = $row['video_card'];
        $disk_space = $row['disk_space'];
        $game_main_photo = $row['game_main_photo'];
        $other_img1 = $row['other_img1'];
        $other_img2 = $row['other_img2'];
        $other_img3 = $row['other_img3'];
        $other_img4 = $row['other_img4'];
        $download_link = $row['download_link'];
        

        

    } else {
        echo "Game not found.";
    }
} else {
    echo "Game ID not specified.";
}

$randomGamesQuery = "SELECT * FROM `game-card` ORDER BY RAND() LIMIT 8";
$randomGamesResult = $conn->query($randomGamesQuery);

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
    <link rel="stylesheet" href="../css/view-style.css">
    <title>GameForce</title>
</head>
<body>
    <header class="header">
        <div class="container" style="max-width: 1250px">
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
    <div class="game-view">
        <div class="container" style="max-width: 1250px">
            <h1 class="game-title"><?php echo $game_title; ?></h1>
            <div class="game-img__and__about-game">
                <div class="game-img_box">
                    <!-- main game img -->
                    <img src="<?php echo $row['game_main_photo']; ?>" alt="" class="game-img">
                </div>
                <div class="game-details">
                    <p class="release-date"><b>Buraxılış tarixi:</b> <?php echo $release_date; ?></p>
                    <p class="category"><b>Category:</b> <?php echo $category; ?></p>
                    <p class="creator"><b>Oyunu yaradan:</b> <?php echo $creator; ?></p>
                    <p class="platform"><b>Platforma:</b> <?php echo $platform; ?></p>
                    <p class="interface_language"><b>İnterfeys dili:</b> <?php echo $interface_language; ?></p>
                    <p class="cpu"><b>CPU:</b> <?php echo $cpu; ?></p>
                    <p class="ram"><b>Ram:</b> <?php echo $ram; ?></p>
                    <p class="video-card"><b>Video kart:</b> <?php echo $video_card; ?></p>
                    <p class="disk_space"><b>Disk sahəsi:</b> <?php echo $disk_space; ?></p>
                </div>       
            </div>
            <div class="game-view__container">
                <div class="game-view__columns">
                    <div class="game-view__about">
                        <p class="game-description-text">Tesvir</p>
                        <p class="game-description"> <?php echo $game_description; ?></p>
                        <p class="game-detailed-description-text">Etrafli melumat</p>
                        <p class="game-detailed-description"> <?php echo $game_detailed_description; ?></p>
                        <p class="similar-games-title">Oxsar oyunlar</p>
                        <p class="game-video-title">Treyler / Oyunun videosu</p>
                        <div class="game-video">
                            <iframe width="560" height="300" src="<?php echo $game_video_link; ?>"
                                title="YouTube video player" frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                            </iframe>
                        </div>
                        <p class="game-photos-title">Oyunun sekilleri</p>
                        <div class="game-photos">
                            <div class="carousel-container relative overflow-hidden">
                                <div class="prev-next-buttons absolute top-1/2 transform -translate-y-1/2 flex justify-between w-full z-10">
                                    <button onclick="prevSlide()" class="carusel-btn bg-gray-800 px-4 py-2 rounded-l">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="32" viewBox="0 0 12 32" fill="none">
                                            <path d="M10.1987 1L2 16L10.1987 31" stroke="white" stroke-width="2"/>
                                        </svg>
                                    </button>
                                    <button onclick="nextSlide()" class="carusel-btn bg-gray-800 px-4 py-2 rounded-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="32" viewBox="0 0 11 32" fill="none">
                                            <path d="M1.00055 1L9.19922 16L1.00055 31" stroke="white" stroke-width="2"/>
                                        </svg>
                                    </button>
                                </div>

                        
                                <div id="carousel" class="carousel carousel-center max-w-full p-4 space-x-4 bg-neutral rounded-box whitespace-nowrap overflow-x-auto">
                                    <div class="carousel-item inline-block">
                                        <div class="custom-box banner_img">
                                            <a href="#">
                                                <img src="<?php echo $other_img1; ?>" alt="" class="banner_img">
                                            </a>
                                        </div>
                                    </div> 
                                    <div class="carousel-item inline-block">
                                        <div class="custom-box banner_img">
                                            <a href="#">
                                                <img src="<?php echo $other_img2; ?>" alt="" class="banner_img">
                                            </a>
                                        </div>
                                    </div> 
                                    <div class="carousel-item inline-block">
                                        <div class="custom-box banner_img">
                                            <a href="#">
                                                <img src="<?php echo $other_img3; ?>" alt="" class="banner_img">
                                            </a>
                                        </div>
                                    </div> 
                                    <div class="carousel-item inline-block">
                                        <div class="custom-box banner_img">
                                            <a href="#">
                                                <img src="<?php echo $other_img4; ?>" alt="" class="banner_img">
                                            </a>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                        <!-- download link -->
                        <a href="<?php echo $download_link; ?>" class="download-link">
                            <div class="download-game">
                                <div class="download-text">Yukle</div>
                                <img src="../images/telegram.svg" alt="" class="download-icon">
                            </div>
                        </a>
                        <p class="recomendeted-games-title">Tovsiye olunan oyunlar</p>
                        <!-- recomendated games -->
                        <div class="game-view__column-1">
                        <?php
                            // Вывод 8 рандомных карточек
                            while ($randomGameRow = $randomGamesResult->fetch_assoc()) {
                                echo "<div class='game-card'>";
                                echo "<a href='../pages/view-page.php?game_id=" . $randomGameRow["game_id"] . "' class='game-card__link'>";
                                // Display the game_main_photo
                                echo "<img src='" . $randomGameRow["game_main_photo"] . "' alt='' class='game-card__img'>";
                                echo "</a>";
                                echo "<a href='../pages/view-page.php?game_id=" . $randomGameRow["game_id"] . "' class='game-card__link'>";
                                echo "<h1 class='game-card__title'>" . $randomGameRow["game_title"] . "</h1>";
                                echo "</a>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="game-view__column-2 ads">
                        <div class="ads"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <div class="container">
            <div class="footer__inner">
                <a href="#" class="logo-link">
                    <img src="../images/gameforce-logo.svg" alt="" class="footer-logo" style='width: 120px'>
                </a>
                <div class="copyright-text">
                   © 2023 <a href="#" class="">GAMEFORCE.</a> Bütün hüquqlar qorunur.
                </div>
            </div>
        </div>
    </footer>
    


    <script src="https://cdn.tailwindcss.com"></script>

    <script src="../js/main.js"></script>
</body>
</html>
