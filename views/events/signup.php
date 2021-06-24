<?php
$documentation->resourceIntro('/events/signup', 'Sign up one of your robots to an event.', "POST");
$documentation->authorizationRequired();
$documentation->displayHeaders(true);

$params = [
	[
		"property" => "event_id",
		"required" => true, 
		"type" => "integer", 
		"description" => "ID of the event."
	],
	[
		"property" => "robot_id",
		"required" => true, 
		"type" => "integer", 
		"description" => "ID of the robot."
	],
	[
		"property" => "password",
		"required" => false, 
		"type" => "string", 
		"description" => "If signing up to a private event, the event password must be specified."
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" => [
		"success" => "Robot has been signed up successfully as a competitor."
		],
	"fail" => [
		"on_robot_id_not_provided" => [
			"error" => "robot_id must be specified."
		],
		"on_event_id_not_provided" => [
			"error" => "event_id must be specified."
		],
		"on_robot_not_found" => [
			"error" => "Robot not found."
		],
		"on_event_not_found" => [
			"error" => "Event not found."
		],
		"on_private_event_no_password_specified" => [
			"error" => "Private events require an event password."
		],
		"on_private_event_password_incorrect" => [
			"error" => "Private event password is incorrect."
		],
		"on_signup_check_already_signed_up" => [
			"error" => "This robot is already signed up to this event."
		],
		"on_signup_check_invalid_robots" => [
			"error" => "None of your robots meet the criteria for this event."
		],
		"on_signup_check_event_is_active" => [
			"error" => "This event is marked as active; therefore you can not sign up to this event."
		],
		"on_signup_check_application_required" => [
			"error" => "For this event, you must submit an application."
		],
		"on_signup_check_maximum_robots_per_team_breached" => [
			"error" => "You have signed up with the maximum amount of robots permissible per team for this event."
		],
		"on_signup_check_general_error" => [
			"error" => "This robot is not eligible to sign up to this event. This could be due to the robot not meeting the valid weightclass, or the event has closed signups."
		],
		"on_disallow_signups_on_close" => [
			"error" => "At this time, the event has closed signups. This means you won't be able to sign up to this event; even as a reserve."
		],
		"on_insufficient_permissions" => [
			"error" => "You do not have permissions to access this resource."
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
