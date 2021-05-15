<?php
$documentation->resourceIntro('/events/find', 'Search for events on a variety of criteria.');
$documentation->authorizationNotRequired();
$documentation->showAlert("Note", "warning", "This resource will not retrieve events marked as private.");
$documentation->displayHeaders();

$params = [
	[
		"property" => "name",
		"required" => false, 
		"type" => "string", 
		"description" => "Name of the event. You can provide partial matches for this parameter."
	],
	[
		"property" => "status",
		"required" => false, 
		"type" => "string", 
		"description" => "The status of the event. Supported values are <strong>accepting_signups</strong>, <strong>closed_signups</strong>, <strong>active</strong> and <strong>completed</strong>."
	],
	[
		"property" => "location",
		"required" => false, 
		"type" => "string", 
		"description" => "Location of the event. You can provide partial matches for this parameter."
	],
	[
		"property" => "weight_class",
		"required" => false, 
		"type" => "integer", 
		"description" => "Weight class of the event. <a href=\"/help\">Please see here for further information.</a>"
	],
	[
		"property" => "eo",
		"required" => false, 
		"type" => "integer/string", 
		"description" => "The Event organiser of the event. This is supplied by using <code>user_id</code> or partial search by name of event organiser."
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" => [
		[
			"event_id" => "1092",
			"name" => "Dockyard Derby",
			"location" => "Gloucester",
			"date_of_event" => "2021-06-29",
			"event_organiser" => "8102",
			"weight_class" => "1",
			"status" => "active"
		],
		[
			"event_id" => "1096",
			"name" => "UWE 2019",
			"location" => "University of West England, South Gloucestershire",
			"date_of_event" => "2019-02-25",
			"event_organiser" => "8191",
			"weight_class" => "2",
			"status" => "completed"
		]
	],
	"fail" => []
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
