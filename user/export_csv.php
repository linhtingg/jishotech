<?php
ob_start();

$con = new mysqli("localhost", "root", "", "jishotech");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['Export'])) {
    $topicId = isset($_POST['topic_id']) ? $_POST['topic_id'] : 0;

    if ($topicId == 0 || $topicId == '') {
        $query = "SELECT kanji, katakana, romaji, hiragana, meaning, example, link FROM words ORDER BY id_word ASC";
    } else {
        $query = "SELECT w.kanji, w.katakana, w.romaji, w.hiragana, w.meaning, w.example, w.link 
                  FROM words w
                  JOIN wordtopic wt ON w.id_word = wt.id_word
                  WHERE wt.id_topic = $topicId
                  ORDER BY w.id_word ASC";
    }

    $result = mysqli_query($con, $query);

    if (!$result) {
        die('Error in the query: ' . mysqli_error($con));
    }

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=export.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('kanji', 'katakana', 'romaji', 'hiragana', 'meaning', 'example', 'link'));

    while ($row = mysqli_fetch_assoc($result)) {
        $row = array_map('strip_tags', $row);
        fputcsv($output, $row);
    }

    fclose($output);
    exit();
}
?>
