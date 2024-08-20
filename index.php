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
 * Export Student
 *
 * @package    tool_export_student
 * @copyright  2024 WARNAX Corp <kosuke@warnax.co.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once(__DIR__ . '/lib.php');
require_once(__DIR__ . '/forms.php');

admin_externalpage_setup('tool_export_student');

if (!isset($SESSION->bulk_courses)) {
    $SESSION->bulk_courses = array();
}
// Create the bulk operations form.
$actionform = new export_student_action_form();
if ($data = $actionform->get_data()) {
    // Check if an action should be performed and do so.
    // $bulkactions = $actionform->get_actions();
    // if (array_key_exists($data->action, $bulkactions)) {
    //     redirect($bulkactions[$data->action]->url);
    // }
}

echo $OUTPUT->header();

$actionform->display();

echo $OUTPUT->footer();
