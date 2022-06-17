<?php
$documentation->resourceIntro('/users/sign_in', 'Authenticate to retrieve secure token to carry out authed requests.' , 'POST');
$documentation->showAlert("Note", "warning", "Upon successful authentication, the authentication token will be located in the headers of the response.");
$documentation->showAlert("Note", "info", "If you have 2FA set up for your account, you'll need to call this resource twice. Once for initial login and once for 2FA confirmation.");
$documentation->displayHeaders(false);

$params = [
	[
		"property" => "email",
		"required" => true, 
		"type" => "string", 
		"description" => "The email you use to authenticate."
	],
	[
		"property" => "password",
		"required" => true, 
		"type" => "string", 
		"description" => "The password you use to authenticate."
	],
	[
		"property" => "mfa_code",
		"required" => false, 
		"type" => "string", 
		"description" => "Required if <i>enable_mfa</i> is set for your account. This is used to send the code you receive via email."
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" => [
		"success" => "You are now authenticated. Please check the response headers for your authorization key."
	],
	"fail" => [
		"on_no_account" => [
			"error" => "Could not find an account with those details. Please try again."
		],
		"on_account_locked" => [
			"error" => "Your account is currently locked. Please reset your password."
		],
		"on_account_becomes_locked" => [
			"error" => "Your account is now locked. Please reset your password."
		],
		"on_account_inactive" => [
			"error" => "Your account is not active. Please speak to the Rampage Team to resolve."
		],
		"on_incorrect_password_specified" => [
			"error" => "Incorrect login details specified. You have {x} attempts left."
		],
	]
];

$response_2fa = [
	"success" => [
		"success" => "Please call POST /users/sign_in with credentials and correct 2FA to complete authentication.",
		"mfa_required" => true
	],
	"fail" => [
		"on_2fa_not_setup" => [
			"error" => "2FA is not enabled. Please login without supplying a 2FA code."
		],
		"on_incorrect_2fa_submitted" => [
			"error" => "Incorrect 2FA code specified. You have {x} attempts left."
		],
		"on_account_becomes_locked_2fa" => [
			"error" => "Your account is now locked. Please reset your password."
		],
	]
];

$documentation->resourceResponse($response);

$documentation->resourceResponse($response_2fa);
?>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?=$this->render('sidebar');?>
		</div>
		<div class="col-md-8">
			<?php $documentation->outputResource(); ?>
		</div>
	</div>
</div>
