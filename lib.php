<?php

// if (!defined('MAX_BULK_COURSES')) {
//     define('MAX_BULK_COURSES', 2000);
// }

// function add_selection_all_courses() {
//     global $SESSION, $DB, $CFG;

//     $sqlwhere = "format = 'topics'";
//     $params = [];

//     $rs = $DB->get_recordset_select('course', $sqlwhere, $params, 'fullname', 'id,fullname');
//     foreach ($rs as $user) {
//         if (!isset($SESSION->bulk_courses[$user->id])) {
//             $SESSION->bulk_courses[$user->id] = $user->id;
//         }
//     }
//     $rs->close();
// }

// function get_selection_data_courses() {
//     global $SESSION, $DB, $CFG;

//     $sqlwhere = "format = 'topics'";
//     $params = [];

//     $total = $DB->count_records_select('course', $sqlwhere, $params);
//     $acount = $DB->count_records_select('course', $sqlwhere, $params);
//     $scount = count($SESSION->bulk_courses);

//     $userlist = array('acount'=>$acount, 'scount'=>$scount, 'ausers'=>false, 'susers'=>false, 'total'=>$total);
//     $userlist['ausers'] = $DB->get_records_select_menu('course', $sqlwhere, $params, 'fullname', 'id,fullname', 0, MAX_BULK_COURSES);

//     if ($scount) {
//         if ($scount < MAX_BULK_COURSES) {
//             $bulkusers = $SESSION->bulk_courses;
//         } else {
//             $bulkusers = array_slice($SESSION->bulk_courses, 0, MAX_BULK_COURSES, true);
//         }
//         list($in, $inparams) = $DB->get_in_or_equal($bulkusers);
//         $userlist['susers'] = $DB->get_records_select_menu('course', "id $in", $inparams, 'fullname', 'id,fullname');
//     }

//     return $userlist;
// }
