<?php
/**
 * virtual_library_rebuild2.php - recreate psl virtual library
 * (run from the command line)
 */
include_once "VL_PhysicalSciences.php";

iconv_set_encoding("input_encoding", "UTF-8");
iconv_set_encoding("output_encoding", "UTF-8");
iconv_set_encoding("internal_encoding", "UTF-8");

$vl = new VL_PhysicalSciences();

// look for the -production argument to rebuild the production version
if (isset($argv[1]) && ($argv[1] == 'production')) {
	$vl->use_production_plop(TRUE);
	}

$vl->export_curation();

?>