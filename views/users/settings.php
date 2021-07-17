<?php
$documentation->resourceIntro('/users/settings', 'Update limited settings for your user account' , 'PUT');
$documentation->authorizationRequired();
$documentation->displayHeaders(true);

$params = [
	[
		"property" => "user[name]",
		"required" => false, 
		"type" => "string", 
		"description" => "Modify your name"
	],
	[
		"property" => "user[is_unsubscribed]",
		"required" => false, 
		"type" => "boolean", 
		"description" => "Modify subscription settings for your account."
	],
	[
		"property" => "user[enable_mfa]",
		"required" => false, 
		"type" => "boolean", 
		"description" => "Modify 2FA settings for your account."
	],
	[
		"property" => "user[team_name]",
		"required" => false, 
		"type" => "string", 
		"description" => "Modify your team name."
	],
	[
		"property" => "user[theme]",
		"required" => false, 
		"type" => "string", 
		"description" => "Change your theme for Rampage."
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" => [
		"user" => [
			"name" => "Richard Jones",
			"is_unsubscribed" => false,
			"enable_mfa" => true,
			"team_name" => "Team API",
			"theme" => "flatly"
		]
	],
	"fail" => [
		"on_empty_field_if_specified_in_request" => [
			"errors" => "team_name is mandatory."
		],
		"on_invalid_boolean_specified" => [
			"errors" => "enable_mfa needs to be boolean."
		]
	]
];
$documentation->resourceResponse($response);
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
