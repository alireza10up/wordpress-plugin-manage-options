<?php

add_action('admin_menu', function () {
    add_menu_page(
        'Manage Options',
        'Manage Options',
        'manage_options',
        'manage-options',
        'render_manage_options_view',
        'dashicons-editor-table'
    );
});

function render_manage_options_view()
{
    # get all option

    global $wpdb;
    $options = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}options WHERE LENGTH(option_name) < 20 AND LENGTH(option_value) < 30");

    # load template
    mo_template('view', $options);
}