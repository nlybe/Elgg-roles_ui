<?php

namespace Elgg\Roles\UI;

echo elgg_list_entities([
	'types' => 'object',
	'subtypes' => 'role',
	'limit' => 0,
	'no_results' => elgg_echo('roles_ui:no_roles'),
]);

