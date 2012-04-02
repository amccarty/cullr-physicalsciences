<?php
/**
 * VL_PhysicalSciences.php - PSL subclass of VirtualLibrary
 */
 
include_once "/cullr/common/libphp/VirtualLibrary.php";

class VL_PhysicalSciences extends VirtualLibrary {
	function __construct() {
		parent::__construct();

		// initial value supplied by curator, updated by curator
		$this->attribute_fields = array(
			'cullr_resource_discipline_weight' => 'Discipline',
			//'culweight' => 'Discipline Weight', build using copyfield so no need to list
			'cullr_resource_sub_type' => 'Sub-Resource Type',
			'cullr_vl_annotation_author' => 'Annotation Author',
			'cullr_vl_annotation' => 'Annotation',
			'cullr_vl_keywords' => 'Free Text Keywords',
			'cullr_vl_latest_update' => 'Latest Update',
			'cullr_vl_suppress' => 'Suppress Record',
			'cullr_featured_resource_b' => 'Featured Resource',
			'cullr_vli_internal_note_author' => 'Internal Note Author',
			'cullr_vli_internal_note_date' => 'Internal Note Date',
			'cullr_vli_internal_note' => 'Internal Note',
			);
			
		/* engineering library */
		$this->library_name = 'physicalsciences';
		$this->library_search_url = "http://raksha02.library.cornell.edu:8901/solr/select?";
		$this->destination_path = '/cullr/instances/physicalsciences/solr_add/bibids/';
		$this->source_path = '/cullr/instances/physicalsciences/cullr_physicalsciences/lists/';
		$this->bibid_source_file = 'psl-bibid-list.txt';
		$this->callno_source_file = 'psl-call-number-list.txt';
		$this->package_source_file = 'psl-package-list.txt';
					
		$this->full_biblist_bibids_file = 'full_biblist.txt';	
		$this->full_biblist_bibid_sources_file = 'full_biblist_sources.txt';
		
		$this->latest_update_file = 'psl-latest-update.txt';
		}
}

?>