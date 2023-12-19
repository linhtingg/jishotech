<?php
include('includes/config.php');

if (isset($_POST['wordId'])) {
    $wordId = $_POST['wordId'];
    $userId = $_SESSION['uid'];

    $con = new mysqli("localhost", "root", "", "jishotech");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // check
    $checkQuery = "SELECT id_user FROM words WHERE id_word = '$wordId'";
    $resultOwnership = mysqli_query($con, $checkQuery);

    if ($resultOwnership->num_rows > 0) {
        $row = mysqli_fetch_assoc($resultOwnership);
        $wordOwnerId = $row['id_user'];

        if ($wordOwnerId == $userId) {
            $deleteWordTopicQuery = "DELETE FROM wordtopic WHERE id_word = '$wordId'";
            $resultWordTopic = mysqli_query($con, $deleteWordTopicQuery);

            if ($resultWordTopic) {
                $deleteQuery = "DELETE FROM words WHERE id_word = '$wordId'";
                $result = mysqli_query($con, $deleteQuery);

                if ($result) {
                    echo "単語が正常に削除されました";
                } else {
                    echo "Error deleting word: " . mysqli_error($con);
                }
            } else {
                echo "Error deleting associated records: " . mysqli_error($con);
            }
        } else {
            echo "この単語を削除する権限がありません";
        }
    } else {
        echo "Word not found";
    }

    mysqli_close($con);
} else {
    echo "Invalid request";
}
?>
