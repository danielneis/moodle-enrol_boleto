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
 * This files edits course details
 *
 * @copyright 2015 Daniel Neis
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');

$enrolinstanceid = required_param('enrolinstanceid', PARAM_INT);
$courseid = required_param('courseid', PARAM_INT);

require_login($courseid);

$course = get_course($courseid);

$url = new moodle_url('/enrol/boleto/view.php');

if (!$enrol = $DB->get_record('enrol', array('id' => $enrolinstanceid))) {
    throw new invalid_parameter_exception('invalid enrol informed');
}
if (!$preenrol = $DB->get_record('local_agenda_preenrols', array('enrolinstanceid' => $enrolinstanceid))) {
    print_error('preenrolnotfound');
}
if ($preenrol->userid != $USER->id) {
    require_capability('local/agenda:viewallpreenrols', context_system::instance());
}
if (!$boletos = $DB->get_records('enrol_boleto', array('enrolid' => $enrolinstanceid))) {
    throw new moodle_exception('no boletos found');
}
$url->param('enrolinstanceid', $enrolinstanceid);
$url->param('courseid', $courseid);

$PAGE->set_url($url);
$PAGE->set_pagelayout('incourse');

$PAGE->set_title($course->fullname. ' : ' . get_string('viewboleto', 'enrol_boleto'));
$PAGE->set_heading($course->fullname);

$renderer = $PAGE->get_renderer('enrol_boleto');

echo $OUTPUT->header(),
     $renderer->list_boletos($boletos, $course),
     $OUTPUT->footer();
