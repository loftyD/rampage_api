<?php
$documentation->resourceIntro('/techchecks/find', 'Retrieve FRA Tech Check form results for a robot at an event.');
$documentation->displayHeaders();

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
	]
];
$documentation->resourceDescribe($params);

$response = [
	"success" => [
	  'techcheck' => 
	  [
	    'check_cradle' => '1',
	    'check_sharp_edges' => '1',
	    'check_locking_bars' => '1',
	    'check_batteries' => '1',
	    'check_chargers' => '1',
	    'check_wiring' => '1',
	    'check_pneumatic_system' => '1',
	    'check_hydraulic_system' => '1',
	    'check_ic_engine_system' => '1',
	    'check_weaponry' => '1',
	    'check_removable_link' => '1',
	    'check_power_light' => '1',
	    'check_radio_system' => '1',
	    'check_deactivation' => '1',
	    'check_weight' => '1',
	    'has_passed' => true,
	    'driver_name' => 'Tom Brewster',
	    'comments' => 'passed checks',
	  ]
	],
	"fail" => [
		"on_event_cannot_be_found" => ["error" => "event could not be found."]
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
