<?php

/**
 * Created by PhpStorm.
 * Filename: challenge_submission_shortcode.class.php
 * User: Joel.Inman
 * Date: 25/05/2022
 * Time: 15:54
 */
if ( ! class_exists( 'Challenge_submission_shortcode', false ) ) :
	
	class Challenge_submission_shortcode {
		
		public function __construct() {
			add_shortcode( 'challenge_form', [ $this, 'add_shortcode' ] );
		}
		
		public function add_shortcode() {
			if ( is_admin() ) {
				return;
			}
			ob_start(); ?>
			<div class="challenge_form_include">
				<?php include CC_PLUGIN_PATH . '/assets/templates/form/challenge_submission.form.php'; ?>
			</div>
			<?php return ob_get_clean();
		}
		
	}

	return new Challenge_submission_shortcode;

endif;