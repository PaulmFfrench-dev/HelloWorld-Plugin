<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
 
/**
 * Adds admin settings for the plugin.
 *
 * @package     local_helloworld
 * @category    admin
 * @copyright   2020 Your Name <email@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
defined('MOODLE_INTERNAL') || die();

global $DB;
if ($hassiteconfig) {
    $ADMIN->add('localplugins', new \admin_category('local_helloworld_settings', get_string('pluginname', 'local_helloworld')));
    $settingspage = new \admin_settingpage('managelocalhelloworld', get_string('manage', 'local_helloworld'));
 
    if ($ADMIN->fulltree) {
        $settingspage->add(new \admin_setting_configcheckbox(
            'local_helloworld/showinnavigation',
            get_string('showinnavigation', 'local_helloworld'),
            get_string('showinnavigation_desc', 'local_helloworld'),
            1
        ));
    }
    $ADMIN->add('localplugins', $settingspage);
}


?>