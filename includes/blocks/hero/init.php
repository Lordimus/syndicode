<?php

function add_blocks_categories ($categories, $post){
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'blocks',
                'title' => __( 'Custom blocks' ),
                'icon'  => 'admin-generic',
            ),
        )
    );
}
add_filter( 'block_categories', 'add_blocks_categories', 10, 2 );

function register_acf_block_types() {

    $fields = require_once __DIR__ . '/fields.php';
    acf_add_local_field_group($fields);

    acf_register_block_type(array(
        'name'              => 'hero',
        'title'             => __('Hero'),
        'description'       => __('Hero custom block'),
        'render_template'   => 'template-parts/blocks/block-hero.php',
        'category'          => 'blocks',
        'icon'              => 'welcome-widgets-menus',
        'keywords'          => array( 'hero', 'blocks' ),
    ));

}
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}