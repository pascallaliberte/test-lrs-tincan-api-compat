<?php

# load dependencies

  require_once __DIR__ . '/vendor' . '/autoload.php';
  require_once __DIR__ . '/lib' . '/callapi.php';

  use Symfony\Component\Yaml\Yaml;
  use Symfony\Component\Yaml\Parser;

  $yaml = new Parser();

  Dotenv::load(__DIR__);
  Dotenv::required(array('LRS_ENDPOINT', 'LRS_USERNAME', 'LRS_PASSWORD'));

# load the activity => agent pairs to test against

  $tests = $yaml->parse(file_get_contents('tests.yml'));

# prepare connections to the LRS

  $lrs_endpoint = getenv('LRS_ENDPOINT');
  $lrs_username = getenv('LRS_USERNAME');
  $lrs_password = getenv('LRS_PASSWORD');

  # if LRS settings aren't set, return the default grassblade shortcode
  if (!$lrs_endpoint || !$lrs_username || !$lrs_password) {
    die('LRS not configured');
  }

  $lrs = new TinCan\RemoteLRS(
      $lrs_endpoint,
      '1.0.0',
      $lrs_username,
      $lrs_password
  );

# foreach test

  # get data from the completionreport API

  # get first 'attempted' statement using the TinCan API

  # get first 'completed' statement using the TinCan API

?>
