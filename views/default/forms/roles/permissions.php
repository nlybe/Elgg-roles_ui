<?php

namespace Elgg\Roles\UI;

$role = elgg_extract('entity', $vars);
/* $var $role \ElggRole */

elgg_require_js('roles/ui/admin');
elgg_load_css('roles.ui.admin');

$permission_types = array('actions', 'events', 'hooks', 'menus', 'views', 'pages');

$perms = $role->getPermissions();

echo '<ul class="roles-ui-permissions">';
foreach ($permission_types as $ptype) {
	$aggregated_perms = roles_get_role_permissions($role, $ptype);

	if (is_array($aggregated_perms)) {
		foreach ($aggregated_perms as $pname => $pdetails) {
			if (!$pdetails) {
				continue;
			}
			echo '<li>' . elgg_view("forms/roles/permissions/$ptype", array(
				'name' => $pname,
				'details' => $pdetails,
				'actionable' => (is_array($perms[$ptype]) && array_key_exists($pname, $perms[$ptype]))
			)) . '</li>';
		}
	}
}
echo '</ul>';

echo '<div class="roles-ui-forms">';
foreach ($permission_types as $ptype) {
	echo elgg_view("forms/roles/templates/$ptype");
}
echo '</div>';


echo '<div class="elgg-foot">';

echo elgg_view_field([
	'#type' => 'hidden',
	'name' => 'guid',
	'value' => $role->guid
]);

echo '<div class="roles-ui-buttonbank clearfix">';
foreach ($permission_types as $ptype) {
	echo elgg_view('output/url', array(
		'class' => 'elgg-button elgg-button-action roles-ui-add-permission-button',
		'text' => elgg_echo("roles_ui:add:$ptype"),
		'rel' => $ptype
	));
}
echo elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('save'),
	'class' => 'elgg-button elgg-button-submit float-alt'
]);
echo '</div>';

echo '</div>';
