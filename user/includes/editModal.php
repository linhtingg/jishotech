<?php
include('includes/config.php');
session_start();

$id_word = $_GET['wordid'];
$req = mysqli_query($con, "SELECT * FROM words WHERE id_word='$id_word' limit 1");
$word = mysqli_fetch_array($req);

$id_user = $_SESSION['uid'];


if(isset($_POST['save'])){
	if (mysqli_connect_error()) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$kanji = $_POST["kanjiInput"];
	$katakana = $_POST["katakanaInput"];
	$romaji = $_POST["romajiInput"];
	$hiragana = $_POST["hiraganaInput"];
	$meaning = $_POST["meaningInput"];
	$example = $_POST["exampleInput"];
	$link = $_POST["linkInput"];

	$selectedTopic = $_POST["topicSelect"];


	$sql = "UPDATE words SET kanji = '$kanji', katakana = '$katakana', romaji = '$romaji', hiragana = '$hiragana', 
			meaning = '$meaning', example = '$example', link = '$link'
			WHERE (id_user = '$id_user' AND id_word = '$id_word');";

	if (mysqli_query($con, $sql)) {
		$wordId = mysqli_insert_id($con);
		if (!empty($selectedTopic)) {
			$insertWordTopicSQL = "UPDATE wordtopic SET id_topic = '$selectedTopic' WHERE id_word = '$wordId')";
			mysqli_query($con, $insertWordTopicSQL);
		}

		echo '<script type="text/javascript">alert("語彙の内容が編集されました。")</script>';
		echo '<script type="text/javascript"> window.location = "./search.php"; </script>';
	} else {
		echo '<p class="error">Lỗi: ' . $sql . '<br>' . mysqli_error($con) . '</p>';
	}

	mysqli_close($con);
}

?>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content p-4">
			<div class="d-flex justify-content-end">
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" action="">
					<div class="row mb-3">
						<label for="kanjiInput" class="col-sm-2 col-form-label">語彙</label>
						<div class="col-sm-10">
							<input type="text" name="kanjiInput" id="kanjiInput" class="form-control" value ="<?php echo $word['kanji'];?>" placeholder="<?php echo $word['kanji'];?>" >
						</div>
					</div>

					<div class="row mb-3">
						<label for="katakanaInput" class="col-sm-2 col-form-label">カタカナ</label>
						<div class="col-sm-10">
							<input type="text" name="katakanaInput" id="katakanaInput" class="form-control" value ="<?php echo $word['katakana'];?>" placeholder="<?php echo $word['katakana'];?>">
						</div>
					</div>

					<div class="row mb-3">
						<label for="romajiInput" class="col-sm-2 col-form-label">Romaji</label>
						<div class="col-sm-10">
							<input type="text" name="romajiInput" id="romajiInput" class="form-control" value ="<?php echo $word['romanji'];?>" placeholder="<?php echo $word['romanji'];?>">
						</div>
					</div>

					<div class="row mb-3">
						<label for="hiraganaInput" class="col-sm-2 col-form-label">ひらがな</label>
						<div class="col-sm-10">
							<input type="text" name="hiraganaInput" id="hiraganaInput" class="form-control" value ="<?php echo $word['hiragana'];?>" placeholder="<?php echo $word['hiragana'];?>">
						</div>
					</div>

					<div class="row mb-3">
						<label for="meaningInput" class="col-sm-2 col-form-label">意味</label>
						<div class="col-sm-10">
							<input type="text" name="meaningInput" id="meaningInput" class="form-control" value ="<?php echo $word['meaning'];?>" placeholder="<?php echo $word['meaning'];?>">
						</div>
					</div>

					<div class="row mb-3">
						<label for="topicSelect" class="col-sm-2 col-form-label">トピック</label>
						<div class="col-sm-10">
							<select class="form-select" name="topicSelect" id="topicSelect" value ="<?php echo $word['topic'];?>" placeholder="<?php echo $word['topic'];?>">
								<?php
									$topicQuery = $con->query("SELECT * FROM topics");
									$topics = $topicQuery->fetch_all(MYSQLI_ASSOC);

									foreach ($topics as $topic) {
										$topicId = $topic["id_topic"];
										$topicName = $topic["topic_name"];
										echo "<option value='$topicId'>$topicName</option>";
									}
								?>
							</select>
						</div>

					</div>

					<div class="row mb-3">
						<label for="exampleInput" class="col-sm-2 col-form-label">使い方</label>
						<div class="col-sm-10">
							<textarea name="exampleInput"  id="exampleInput" class="form-control" rows="5" value ="<?php echo $word['example'];?>" placeholder="<?php echo $word['example'];?>"></textarea>
						</div>
					</div>

					<div class="row mb-3">
						<label for="linkInput" class="col-sm-2 col-form-label">リング</label>
						<div class="col-sm-10">
							<input type="text" name="linkInput" id="linkInput" class="form-control" value ="<?php echo $word['link'];?>" placeholder="<?php echo $word['link'];?>">
						</div>
					</div>
					<div class="d-flex justify-content-center">
						<button type="submit" name="save" class="btn btn-primary ps-5 pe-5">追加</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
        