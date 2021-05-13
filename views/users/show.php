<?php
$documentation->resourceIntro('/users/show', 'View a limited subset of your user data');
$documentation->authorizationRequired();
$documentation->showAlert("Note", "warning", "You will not be able to access other user's data with this resource; only your own.");
$documentation->displayHeaders(true);

$params = [
	[
		"property" => "id",
		"required" => true, 
		"type" => "integer", 
		"description" => "ID of the user you want to lookup."
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" => [
		"name" => "Richard Jones",
		"email" => "richard.jones1998@hotmail.co.uk",
		"created_at" => "2021-05-01 19:23:05"
		],
	"fail" => [
		"on_not_provided" => [
			"error" => "ID must be specified."
		],
		"on_cannot_be_found" => [
			"error" => "User could not be found."
		],
		"on_insufficient_permissions" => [
			"error" => "You do not have permissions to access this resource."
		]
	]
];
$documentation->resourceResponse($response);
$documentation->outputResource();
