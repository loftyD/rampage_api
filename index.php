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

$app->route("/events/shareable_link", function() use($app, $documentation) {
	$app->render("head");
	$app->render("events/shareable_link", ["documentation" => $documentation]);
	$app->render("foot");
});

$app->start();