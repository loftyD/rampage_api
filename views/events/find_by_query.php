<?php
$documentation->resourceIntro('/events/find_by_query', 'Search for events on a variety of criteria by supplying one criterion and does an event search based on location.');
$documentation->authorizationNotRequired();
$documentation->showAlert("Note", "warning", "This resource will not retrieve events marked as private.");
$documentation->showAlert("Note", "info", "If this resource fails to find events, and if you have a supplied a valid geographical location, this will retrieve applicable events that are within the declared radius <strong>(in miles.)</strong>");
$documentation->displayHeaders();

$params = [
	[
		"property" => "q",
		"required" => true, 
		"type" => "string", 
		"description" => "You can type in either the name of the event, the location of the event, the event organiser or the weight class (in text form)."
	],
	[
		"property" => "radius",
		"required" => false, 
		"type" => "float", 
		"description" => "If searching for events via geocoding, it will bring back events that are within the radius specified. Defaults to 25 miles, and maximum radius is 500 miles."
	],
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
			"status" => "active",
			"dist" => 5.29
		],
		[
			"event_id" => "1096",
			"name" => "Bristol Bot Builders Bev's",
			"location" => "Taunton, Somerset",
			"date_of_event" => "2021-05-15",
			"event_organiser" => "8191",
			"weight_class" => "3",
			"status" => "active",
			"dist" => 22.81
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
