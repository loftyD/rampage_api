<?php
$documentation->resourceIntro('/robots/find_by_name', 'Query robots by name.');
$documentation->authorizationNotRequired();
$documentation->displayHeaders();

$params = [
	[
		"property" => "name",
		"required" => true, 
		"type" => "string", 
		"description" => "Name of the robot you want to lookup. Lookup is done on partial matches. For example 'dri' matches Drizzle &amp; Maximum Ogredrive. <strong>name is case insensitive.</strong>"
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
