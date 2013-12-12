<?php
/**
 * VL_PhysicalSciences.php - PSL subclass of VirtualLibrary
 */

include_once "/cullr/common/libphp/VirtualLibrary2.php";

class VL_PhysicalSciences extends VirtualLibrary2 {
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
			'cullr_vl_alt_title' => 'Curator Alternative Title',
			'cullr_vl_alt_url' => 'Curator Alternative Resource URL',
			);

		// initial value supplied by svn/spreadsheet file, not otherwise updated
		$this->auxiliary_fields = array(
			'psl_journal_finder_i' => 'Include in Journal Finder',
			'psl_ebook_collection_i' => 'Include in eBook Collection',
			'psl_specialized_database_i' => 'Include in Specialized Databases',
			'psl_classic_text_i' => 'Include in Classic Texts',
			);

		// initial value supplied by PLOP, updated by curator via psl-additional-values.txt
		$this->plop_initialize_only_fields['norm_callno'] = 'Call Number Sort Ascending';
		$this->plop_initialize_only_fields['rev_norm_callno'] = 'Call Number Sort Descending';

		// these are actually edited by curators - need to be preserved - see export_curation
		$this->curation_fields = array(
			'cullr_vl_annotation_author' => 'Annotation Author',
			'cullr_vl_annotation' => 'Annotation',
			'cullr_vl_keywords' => 'Free Text Keywords',
			'cullr_vl_latest_update' => 'Latest Update',
			'cullr_vl_suppress' => 'Suppress Record',
			'cullr_featured_resource_b' => 'Featured Resource',
			'cullr_vli_internal_note_author' => 'Internal Note Author',
			'cullr_vli_internal_note_date' => 'Internal Note Date',
			'cullr_vli_internal_note' => 'Internal Note',
			'cullr_vl_alt_title' => 'Curator Alternative Title',
			'cullr_vl_alt_url' => 'Curator Alternative Resource URL',
			);

		/* physical sciences library */
		$this->library_name = 'physicalsciences';
		$this->library_search_url_production = "http://raksha02.library.cornell.edu:8901/solr/select?";
		$this->library_search_url_test = "http://raksha01.library.cornell.edu:8901/solr/select?";
		$this->destination_path = '/cullr/instances/physicalsciences/solr_add/bibids/';
		$this->source_path = '/cullr/instances/physicalsciences/cullr_physicalsciences/lists/';
		$this->bibid_source_file = 'psl-bibid-list.txt';
		$this->callno_source_file = 'psl-call-number-list.txt';
		$this->package_source_file = 'psl-package-list.txt';
		$this->extra_parameters_file = 'psl-additional-values.txt';

		$this->full_biblist_bibids_file = 'full_biblist.txt';
		$this->full_biblist_bibid_sources_file = 'full_biblist_sources.txt';

		$this->latest_update_file = 'psl-latest-update.txt';

		$this->library_indexing_url_production = "http://raksha02.library.cornell.edu:8951/solr/select?";
		$this->library_indexing_url_test = "http://raksha01.library.cornell.edu:8951/solr/select?";
		}

	/**
	 * make a comma delimited list of fields to preserve from the
	 * current curated virtual library
	 * override for PSL to account for a few fields that were in the
	 * wrong lists.
	 */
	public function list_curation_fields() {
		// which fields to return from virtual library
		$fields = array(
			'cullr_deleted_b',
			'cullr_resource_oa',
			'cullr_resource_toc_url',
			'cullr_vl_alt_title',
			'cullr_vl_alt_url',
			'cullr_vl_annotation',
			'cullr_vl_annotation_author',
			'cullr_vl_cover_image',
			'cullr_vl_suppress',
			'weight',
			);
		$attribute_field_list = array('fl' => implode(',', $fields));
		return $attribute_field_list;
	}


}

?>
