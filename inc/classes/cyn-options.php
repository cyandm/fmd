<?php

if ( ! class_exists( 'cyn_options' ) ) {

	class cyn_options {

		function __construct() {
		}

		/** product terms **/
		public function cyn_getProductTerms( $parent = 0, $onlyId = false, $taxonomy = 'product-cat' ) {
			global $wpdb;
			$terms = [];

			if ( $parent === false ) {
				$termsID = $wpdb->get_col( "SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy='$taxonomy'" );
			} else {
				$termsID = $wpdb->get_col( "SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy='$taxonomy' AND parent='$parent'" );
			}

			foreach ( $termsID as $tId ) {
				if ( $onlyId === true ) {
					$terms[] = $tId;
				} else {
					$termAttr = $this->cyn_getTermAttr( $tId );
					$terms[ $termAttr['id'] ] = $termAttr;
				}
			}

			return $terms;
		}

		public function cyn_getTermAttr( $termID ) {
			$termsAttr = array();
			$wpTerm = get_term( $termID );
			$termUrl = get_term_link( $wpTerm );

			$termsAttr["id"] = $termID;
			$termsAttr["name"] = $wpTerm->name;
			$termsAttr["slug"] = $wpTerm->slug;
			$termsAttr["parent"] = $wpTerm->parent;
			$termsAttr["count"] = $wpTerm->count;
			$termsAttr["url"] = $termUrl;

			return $termsAttr;
		}
	}
}