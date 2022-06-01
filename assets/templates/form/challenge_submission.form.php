<?php
/**
 * Filename: challenge-submission.php
 * User: Joel.Inman
 * Date: 25/05/2022
 * Time: 14:39
 */
?>
<div class="challenge-form-wrapper container">
	<form name="challenge_submissions" class="cc-form" id="cc_form" method="post" action="<?php echo '/wp-admin/admin-post.php' ?>">
		
		<?php // WP basic form security measures
		wp_nonce_field( 'code_challenge_submit', 'code-challenge-submit-nonce' ); ?>
		<input type="hidden" name="action" value="code_challenge_submit"/>
		
		<div class="row">
			<div class="form-group col-sm-6">
				<?php // Name the Challenge - title ?>
				<label for="challenge_name">Challenge Name:</label>
				<input type="text" name="challenge_name" id="challenge_name" class="form-control challenge-fields" required>
				<small></small>
			</div>
			<div class="form-group col-sm-6">
				<?php // dropdown selector for coding languages ?>
				<label for="challenge_language">Challenge Language:</label>
				<select class="form-control challenge-fields" id="challenge_language" name="challenge_language" required>
					<option value disabled selected>-- Please Select --</option>
					<option value="php" <?php echo( $_POST[ 'challenge_language' ] === 'php' ? ' selected="selected"' : '' ) ?>>
						PHP
					</option>
					<option value="css" <?php echo( $_POST[ 'challenge_language' ] === 'css' ? ' selected="selected"' : '' ) ?>>
						CSS
					</option>
					<option value="js" <?php echo( $_POST[ 'challenge_language' ] === 'js' ? ' selected="selected"' : '' ) ?>>
						JS
					</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12 form-group">
				<?php // big text area for the Challenge description/rules ?>
				<label for="challenge_desc">Challenge Description & Rules:</label>
				<textarea name="challenge_desc" id="challenge_desc" class="form-control challenge-fields" rows="10" cols="50" required></textarea>
				<small></small>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group col-sm-6">
				<?php // get the Reddit username so a linkback can be generated later for sharing purposes ?>
				<label for="challenge_r">Your Reddit Username:</label>
				<input type="text" id="challenge_r" name="challenge_r" placeholder="e.g. u/Juggerz" class="form-control challenge-fields" required>
				<small></small>
			</div>
			<div class="form-group col-sm-6">
				<?php // submit form ?>
				<button type="submit" class="btn btn-primary challenge-btn">Submit</button>
			</div>
		</div>
	</form>
</div>
