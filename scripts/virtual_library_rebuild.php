<?php
/**
 * virtual_library_rebuild.php - recreate psl virtual library
 * (run from the command line)
 */
include_once "VL_PhysicalSciences.php";

$vl = new VL_PhysicalSciences();

// look for the -production argument to rebuild the production version
if (isset($argv[1]) && ($argv[1] == 'production')) {
	$vl->use_production_plop(TRUE);
	}
	
// find every bibid in the virtual library
$vl->delete_biblist();
$vl->make_biblist();

// write a solr add record for each bibid
$vl->delete_solr_update_files();
$vl->make_solr_update_files();

?>