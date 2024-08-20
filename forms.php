<?php
// This file is part of Moodle - http://moodle.org/
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
 * Bulk user action forms
 *
 * @package    core
 * @copyright  Moodle
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir.'/formslib.php');
require_once($CFG->libdir.'/datalib.php');

/**
 * Bulk course action form
 *
 * @copyright  Moodle
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class export_student_action_form extends moodleform {

    /**
     * Returns an array of action_link's of all bulk actions available for this user.
     *
     * @return array of action_link objects
     */
    public function get_actions(): array {

        global $CFG;

        $syscontext = context_system::instance();
        $actions = [];
        // if (has_capability('moodle/course:update', $syscontext)) {
        //     $actions['enableguest'] = new action_link(
        //         new moodle_url('/admin/tool/course_guest/enable_guest.php'),
        //         get_string('enableguest', 'tool_export_student'));
        //     $actions['disableguest'] = new action_link(
        //         new moodle_url('/admin/tool/course_guest/disable_guest.php'),
        //         get_string('disableguest', 'tool_export_student'));
        // }
        // $moreactions = get_plugins_with_function('tool_export_student_actions', 'lib.php');
        // foreach ($moreactions as $plugintype => $plugins) {
        //     foreach ($plugins as $pluginfunction) {
        //         $actions += $pluginfunction();
        //     }
        // }

        return $actions;

    }

    /**
     * Form definition
     */
    public function definition() {
        global $CFG;

        $mform =& $this->_form;

        $actions = [0 => get_string('choose') . '...'];
        $bulkactions = $this->get_actions();
        foreach ($bulkactions as $key => $action) {
            $actions[$key] = $action->text;
        }
        $objs = array();
        $objs[] =& $mform->createElement('select', 'action', null, $actions);
        $objs[] =& $mform->createElement('submit', 'doaction', get_string('go'));
        $mform->addElement('group', 'actionsgrp', get_string('withselectedcourses', 'tool_export_student'), $objs, ' ', false);
    }
}
