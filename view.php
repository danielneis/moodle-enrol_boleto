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

$instanceid = required_param('instanceid', PARAM_INT);
$courseid = required_param('courseid', PARAM_INT);

require_login(SITEID);

$course = get_course($courseid);

$enrols = enrol_get_plugins(true);
$enrolinstances = enrol_get_instances($course->id, true);
foreach($enrolinstances as $instance) {
    if ($instance->id == $instanceid) {
        break;
    }
}

$url = new moodle_url('/enrol/boleto/view.php');
$url->param('instanceid', $instanceid);


require_once($CFG->dirroot.'/enrol/locallib.php');
$manager = new course_enrolment_manager($PAGE, $course);
$enrols = $manager->get_user_enrolments($USER->id);
$alreadyenrolled = false;
foreach ($enrols as $e) {
    if ($e->enrolmentinstance->enrol == 'boleto') {
        $alreadyenrolled = true;
        break;
    }
}

$PAGE->set_url($url);
$PAGE->set_pagelayout('base');


if ($alreadyenrolled) {
        require_once($CFG->dirroot.'/course/lib.php');
        $PAGE->navbar->add($course->fullname . ' '.$course->idnumber, course_get_url($course));
        $PAGE->navbar->add('Boletos');
        $PAGE->set_title("{$course->fullname}: Boletos");
        $PAGE->set_heading($course->fullname . ' '.$course->idnumber);

        echo $OUTPUT->header();

        $boletourl = new moodle_url('/enrol/boleto/boleto.php', array('instanceid' => $instance->id));
        echo html_writer::tag('p', get_string('alreadyenrolledinfo', 'enrol_boleto'));
        // customint8 == avista.
        if ($instance->customint8) {
            echo html_writer::tag('p', get_string('boletoprintandpayinfodirectlinks', 'enrol_boleto', $boletourl->out(false)));
        } else {
            echo html_writer::tag('p', get_string('boletoprintandpayinfoparceladolink0', 'enrol_boleto', $boletourl->out(false)));

            $boletourl->param('parcela', 1);
            echo html_writer::tag('p', get_string('boletoprintandpayinfoparceladolink1', 'enrol_boleto', $boletourl->out(false)));

            $boletourl->param('parcela', 2);
            echo html_writer::tag('p', get_string('boletoprintandpayinfoparceladolink2', 'enrol_boleto', $boletourl->out(false)));
        }
} else {
    $PAGE->navbar->add('Inscrições');
    $PAGE->navbar->add($course->fullname . ' '.$course->idnumber, $url);
    $PAGE->set_title("{$course->fullname}: Inscrições");
    $PAGE->set_heading($course->fullname . ' '.$course->idnumber);
    echo $OUTPUT->header();
    $form = new enrol_boleto_enrol_form($CFG->wwwroot.'/enrol/index.php', $instance);
    $form->display();
}
echo $OUTPUT->footer();
