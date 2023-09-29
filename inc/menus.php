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
    # preparing
    global $wpdb;

    # when user want to add
    if (isset($_GET['action']) && $_GET['action'] == 'add') {
        if (isset($_POST['option_save'])) {
            # save option save
            add_option(
                sanitize_text_field($_POST['option_name'] ?? ''),
                sanitize_text_field($_POST['option_value'] ?? ''),
                autoload: isset($_POST['option_autoload']) ? true : false
            );
        }

        mo_template('add');
        return;
    }

    # delete
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && $_GET['id']) {
        $wpdb->delete("{$wpdb->prefix}options", ['option_id' => $_GET['id']]);
    }

    # get all option
    $options = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}options WHERE LENGTH(option_name) < 20 AND LENGTH(option_value) < 30");

    # load template
    mo_template('view', $options);
}