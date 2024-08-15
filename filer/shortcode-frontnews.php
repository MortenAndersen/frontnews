<?php
add_shortcode('frontnews', 'front_news');
function front_news($atts) {

	global $post;
	ob_start();

	extract(shortcode_atts(
		array(

		),
		$atts));

// ----------------------------------------------------
if (have_rows('nyhed', 'option')):
		echo '<div class="frontnews">';
		while (have_rows('nyhed', 'option')): the_row();

    // ACF

			$sub_overskrift = get_sub_field('overskrift');
			$sub_tekst = get_sub_field('brodtekst');
			$images = get_sub_field('billeder');
      $file = get_sub_field('fil');
    
      // ACF end

      echo '<div class="frontnews-item">';
        if ($sub_overskrift) {
          echo '<h3>' . $sub_overskrift . '</h3>';
        }

        if ($sub_tekst) {
          echo '<div class="frontnews-item_body">' . $sub_tekst . '</div>';
        }
       
        if( $file && $file['title'] ) {
          echo '<a href="' . $file['url'] . '" class="frontnews-file" target="_blank">' . $file['title'] . '</a>';
        }
        if( $file && !$file['title'] ) {
          echo '<a href="' . $file['url'] . '" class="frontnews-file" target="_blank">' . $file['filename'] . '</a>';
        }
 
        // Gallery
        if( $images ): 
          echo '<div class="frontnews-item_pic">';
            foreach( $images as $image ): 
              echo '<a href="' . esc_url($image['url']) . '" class="lightbox-link">';
                echo '<img src="' . esc_url($image['sizes']['thumbnail']). '" alt="' . esc_attr($image['alt']) . '" width="' . $image['sizes']["thumbnail-width"] . '" height="' . $image['sizes']["thumbnail-height"] . '">';
              echo '</a>';
            endforeach; 
          echo '</div>';
        endif;
        // END Gallery
      echo '</div>';

		endwhile;
		echo '</div>';
  endif;

// -------------------------------------------

	$myvariable = ob_get_clean();
	return $myvariable;
}