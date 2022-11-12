<?php
$documentation->resourceIntro('/events/upcoming_battles', 'Display upcoming fights for an event.');
$documentation->authorizationNotRequired();
$documentation->showAlert("Note", "warning", "This resource will not show upcoming fights for events marked as private.");
$documentation->showAlert("Note", "info", "The response of this resource is cached for 1 minute for performance.");
$documentation->displayHeaders();

$params = [
	[
		"property" => "id",
		"required" => true, 
		"type" => "integer", 
		"description" => "ID of the event you want the upcoming fights for."
	],
	[
		"property" => "limit",
		"required" => false, 
		"type" => "integer", 
		"description" => "Filters how many upcoming fights should appear. Defaults to 5."
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" =>json_decode('{"currentBattle":"The Rovengers vs Crossblow II","currentBattleName":"Heat 1 Round 1 Eliminator 1","nextBattles":["Heat 1 Round 1 Eliminator 2 : Exhilarator vs Bourbon","Heat 2 Round 1 Eliminator 1 : Inertia B4 vs M.E.T.A","Heat 2 Round 1 Eliminator 2 : Rust in Pieces vs Léim","Heat 3 Round 1 Eliminator 1 : Ion vs Drizzle","Heat 3 Round 1 Eliminator 2 : F.7 vs Sprocket Raccoon"]}'),
	"fail" => [
		"on_event_not_provided" => [
			"error" => "ID must be specified."
		],
		"on_event_not_found" => [
			"error" => "Event could not be found."
		],
		"on_limit_specified_but_not_integer" => [
			"error" => "Limit must be numeric."
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
