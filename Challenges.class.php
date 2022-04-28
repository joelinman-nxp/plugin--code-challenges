<?php
namespace cc;
/**
 * Filename: Challenges.class.php - Namespaced
 * User: Joel.Inman
 * Date: 22/04/2022
 * Time: 08:58
 */
class Challenges {
	
	protected $type; // which type of challenge
	
	public function __construct($type) {
		$this->type = $type;
	}
}

$challengeDay = new \cc\Challenges('CSS');