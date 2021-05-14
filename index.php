<?php
include("vendor/autoload.php");
include("helpers/DocumentationHelper.php");
$documentation = new DocumentationHelper();
$app = new \flight\Engine();

$app->route("/", function() use($app) {
	$app->render("head");
	$app->render("home/welcome");
	$app->render("foot");
});

# events docs go here

$app->route("/events/shareable_link", function() use($app, $documentation) {
	$app->render("head");
	$app->render("events/shareable_link", ["documentation" => $documentation]);
	$app->render("foot");
});

$app->route("/events/signup", function() use($app, $documentation) {
	$app->render("head");
	$app->render("events/signup", ["documentation" => $documentation]);
	$app->render("foot");
});

# robot docs go here

$app->route("/robots/show", function() use($app, $documentation) {
	$app->render("head");
	$app->render("robots/show", ["documentation" => $documentation]);
	$app->render("foot");
});

$app->route("/robots/find_by_name", function() use($app, $documentation) {
	$app->render("head");
	$app->render("robots/find_by_name", ["documentation" => $documentation]);
	$app->render("foot");
});

# user docs go here

$app->route("/users/show", function() use($app, $documentation) {
	$app->render("head");
	$app->render("users/show", ["documentation" => $documentation]);
	$app->render("foot");
});


$app->start();