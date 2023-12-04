 <?php
include('includes/config.php');
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Từ Vựng Tiếng Nhật</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

    <!--link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"-->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .detail-voca {
            padding-left: 20px;
            padding-right: 200px;
            padding-top: 30px;
            height: auto;
            border-radius: 15px;
            width: auto; 
            border: 2px solid black; /* Thêm đường viền đen */
        }
        .kanji {
            color: red;
            font-size: 2.4em;
        }
        .hiragana {
            font-size: 2.4em;
        }
        .left-column {
        background-color: #1677FF; 
        color: white; 
        padding: 20px; 
        border-radius: 20px;
        width: 250px;
        height: 150px;
        }
        .meaning {
            color: #3367D6;
        }
        .example {
            color: red;
        }
        .example-meaning {
            font-style: italic;
        }
        .image-container {
        display: flex;
        justify-content: space-between;
        }
        .vocabulary-image {
        max-width: 300px;
        height: 300px;
        display: block;
        margin: 10px 5px; 
        }

        button {
            margin-top: 10px;
            padding: 5px 10px;
            font-size: 1em;
            background-color: #1677FF;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .edit-popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #fff;
        z-index: 1;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif; 
        max-width: 400px; 
        width: 100%; 
        box-sizing: border-box; 
        }

        .edit-popup label {
            display: block;
            margin-bottom: 5px;
        }

        .edit-popup input,
        .edit-popup textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .edit-popup button {
            padding: 8px 16px;
            background-color: #1677FF;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class=" left-column">
                <h2>登録</h2>
                <h4>とうろく</h4>
                </div>
            </div>
            <div class="col-md-9">
                <div class="detail-voca">
                    <h1>語彙の意味</h1>
                    <p class="kanji">登録</p>
                    <p class="hiragana">とうろく</p>
                    <ul>
                        <li class="meaning">Đăng ký</li>
                        <!--li class="meaning"></li-->
                        <li class="example">NULL</li>
                        <li class="example-meaning">NULL</li>
                    </ul>
                    <div class="image-container">
                    <img src="https://kaihipay.zendesk.com/hc/article_attachments/360074159813/mceclip0.png" class="vocabulary-image" alt="Hình ảnh của từ vựng">
                    <img src="https://mercari.yuubinya.com/wp-content/uploads/2021/03/ic_109.png" class="vocabulary-image" alt="Hình ảnh của từ vựng">
                    </div>
                    <button onclick="loadDifferentImage()">語彙の他の画像</button>
                    <button id="editButton" onclick="showEditPopup()">Edit</button>

                </div>
            </div>
        </div>
    </div>

    <div id="editPopup" class="edit-popup">
        <label for="kanji">Kanji:</label>
        <input type="text" id="kanji">
        <br>
        <label for="meaning">Ý nghĩa:</label>
        <input type="text" id="meaning">
        <br>
        <label for="topic">Topic:</label>
        <input type="text" id="topic">
        <br>
        <label for="usage">Cách sử dụng:</label>
        <textarea id="usage"></textarea>
        <br>
        <label for="image">Hình ảnh:</label>
        <input type="file" id="image" accept=".png">
        <br>
        <button onclick="saveChanges()">Edit</button>
        <button onclick="cancelEdit()" style="background-color: #FF4040; color: white;">Cancel</button>
    </div>

    <!--script>
        function showEditPopup() {
            var editPopup = document.getElementById("editPopup");
            editPopup.style.display = "block";
        }
        function cancelEdit() {
            var editPopup = document.getElementById("editPopup");
            editPopup.style.display = "none";
        }
        function saveChanges() {
            cancelEdit();
        }
    </script-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>







<?php
/* include('includes/config.php');
session_start();
error_reporting(0);

$query = "SELECT * FROM words";
$result = mysqli_query($con, $query);

// Kiểm tra lỗi truy vấn
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Lấy số từ vựng trong kết quả
$totalWords = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Từ Vựng Tiếng Nhật</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        .kanji {
            color: red;
            font-size: 2.4em;
        }

        .hiragana {
            font-size: 2.4em;
        }

        .meaning {
            color: #3367D6;
        }

        .example {
            color: red;
        }

        .example-meaning {
            font-style: italic;
        }

        img {
            max-width: 30%;
            height: auto;
        }

        button {
            margin-top: 10px;
            padding: 5px 10px;
            font-size: 1em;
            background-color: #1677FF;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        #prevButton, #nextButton {
    margin-top: 10px;
    padding: 10px 20px; 
    font-size: 1.2em; 
    background-color: #1677FF;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    position: absolute;
    right: 20px; 
}

        #prevButton {
            right: 150px; 
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="detail_voca">
        <h1>語彙の意味</h1>

        <p class='kanji'></p>
        <p class='hiragana'></p>
        <ul>
            <li class='meaning'></li>
            <ul class='example'></ul>
            <ul class='example-meaning'></ul>
        </ul>
        <img src='#' alt='画像'>
        <button id="prevButton">語彙の前</button>
        <button id="nextButton">語彙の他</button>

        <script>
            var currentWordIndex = 0;
            var words = <?php echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC)); ?>;
            var totalWords = <?php echo $totalWords; ?>;

            $(document).ready(function() {
                $("#nextButton").click(function() {
                    if (currentWordIndex < totalWords - 1) {
                        currentWordIndex++;
                        displayWord(words[currentWordIndex]);
                    } 
                });

                $("#prevButton").click(function() {
                    if (currentWordIndex > 0) {
                        currentWordIndex--;
                        displayWord(words[currentWordIndex]);
                    } 
                });

                if (totalWords > 0) {
                    displayWord(words[currentWordIndex]);
                }
            });

            function displayWord(word) {
                $('.kanji').text(word.kanji);
                $('.hiragana').text(word.hiragana);
                $('.meaning').text(word.meaning);
                $('.example').text(word.example);
                $('.example-meaning').text(word.example_meaning);
            }
        </script>
    </div>
</body>
</html> */ ?>



