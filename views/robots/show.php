<?php
$documentation->resourceIntro('/robots/show', 'Gets any of your robots by its ID.');
$documentation->authorizationRequired();
$documentation->showAlert("Note", "warning", "You will not be able to access other user's robots with this resource; only your own. Use <a href=\"/robots/find\">/robots/find</a> to lookup other robots by a variety of criteria.");
$documentation->displayHeaders(true);

$params = [
	[
		"property" => "id",
		"required" => true, 
		"type" => "integer", 
		"description" => "ID of the robot you want to lookup."
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" => [
		"name" => "Polly",
		"weapon" => "Flipper",
		"weight_class" => "Beetleweight (1.5kg)"
		],
	"fail" => [
		"on_not_provided" => [
			"error" => "ID must be specified."
		],
		"on_cannot_be_found" => [
			"error" => "Robot could not be found."
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
