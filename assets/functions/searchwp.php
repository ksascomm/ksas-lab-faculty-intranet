<?php // Automatically convert permalinks to PDFs in search results to the PDF itself, not the Attachment page
function my_force_direct_pdf_links( $permalink ){
	global $post;
	if ( is_search() && 'attachment' === get_post_type( $post ) ) {
		// if the result is a PDF, link directly to the file not the attachment page
		$permalink = wp_get_attachment_url( $post->ID );
	}
	return esc_url( $permalink );
}
add_filter( 'the_permalink', 'my_force_direct_pdf_links' );
add_filter( 'attachment_link', 'my_force_direct_pdf_links' );


function maybe_append_searchwp_pdf_excerpt( $excerpt ) {

	global $post;

	$pdf_excerpt_length = 15;	// number of words in PDF excerpt

	if ( is_search() && ! post_password_required() ) {

		// prep our 'environment'

		// set up common words
		$common_words = array();
		if ( class_exists( 'SearchWP' ) ) {
			$searchwp = SearchWP::instance();
			$common_words = $searchwp->common;
		}

		// grab the terms
		$terms = explode( ' ', get_search_query() );
		$terms = array_map( 'sanitize_text_field', $terms );

		// if we're on a search page, we want to check to see if the current result
		// has a PDF with any of the search terms in the content

		// first we need to backtrack and find all of the PDFs that are attached to this post
		// since their weight has been attributed to this post

		$attached_pdfs = get_attached_media( 'application/pdf', $post->ID );

		foreach ( $attached_pdfs as $attached_pdf ) {

			// check to make sure there is file content to scan
			if ( $pdf_content = get_post_meta( $attached_pdf->ID, 'searchwp_content', true ) ) {

				// find the first applicable search term (based on character length)
				$flag = false;
				foreach ( $terms as $termkey => $term ) {
					if ( ! in_array( $term, $common_words ) && absint( apply_filters( 'searchwp_minimum_word_length', 3 ) ) <= strlen( $term ) ) {
						$flag = $term;
						break;
					}
				}

				// our haystack is the PDF content
				$haystack = explode( ' ', $pdf_content );

				$pdf_excerpt = '';

				// build our contextual excerpt
				foreach ( $haystack as $haystack_key => $haystack_term ) {
					preg_match( "/\b$flag\b(?!([^<]+)?>)/i", $haystack_term, $matches );
					if ( count( $matches ) ) {

						// our buffer is going to be 1/3 the total number of words in hopes of snagging one or two more
						// highlighted terms in the second and third thirds
						$buffer = floor( ( $pdf_excerpt_length - 1 ) / 3 ); // -1 to accommodate the search term itself

						// find the start point
						$start = 0;
						$underflow = 0;
						if ( $haystack_key < $buffer ) {
							// the match occurred too early to get a proper first buffer
							$underflow = $buffer - $haystack_key;
						} else {
							// there is enough room to grab a proper first buffer
							$start = $haystack_key - $buffer;
						}

						// find the end point
						$end = count( $haystack );
						if ( $end > ( $haystack_key + ( $buffer * 2 ) ) ) {
							$end = $haystack_key + ( $buffer * 2 );
						}

						// if we had an underflow (e.g. the first buffer wasn't fully included) grab more at the end
						$end += $underflow;

						$pdf_excerpt = array_slice( $haystack, $start, $end - $start );
						$pdf_excerpt = implode( ' ', $pdf_excerpt );

						break;
					}
				}

				// append our PDF-specific excerpt to the main excerpt
				if ( ! empty( $pdf_excerpt ) ) {
					$pdf_label = get_the_title( $attached_pdf->ID ); // the PDF label will be the title of the PDF post
					$excerpt .= '<br /><br /><strong>' . $pdf_label . '</strong>: ' . $pdf_excerpt;
				}

			}

		}
	}
	return $excerpt;
}

add_filter( 'get_the_excerpt', 'maybe_append_searchwp_pdf_excerpt' );


function searchwp_term_highlight_auto_excerpt( $excerpt ) {
	global $post;
	if ( ! function_exists( 'searchwp_term_highlight_get_the_excerpt_global' ) || ! is_search() || 'attachment' !== get_post_type( $post ) ) {
		return $excerpt;
	}
	// prevent recursion
	remove_filter( 'get_the_excerpt', 'searchwp_term_highlight_auto_excerpt' );
	$global_excerpt = searchwp_term_highlight_get_the_excerpt_global( $post->ID, null, get_search_query() );
	add_filter( 'get_the_excerpt', 'searchwp_term_highlight_auto_excerpt' );
	return $global_excerpt;
}
add_filter( 'get_the_excerpt', 'searchwp_term_highlight_auto_excerpt' );