<?php
require 'vendor/autoload.php';
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseException;
use Parse\ParseQuery;
$app_id = 'parseapp';
$rest_key = null;
$master_key = 'P0s1M0rt3m';

ParseClient::initialize($app_id, $rest_key, $master_key);
ParseClient::setServerURL('https://parse-parse.rover.pageup.no', 'parse');

$health = ParseClient::getServerHealth();
if ($health['status'] === 200) {
  print('Everything looks good');
  // addGameObject();
  getObject();
}

function addGameObject () {
  $score = new ParseObject('GameScore');
  $score->set('score', 1337);
  $score->set('name', 'Øyvind');
  $score->set('active', true);
  try {
    $score->save();
    echo 'New object created with objectId: ' . $score->getObjectId();
  } catch (ParseException $ex) {
    echo "Failed to create new object: ". $ex->getMessage();
  }
}

function getObject () {
  $query = new ParseQuery('GameScore');
  try {
    $score = $query->get('uETw8nban9');
    print_r($score);
  }
  catch (ParseException $ex) {
    echo "Failed to create new object: ". $ex->getMessage();
  }
}