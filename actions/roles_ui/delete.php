<?php

$guid = get_input('guid');
$role = get_entity($guid);

if (!$role instanceof ElggRole || $role->isReservedRole() || !$role->canDelete()) {
	return elgg_error_response(elgg_echo('actionunauthorized'));
}

if ($role->delete()) {
	return elgg_ok_response('', elgg_echo('roles_ui:delete:success'), REFERRER);
} else {
	return elgg_error_response(elgg_echo('roles_ui:delete:error'));
}