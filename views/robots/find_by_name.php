<?php
$documentation->resourceIntro('/robots/find_by_name', 'Gets any of your robots by its ID.');
$documentation->authorizationNotRequired();
$documentation->displayHeaders();

$params = [
	[
		"property" => "name",
		"required" => true, 
		"type" => "string", 
		"description" => "Name of the robot you want to lookup. Lookup is done on partial matches. For example 'dri' matches Drizzle &amp; Maximum Ogredrive. <strong>Name is case insensitive.</strong>"
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
