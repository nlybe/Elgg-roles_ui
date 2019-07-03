<?php
/**
 * Roles UI for Elgg
 * @package roles_ui
 */

$actions_path = __DIR__ . '/actions/roles_ui';

return [
    'entities' => [],
    'actions' => [
        'roles/edit' => [
            'access' => 'admin',
            'filename' => "{$actions_path}/edit.php",
        ],
        'roles/delete' => [
            'access' => 'admin',
            'filename' => "{$actions_path}/delete.php",
        ],
        'roles/permissions' => [
            'access' => 'admin',
            'filename' => "{$actions_path}/permissions.php",
        ],
        'roles/set' => [
            'access' => 'admin',
            'filename' => "{$actions_path}/set.php",
        ],
    ],
    'routes' => [],
    'widgets' => [],
    'views' => [],
    'upgrades' => [],
    'settings' => [],
];

