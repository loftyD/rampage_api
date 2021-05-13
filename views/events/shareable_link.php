<?php
$documentation->resourceIntro('/events/shareable_link', 'Get a shareable URL for your event to show on live-streams, online or to competitors.');
$documentation->authorizationNotRequired();
$documentation->showAlert("Note", "warning", "This resource will not generate shareable URL's for events marked as private.");
$documentation->displayHeaders();

$params = [
	[
		"property" => "id",
		"required" => true, 
		"type" => "integer", 
		"description" => "ID of the event you want the shareable URL for."
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" => [
		"url" => "http://rmpg.ly/sxs-2020"
	],
	"fail" => [
		"on_not_provided" => [
			"error" => "ID must be specified."
		],
		"on_cannot_be_found" => [
			"error" => "Event could not be found."
		],
		"on_is_private_event" => [
			"error" => "Not available for private events."
		]
	]
];
$documentation->resourceResponse($response);
$documentation->outputResource();
