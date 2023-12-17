<?php
if(isset($_POST["Import"])) {
    $filename = $_FILES["file"]["tmp_name"];
    $id_user = $_SESSION['uid'];
    $selectedTopic = $_POST["importTopic"];

    if($_FILES["file"]["size"] > 0){
        $file = fopen($filename, "r");
        while(($getData = fgetcsv($file, 10000, ","))!==FALSE) {
            $sql = "INSERT INTO words (kanji, katakana, romaji, hiragana, meaning, example, link, id_user) VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."', '".$getData[5]."', '".$getData[6]."', '$id_user') ";

            $result = mysqli_query($con, $sql);
            if(!isset($result)){
                echo "<script type=\"text/javascript\">
                    alert(\"ファイルが無効です：CSVファイルをアップロードしてください。
                    \");
                    window.location=\"topic.php\"    
                </script>";
            } else {
              $id_word = mysqli_insert_id($con);
              $sqlWordTopic = "INSERT INTO wordtopic (id_topic, id_word) VALUES ('$selectedTopic', '$id_word')";
              $resultWordTopic = mysqli_query($con, $sqlWordTopic);
              if(!isset($resultWordTopic)){
                echo "<script type=\"text/javascript\">
                        alert(\"Error adding data to wordtopic table.\");
                        window.location=\"topic.php\"    
                    </script>";
              }else {
                echo "<script type=\"text/javascript\">
                    alert(\"CSVファイルが正常にインポートされました\");
                    window.location=\"topic.php\"    
                </script>";
              }
                
            }
        }
        fclose($file);
    }
}
?>

<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="d-flex justify-content-end">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" name="upload_excel" enctype="multipart/form-data">
          <div class="row mb-3">
            <label class="col-md-4 control-label">
              エクセル/CSV</br>ファイル
            </label>
            <div class="col-md-8">
              <input type="file" name="file" id="file" class="input-large" >
            </div>
          </div>
          <div class="row mb-5">
            <label for="importTopic" class="col-md-4">トピック</label>
            <div class="col-md-8">
            <select name="importTopic" id="importTopic" class="form-select">
              <?php
                foreach ($topics as $topic) {
                  $topicId = $topic["id_topic"];
                  $topicName = $topic["topic_name"];
                  echo "<option value='$topicId'>$topicName</option>";
                }
              ?>
            </select>
          </div>
          </div>
          
          <div class="d-flex justify-content-end ">
            <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">インポート</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>