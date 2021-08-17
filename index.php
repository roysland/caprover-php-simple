<?php

$action = 'default';

if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

switch ($action) {
  case 'default':
    echo 'It works';
    break;
  case 'random':
      $query = file_get_contents('https://randomuser.me/api/');
      $response = json_decode($query);
      print_r($response);
    break;
}