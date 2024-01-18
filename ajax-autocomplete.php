<?php
$conn = new mysqli("localhost", "root", "root", "games");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['query'])){
    $query = $_POST['query'];
    $sql = "SELECT DISTINCT `game_title` FROM `game-card` WHERE 
            `game_title` LIKE '%$query%' OR 
            `game_description` LIKE '%$query%' OR 
            `key_queries` LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='autocomplete-item'>" . $row['game_title'] . "</div>";
        }
    } else {
        echo "<div class='autocomplete-item'>No results found.</div>";
    }
}

$conn->close();
?>
