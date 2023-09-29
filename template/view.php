<div class="wrap">
    <table class="widefat">
        <tr>
            <th>
                <a class="button" href="<?= add_query_arg(['action' => 'add']) ?>">Add New</a>
            </th>
            <th>
                <span class="notice notice-error">The request is restricted !</span>
            </th>
        </tr>
    </table>
    <table class="widefat">
        <thead>
            <tr>
                <th>id</th>
                <th>key</th>
                <th>value</th>
                <th>autoload</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($arg as $option):
                ?>
                <tr>
                    <td>
                        <?= $option->option_id ?? '' ?>
                    </td>
                    <td>
                        <?= $option->option_name ?? '' ?>
                    </td>
                    <td>
                        <?= $option->option_value ?? '' ?>
                    </td>
                    <td>
                        <?= $option->autoload ?? '' ?>
                    </td>
                    <td>
                        <a class="button"
                            href="<?= add_query_arg(['action' => 'delete', 'id' => $option->option_id]) ?>">Delete</a>
                        <a class="button"
                            href="<?= add_query_arg(['action' => 'edit', 'id' => $option->option_id]) ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>