<?php
/**
* script for bulk course guest disable operations
*/

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir.'/adminlib.php');

$confirm = optional_param('confirm', 0, PARAM_BOOL);

admin_externalpage_setup('tool_export_student');
require_capability('moodle/course:update', context_system::instance());

$return = new moodle_url('index.php');

if (empty($SESSION->bulk_courses)) {
    redirect($return);
}

$PAGE->set_primary_active_tab('siteadminnode');
$PAGE->set_secondary_active_tab('courses');

echo $OUTPUT->header();

if ($confirm and confirm_sesskey()) {
    list($in, $params) = $DB->get_in_or_equal($SESSION->bulk_courses);
    $rs = $DB->get_recordset_select('course', "id $in", $params, '', 'id, fullname');
    foreach ($rs as $course) {
        $enrol = $DB->get_record('enrol', ['courseid' => $course->id, 'enrol' => 'guest']);
        $enrol->status = 1; // ゲスト公開を無効化
        $DB->update_record('enrol', $enrol);
    }
    $rs->close();
    echo $OUTPUT->box_start('generalbox', 'notice');
    echo $OUTPUT->notification(get_string('changessaved'), 'notifysuccess');
    $continue = new single_button(new moodle_url($return), get_string('continue'), 'post');
    echo $OUTPUT->render($continue);
    echo $OUTPUT->box_end();
} else {
    list($in, $params) = $DB->get_in_or_equal($SESSION->bulk_courses);
    $courselist = $DB->get_records_select_menu('course', "id $in", $params, 'fullname', 'id,fullname');
    $coursenames = implode(', ', $courselist);
    echo $OUTPUT->heading(get_string('confirmation', 'admin'));
    $formcontinue = new single_button(new moodle_url('disable_guest.php', array('confirm' => 1)), get_string('yes'));
    $formcancel = new single_button(new moodle_url('index.php'), get_string('no'), 'get');
    echo $OUTPUT->confirm(get_string('confirmdisableguest', 'tool_export_student', $coursenames), $formcontinue, $formcancel);
}

echo $OUTPUT->footer();
