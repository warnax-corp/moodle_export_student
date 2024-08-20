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

defined('MOODLE_INTERNAL') || die();

$plugin->release = '0.0.1';
$plugin->version   = 2024011601; // The current plugin version (Date: YYYYMMDDXX).
$plugin->requires  = 2022111800; // Requires this Moodle version.
$plugin->component = 'tool_export_student'; // Full name of the plugin (used for diagnostics).
