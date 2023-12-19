<?php
include('includes/config.php');

if (isset($_POST['wordId'])) {
    $wordId = $_POST['wordId'];

    $con = new mysqli("localhost", "root", "", "jishotech");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $deleteWordTopicQuery = "DELETE FROM wordtopic WHERE id_word = '$wordId'";
    $resultWordTopic = mysqli_query($con, $deleteWordTopicQuery);

    if ($resultWordTopic) {
        $deleteQuery = "DELETE FROM words WHERE id_word = '$wordId'";
        $result = mysqli_query($con, $deleteQuery);

        if ($result) {
            echo "単語が正常に削除されました";
        } else {
            echo "単語の削除中にエラーが発生しました " . mysqli_error($con);
        }
    } else {
        echo "Error " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Invalid request";
}
?>
