<?php
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Nyheder på forsiden',
        'menu_title'    => 'Nyheder',
        'menu_slug'     => 'frontnews',
        'capability'    => 'edit_posts',
        //'redirect'      => false
    ));


    acf_add_options_sub_page(array(
        'page_title'    => 'Nyheder på forsiden',
        'menu_title'    => 'Nyheder',
        'parent_slug'   => 'frontnews',
    ));
    
}
