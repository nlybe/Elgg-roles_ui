<?php

/**
 * Change user role
 */

namespace Elgg\Roles\UI;

$guid = get_input('guid');
$role_name = get_input('role');

# Alter to DEFAULT_ROLE if 'No specific role' is selected on change role form
if ($role_name == NO_ROLE) {
	$role_name = DEFAULT_ROLE;
}

$user = get_entity($guid);
$role = roles_get_role_by_name($role_name);

if (!elgg_is_admin_logged_in()) {
	return elgg_error_response(elgg_echo('roles_ui:set:error:admin_gatekeeper'));
}

if (!elgg_instanceof($user, 'user')) {
	return elgg_error_response(elgg_echo('roles_ui:set:error:no_user'));
}


if (!elgg_instanceof($role, 'object', 'role')) {
	return elgg_error_response(elgg_echo('roles_ui:set:error:no_role'));
}

$current_role = roles_get_role($user);

if ($role->guid == $current_role->guid) {
	return elgg_error_response(elgg_echo('roles_ui:set:error:equivalent_role'));
}

if (roles_set_role($role, $user)) {
	if (elgg_is_xhr()) {
		$output = array(
			'user' => array(
				'guid' => $user->guid,
				'name' => $user->name,
			),
			'role' => array(
				'guid' => $role->guid,
				'name' => $role->name,
				'title' => $role->getDisplayName(),
			)
		);

		print(json_encode($output));
	}
	elgg_ok_response('', elgg_echo('roles_ui:set:success'), REFERRER);
} else {
	return elgg_error_response(elgg_echo('roles_ui:set:error:unknown'));
}

forward(REFERER);

