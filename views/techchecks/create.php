<?php
$documentation->resourceIntro('/techchecks/find', 'Submit or update FRA Tech Check form results for a robot at an event.');
$documentation->authorizationRequired();
$documentation->displayHeaders(true);

$params = [
	[
		"property" => "event_id",
		"required" => true, 
		"type" => "integer", 
		"description" => "An event which must have a <em>robot_weight_class_id</em> of a FRA recognised weight class. Currently supported: Beetleweight (1.5kg) [2], Featherweight (13.6kg) (30lb) [3], Middleweight [4], Heavyweight [5]. <a href=\"/help\">Please see here for further information.</a>"
	],
	[
		"property" => "robot_id",
		"required" => true,
		"type" => "integer", 
		"description" => "The robot (by id) you wish to lookup"
	],
	[
		"property" => "comments",
		"required" => true,
		"type" => "string", 
		"description" => "Additional comments to feedback"
	],
	[
		"property" => "driver_name",
		"required" => true,
		"type" => "string", 
		"description" => "Name of driver"
	],
	[
		"property" => "checks[check_cradle]",
		"required" => true,
		"type" => "integer",
		"description" => "Cradle Check"
	],
	[
		"property" => "checks[check_sharp_edges]",
		"required" => true,
		"type" => "integer",
		"description" => "Sharp Edges Check"
	],
	[
		"property" => "checks[check_locking_bars]",
		"required" => true,
		"type" => "integer",
		"description" => "Locking Bars Check"
	],
	[
		"property" => "checks[check_batteries]",
		"required" => true,
		"type" => "integer",
		"description" => "Batteries Check"
	],
	[
		"property" => "checks[check_chargers]",
		"required" => true,
		"type" => "integer",
		"description" => "Chargers Check"
	],
	[
		"property" => "checks[check_wiring]",
		"required" => true,
		"type" => "integer",
		"description" => "Wiring Check"
	],
	[
		"property" => "checks[check_pneumatic_system]",
		"required" => true,
		"type" => "integer",
		"description" => "Pneumatic System Check"
	],
	[
		"property" => "checks[check_hydraulic_system]",
		"required" => true,
		"type" => "integer",
		"description" => "Hydraulic System Check"
	],
	[
		"property" => "checks[check_ic_engine_system]",
		"required" => true,
		"type" => "integer",
		"description" => "Internal Combustion Engine Check"
	],
	[
		"property" => "checks[check_weaponry]",
		"required" => true,
		"type" => "integer",
		"description" => "Weaponry Check"
	],
	[
		"property" => "checks[check_removable_link",
		"required" => true,
		"type" => "integer",
		"description" => "Removable Link Check"
	],
	[
		"property" => "checks[check_power_light]",
		"required" => true,
		"type" => "integer",
		"description" => "Power Light Check"
	],
	[
		"property" => "checks[check_radio_system]",
		"required" => true,
		"type" => "integer",
		"description" => "Radio System Check"
	],
	[
		"property" => "checks[check_deactivation]",
		"required" => true,
		"type" => "integer",
		"description" => "Deactivation Check"
	],
	[
		"property" => "checks[check_weight]",
		"required" => true,
		"type" => "integer",
		"description" => "Weight Check"
	],
];
$documentation->resourceDescribe($params);

$response = [
	"success" => [
		"status" => "Tech Check { saved or updated } successfully."
	],
	"fail" => [
		"on_event_cannot_be_found" => ["error" => "event could not be found."],
		"on_robot_cannot_be_found" => ["error" => "robot could not be found."]
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
