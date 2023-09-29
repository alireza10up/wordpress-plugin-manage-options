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
            # save option
            $wpdb->insert(
                "{$wpdb->prefix}options",
                [
                    "option_name" => sanitize_text_field($_POST['option_name'] ?? ''),
                    "option_value" => sanitize_text_field($_POST['option_value'] ?? ''),
                    "autoload" => isset($_POST['option_autoload']) ? true : false
                ]
            );
        }

        mo_template('add');
        return;
    }

    # delete
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && $_GET['id']) {
        $wpdb->delete("{$wpdb->prefix}options", ['option_id' => $_GET['id']]);
    }

    # update
    if (isset($_GET['action']) && $_GET['action'] == 'edit' && $_GET['id']) {
        # update option
        if (isset($_POST['option_update'])) {
            $wpdb->update(
                "{$wpdb->prefix}options",
                [
                    "option_name" => sanitize_text_field($_POST['option_name'] ?? ''),
                    "option_value" => sanitize_text_field($_POST['option_value'] ?? ''),
                    "autoload" => isset($_POST['option_autoload']) ? true : false
                ],
                ['option_id' => $_GET['id']],
            );
        }

        $option = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}options WHERE option_id = %d", [intval($_GET['id'])]));

        mo_template('edit', $option);
        return;
    }

    # get all option
    $options = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}options WHERE LENGTH(option_name) < 20 AND LENGTH(option_value) < 30");

    # load template
    mo_template('view', $options);
}