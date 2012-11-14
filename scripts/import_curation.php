<?php
/**
 * import_curation.php - load curated records into a virtual library
 * (run from the command line)
 * php import_curation.php [ test | production ] filename.xml
 */
include_once "VL_PhysicalSciences.php";

iconv_set_encoding("input_encoding", "UTF-8");
iconv_set_encoding("output_encoding", "UTF-8");
iconv_set_encoding("internal_encoding", "UTF-8");

$vl = new VL_PhysicalSciences();

// look for the -production argument to rebuild the production version
$version = 'test';
if (isset($argv[1]) && ($argv[1] == 'production')) {
	$vl->use_production_plop(TRUE);
	$version = 'production';
	}
if (isset($argv[2])) {
	$input_filename = $argv[2];
	if (!is_file($input_filename)) {
		die("Need a better filename than '$input_filename'." . PHP_EOL);
		}
	}
else {
	die("Usage: php import_curation.php [ test | production ] filename.xml" . PHP_EOL);
	}

$curation = $vl->load_curation($input_filename);
var_dump($curation);
if ($vl->check_curation($curation)) {
	echo "curation is OK." . PHP_EOL;
	}
?>