<?php
/**
 * Filename: challenge-submission.php
 * User: Joel.Inman
 * Date: 25/05/2022
 * Time: 14:39
 */
?>
<div class="challenge-form-wrapper container">
	<form name="challenge_submissions" method="post">
		<div class="row">
			<div class="form-group col-sm-6">
				<?php // Name the Challenge - title ?>
				<label for="challenge_name" >Challenge Name:</label>
				<input type="text" name="challenge_name" id="challenge_name" class="form-control challenge-fields" required>
			</div>
			<div class="form-group col-sm-6">
				<?php // dropdown selector for coding languages ?>
				<label for="challenge_language">Challenge Language:</label>
				<select class="form-control challenge-fields" id="challenge_language" name="challenge_language">
					<option value disabled selected>-- Please Select --</option>
					<option value="php" <?php echo( $_POST['challenge_language'] === 'php' ? ' selected="selected"' : '' ) ?>>
						PHP
					</option>
					<option value="css" <?php echo( $_POST['challenge_language'] === 'css' ? ' selected="selected"' : '' ) ?>>
						CSS
					</option>
					<option value="js" <?php echo( $_POST['challenge_language'] === 'js' ? ' selected="selected"' : '' ) ?>>
						JS
					</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<?php // big text area for the Challenge description/rules ?>
				<label for="challenge_desc">Challenge Description:</label>
				<textarea name="challenge_desc" id="challenge_desc" class="form-control challenge-fields" rows="10" cols="50" required></textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm-6">
				<?php // get the Reddit username so a linkback can be generated later for sharing purposes ?>
				<label for="challenge_r">Your Reddit Username:</label>
				<input type="text" id="challenge_r" name="challenge_r" placeholder="e.g. u/Juggerz" class="form-control challenge-fields" required>
			</div>
			<div class="form-group col-sm-6">
				<?php // submit form ?>
				<button type="submit" class="btn btn-primary challenge-btn">Submit</button>
			</div>
		</div>
	</form>
</div>