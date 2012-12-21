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

// look for the production argument to rebuild the production version
if (isset($argv[1]) && ($argv[1] == 'production')) {
	$vl->use_production_plop(TRUE);
	}

// look for the 'no-replication' argument to inhibit replication
if (isset($argv[2])) {
	if ($argv[2] == 'no-replication') {
		$replication = FALSE;
		}
	else {
		die ('invald second argument - if present it must be no-replication!');
		}
	}
else {
	$replication = TRUE;
	}
	
// find every bibid in the virtual library
$vl->delete_biblist();
$vl->make_biblist();

// rebuild the index solr instance
$vl->rebuild_solr_index($replication);

?>