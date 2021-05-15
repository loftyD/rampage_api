<?php
$documentation->resourceIntro('/robots/find', 'Search for robots on a variety of criteria.');
$documentation->authorizationNotRequired();
$documentation->displayHeaders();

$params = [
	[
		"property" => "name",
		"required" => false, 
		"type" => "string", 
		"description" => "Name of the robot. You can provide partial matches for this parameter."
	],
	[
		"property" => "weight_class",
		"required" => false, 
		"type" => "integer", 
		"description" => "Weight class of the event. <a href=\"/help\">Please see here for further information.</a>"
	],
	[
		"property" => "owner",
		"required" => false, 
		"type" => "integer/string", 
		"description" => "The Event organiser of the event. This is supplied by using <code>user_id</code> or partial search by name of the user."
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" => [
		[
		"name" => "Polly",
		"weapon" => "Flipper",
		"weight_class" => "Beetleweight (1.5kg)",
		"owner" => "Ben Hassan"
		]
	],
	"fail" => [
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
