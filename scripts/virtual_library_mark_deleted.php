<?php
/**
 * virtual_library_mark_deleted.php - mark the deleted resources as such
 * (run from the command line)
 */
include_once "VL_PhysicalSciences.php";

$vl = new VL_PhysicalSciences();

// look for the -production argument to rebuild the production version
if (isset($argv[1]) && ($argv[1] == 'production')) {
	$vl->use_production_plop(TRUE);
	}

$vl->find_and_mark_deleted();

?>