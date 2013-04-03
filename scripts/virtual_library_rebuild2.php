<?php
/**
 * virtual_library_rebuild2.php - recreate psl virtual library
 * (run from the command line)
 * php virtual_library_rebuild2.php test no-replication no-list-rebuild
 * or
 * php virtual_library_rebuild2.php production
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
$replication = TRUE;
if (isset($argv[2])) {
	if ($argv[2] == 'no-replication') {
		$replication = FALSE;
		}
	}

// look for a 'no-list-rebuild' argument to skip this step
$rebuild = TRUE;
if (isset($argv[3])) {
	if ($argv[3] == 'no-list-rebuild') {
		$rebuild = FALSE;
	}
}

if ($rebuild) {
	// find every bibid in the virtual library
	$vl->delete_biblist();
	$vl->make_biblist();
}

// rebuild the index solr instance
$vl->rebuild_solr_index($replication);

?>
