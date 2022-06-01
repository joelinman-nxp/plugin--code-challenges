const challengeName = document.querySelector('#challenge_name');
const challengeDescription = document.querySelector('#challenge_desc');
const challengeR = document.querySelector('#challenge_r');

const form = document.querySelector('#challenge_submissions');

// Tools/methods
const isRequired = value => value !== '';
const isBetween = (length, min, max) => !( length < min || length > max );

const showError = (input, message) => {
	// get the form-field element
	const formField = input.parentElement;
	// add the error class
	formField.classList.remove('success');
	formField.classList.add('error');

	// show the error message
	const error = formField.querySelector('small');
	error.textContent = message;
};


const checkChallengeName = () => {

	const min = 5, max = 50;

	const challengename = challengeName.value.trim();

	if ( !isRequired(challengename) ) {
		showError(challengeName, 'Dont leave that empty!!');
	} else if (!isBetween()) {
		showError();
	}
}

const checkChallengeDesc = () => {}

const checkChallengeR = () => {}