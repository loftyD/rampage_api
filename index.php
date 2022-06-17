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

$app->route("/help", function() use($app) {
	$app->render("head");
	$app->render("home/help");
	$app->render("foot");
});

# events docs go here

$app->route("/events/shareable_link", function() use($app, $documentation) {
	$app->render("head");
	$app->render("events/shareable_link", ["documentation" => $documentation]);
	$app->render("foot");
});

$app->route("/events/find_by_query", function() use($app, $documentation) {
	$app->render("head");
	$app->render("events/find_by_query", ["documentation" => $documentation]);
	$app->render("foot");
});

$app->route("/events/find", function() use($app, $documentation) {
	$app->render("head");
	$app->render("events/find", ["documentation" => $documentation]);
	$app->render("foot");
});

$app->route("/events/upcoming_battles", function() use($app, $documentation) {
	$app->render("head");
	$app->render("events/upcoming_battles", ["documentation" => $documentation]);
	$app->render("foot");
});

$app->route("/events/signup", function() use($app, $documentation) {
	$app->render("head");
	$app->render("events/signup", ["documentation" => $documentation]);
	$app->render("foot");
});

$app->route("/events/robot_history", function() use($app, $documentation) {
	$app->render("head");
	$app->render("events/robot_history", ["documentation" => $documentation]);
	$app->render("foot");
});

# robot docs go here

$app->route("/robots/show", function() use($app, $documentation) {
	$app->render("head");
	$app->render("robots/show", ["documentation" => $documentation]);
	$app->render("foot");
});

$app->route("/robots/find", function() use($app, $documentation) {
	$app->render("head");
	$app->render("robots/find", ["documentation" => $documentation]);
	$app->render("foot");
});

# user docs go here

$app->route("/users/show", function() use($app, $documentation) {
	$app->render("head");
	$app->render("users/show", ["documentation" => $documentation]);
	$app->render("foot");
});

$app->route("/users/settings", function() use($app, $documentation) {
	$app->render("head");
	$app->render("users/settings", ["documentation" => $documentation]);
	$app->render("foot");
});

$app->route("/users/sign_in", function() use($app, $documentation) {
	$app->render("head");
	$app->render("users/sign_in", ["documentation" => $documentation]);
	$app->render("foot");
});



$app->start();