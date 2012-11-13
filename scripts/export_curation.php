<?php
/**
 * export_curation.php - find curated records in a virtual library
 * (run from the command line)
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

$library = $vl->library_name;
$timestamp = date('Y-m-d-His');
$path = $vl->destination_path;
$filename = $path . "curation/$library-$version-$timestamp-curation.xml";
if (!mkdir($filename)) {
	die("can't create directory for $filename");
	}

$vl->export_curation($filename);

?>