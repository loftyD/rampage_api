<?php
$documentation->resourceIntro('/events/robot_history', 'Display fight history (not including whiteboard fights) for a robot at an event.');
$documentation->authorizationNotRequired();
$documentation->showAlert("Note", "warning", "This resource will not show results for fights for events marked as private.");
$documentation->displayHeaders();

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
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" => json_decode('[{"battle":"First Round Battle 16","won":"Yes","against":"Do Ya? vs Enigma vs Drizzle"},{"battle":"Round of 32 16","won":"Yes","against":"Pain Per View vs Drizzle"},{"battle":"Round of 16 1","won":"Yes","against":"Procrastination vs Drizzle"},{"battle":"Round of 8 1","won":"Yes","against":"Oubley vs Drizzle"},{"battle":"Grand Final Semi-Final 1","won":"No","against":"Drizzle vs Resistance"},{"battle":"3rd Place Playoff","won":"Yes","against":"Rust in Pieces vs Drizzle"}]'),
	"fail" => [
		"on_robot_id_not_provided" => [
			"error" => "History not found."
		],
		"on_event_id_not_provided" => [
			"error" => "History not found."
		],
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
