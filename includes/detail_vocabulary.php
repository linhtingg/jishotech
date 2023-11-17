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
            font-size: 1.2em;
        }

        .hiragana {
            font-size: 1.2em;
        }

        .meaning {
            color: blue;
        }

        .example {
            color: red;
        }

        .example-meaning {
            font-style: italic;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        button {
            margin-top: 10px;
            padding: 5px 10px;
            font-size: 1em;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php include_once('includes/header.php');?>
<?php include_once('includes/search.php');?>
<?php include_once('includes/topiclist.php');?>	
<div class ="detai_voca">
    <h1>Ý Nghĩa Của Từ Vựng</h1>

    <p class="kanji"> 提案 (Lệ Văn)</p>
    <p class="hiragana">ていあん</p>
    <ul>
        <li class="meaning"> Đề án</li>
        <li class="meaning"> Sự đề xuất, sự đưa ra</li>
        <li class="example"> 提案があります。</li>
        <p class="example-meaning">Tôi có một gợi ý.</p>
    </ul>

    <img src="#" alt="Hình ảnh của từ vựng">

    <button onclick="loadDifferentVocabulary()">Từ Vựng Khác</button>
</div>
    <script>
        function loadDifferentVocabulary() {
            // Xử lý khi nhấn nút để load từ vựng khác
            alert("Load từ vựng khác");
        }
    </script>
    <?php include_once('includes/footer.php');?>
</body>
</html>
