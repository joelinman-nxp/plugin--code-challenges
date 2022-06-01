<?php
/**
 * Created by PhpStorm.
 * Filename: challenge_submission_handler.class.php
 * User: Joel.Inman
 * Date: 27/05/2022
 * Time: 08:54
 */
if ( ! class_exists( 'Challenge_submission_handler' ) ) :
	
	class Challenge_submission_handler {
		
		public function __construct() {
			add_action( 'admin_post_nopriv_code_challenge_submit', [ $this, 'handle_form' ] );
			add_action( 'admin_post_code_challenge_submit', [ $this, 'handle_form' ] );
			
		}
		
		public function handle_form() {
			
			$nonce_val = $_POST[ 'code-challenge-submit-nonce' ];
			
			if ( ! wp_verify_nonce( $nonce_val, 'code_challenge_submit' ) ) :
				return;
			endif;
			
			if ( empty( $_POST[ 'action' ] ) || 'code_challenge_submit' !== $_POST[ 'action' ] ) :
				return;
			endif;
			
			$refer_url = get_home_url() . $_POST[ '_wp_http_referer' ];
			
			$challenge_name     = ! empty( $_POST[ 'challenge_name' ] ) ? $_POST[ 'challenge_name' ] : '';
			$challenge_language = ! empty( $_POST[ 'challenge_language' ] ) ? $_POST[ 'challenge_language' ] : '';
			$challenge_desc     = ! empty( $_POST[ 'challenge_desc' ] ) ? $_POST[ 'challenge_desc' ] : '';
			$challenge_r        = ! empty( $_POST[ 'challenge_r' ] ) ? $_POST[ 'challenge_r' ] : '';
			
			
			if ( post_type_exists( 'challenge_sub' ) ) :
				$post    = [
					'post_type'   => 'challenge_sub',
					'post_title'  => $challenge_language . ' | ' . $challenge_name . ' from ' . $challenge_r,
					'post_status' => 'publish'
				];
				$post_id = wp_insert_post( $post, true );
				
				if ( ! is_wp_error( $post_id ) ):
					update_post_meta( $post_id, 'challenge_name', $challenge_name );
					update_post_meta( $post_id, 'challenge_language', $challenge_language );
					update_post_meta( $post_id, 'challenge_desc', $challenge_desc );
					update_post_meta( $post_id, 'challenge_r', $challenge_r );
				endif;
			
			endif;
			wp_safe_redirect( '/thanks-mate' );
		}
		
	}
	
	return new Challenge_submission_handler;

endif;