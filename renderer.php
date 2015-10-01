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
 * This file contains the renderers for the boleto enrol plugin.
 *
 * @copyright 2015 Daniel Neis
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package local_agenda
 */

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');
}

/**
 * The primary renderer for enrol_boleto.
 */
class enrol_boleto_renderer extends plugin_renderer_base {

    public function list_boletos($boletos, $course) {

        $boletourl = new moodle_url('/enrol/boleto/boleto.php');

        $content = html_writer::tag('h2',get_string('viewboleto', 'enrol_boleto'));
        
        $content .= html_writer::tag('p', get_string('viewandprintinfo', 'enrol_boleto'));

        if (count($boletos) > 1) {
            foreach ($boletos as $boleto) {
                $boletourl->param('id', $boleto->id);
                $content .= html_writer::tag('p', get_string('boletoprintandpayinfoparceladolink'.$boleto->parcela,
                                                      'enrol_boleto', $boletourl->out(false)));
            }
        } else {
            $boleto = array_pop($boletos);
            $boletourl->param('id', $boleto->id);
            $content .= html_writer::tag('p', get_string('boletoprintandpayinfodirectlink',
                                                  'enrol_boleto', $boletourl->out(false)));
        }

        return $content;
    }
}
