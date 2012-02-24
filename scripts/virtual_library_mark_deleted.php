<?php
/**
 * virtual_library_mark_deleted.php - mark the deleted resources as such
 * (run from the command line)
 */
include_once "VL_PhysicalSciences.php";

$vl = new VL_PhysicalSciences();
$vl->find_and_mark_deleted();

?>