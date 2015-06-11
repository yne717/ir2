<?php

$src_file = "code";
$dest_file = $argv[1];

if (empty($dest_file)) {
  echo 'not filename...' . PHP_EOL;
  exit();
}

$data = file_get_contents($src_file, true);

$pattern = '/^\s(.*?)\n(.*)/';
$replacement = '$2';
$data = preg_replace($pattern, $replacement, $data);

$pattern = '/0.*?:\s(.*)/';
$replacement = '$1';
$data = preg_replace($pattern, $replacement, $data);

$pattern = '/\s/';
$replacement = '';
$data = preg_replace($pattern, $replacement, $data);

$pattern = '/\n/';
$replacement = '';
$data = preg_replace($pattern, $replacement, $data);

$pattern = '/([0-9A-f]{2})/';
$replacement = '0x$1, ';
$data = preg_replace($pattern, $replacement, $data);

file_put_contents($dest_file, $data);
