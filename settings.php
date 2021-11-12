<?php
defined('MOODLE_INTERNAL') || die();

global $ADMIN;

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_helloworld', get_string('pluginname', 'local_helloworld'));
    $settings->add(
        new admin_setting_configcheckbox('local_helloworld/showinflatnavigation',
        get_string('use_flatnavigation_title', 'local_helloworld'),
        get_string('use_flatnavigation_description', 'local_helloworld'),
        true));
    $ADMIN->add('localplugins', $settings);
}