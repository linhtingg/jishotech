    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['saveChanges'])){
			if (mysqli_connect_error()) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$id_user = $_SESSION['uid'];
	
			$kanji = $_POST["kanjiInput"];
			$katakana = $_POST["katakanaInput"];
			$romaji = $_POST["romajiInput"];
			$hiragana = $_POST["hiraganaInput"];
			$meaning = $_POST["meaningInput"];
			$example = $_POST["exampleInput"];
			$link = $_POST["linkInput"];

			$selectedTopic = $_POST["topicSelect"];
	
	
			$sql = "INSERT INTO words (kanji, katakana, romaji, hiragana, meaning, example, link, id_user) VALUES ('$kanji', '$katakana', '$romaji', '$hiragana', '$meaning', '$example', '$link', '$id_user')";
	
			if (mysqli_query($con, $sql)) {
				$wordId = mysqli_insert_id($con);
				if (!empty($selectedTopic)) {
					$insertWordTopicSQL = "INSERT INTO wordtopic (id_topic, id_word) VALUES ('$selectedTopic', '$wordId')";
					mysqli_query($con, $insertWordTopicSQL);
				}
		
				echo '<p class="success">Từ vựng mới đã được thêm thành công!</p>';
			} else {
				echo '<p class="error">Lỗi: ' . $sql . '<br>' . mysqli_error($con) . '</p>';
			}
		
			mysqli_close($con);
		}
    }
    ?>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content p-4">
					<div class="d-flex justify-content-end">
        			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							<div class="row mb-3">
								<label for="kanjiInput" class="col-sm-2 col-form-label">語彙</label>
								<div class="col-sm-10">
									<input type="text" name="kanjiInput" id="kanjiInput" class="form-control">
								</div>
							</div>

							<div class="row mb-3">
								<label for="katakanaInput" class="col-sm-2 col-form-label">カタカナ</label>
								<div class="col-sm-10">
									<input type="text" name="katakanaInput" id="katakanaInput" class="form-control">
								</div>
							</div>

							<div class="row mb-3">
								<label for="romajiInput" class="col-sm-2 col-form-label">Romaji</label>
								<div class="col-sm-10">
									<input type="text" name="romajiInput" id="romajiInput" class="form-control">
								</div>
							</div>

							<div class="row mb-3">
								<label for="hiraganaInput" class="col-sm-2 col-form-label">ひらがな</label>
								<div class="col-sm-10">
									<input type="text" name="hiraganaInput" id="hiraganaInput" class="form-control">
								</div>
							</div>

							<div class="row mb-3">
								<label for="meaningInput" class="col-sm-2 col-form-label">意味</label>
								<div class="col-sm-10">
									<input type="text" name="meaningInput" id="meaningInput" class="form-control">
								</div>
							</div>

							<div class="row mb-3">
								<label for="topicSelect" class="col-sm-2 col-form-label">トピック</label>
								<div class="col-sm-10">
									<select class="form-select" name="topicSelect" id="topicSelect">
										<?php
											$topicQuery = $con->query("SELECT * FROM Topics");
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
									<textarea name="exampleInput"  id="exampleInput" class="form-control" rows="5"></textarea>
								</div>
							</div>

							<div class="row mb-3">
								<label for="linkInput" class="col-sm-2 col-form-label">リング</label>
								<div class="col-sm-10">
									<input type="text" name="linkInput" id="linkInput" class="form-control">
								</div>
							</div>
							<div class="d-flex justify-content-center">
								<button type="submit" name="saveChanges" class="btn btn-primary ps-5 pe-5">追加</button>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
