<?php
$documentation->resourceIntro('/users/show', 'Gets any of your robots by its ID.');
$documentation->authorizationNotRequired();
$documentation->displayHeaders();

$params = [
	[
		"property" => "name",
		"required" => true, 
		"type" => "string", 
		"description" => "Name of the robot you want to lookup."
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" => [
		[
		"name" => "Polly",
		"weapon" => "Flipper",
		"weight_class" => "Beetleweight (1.5kg)"
		]
	],
	"fail" => [
		"on_not_provided" => [
			"error" => "ID must be specified."
		],
		"on_cannot_be_found" => [
			"error" => "Robot could not be found."
		]
	]
];
$documentation->resourceResponse($response);
$documentation->outputResource();