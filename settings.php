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
 * Self enrolment plugin settings and presets.
 *
 * @package    enrol_boleto
 * @copyright  2010 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    $settings->add(new admin_setting_heading('enrol_boleto_settings', get_string('boletosettings', 'enrol_boleto'), '', 'admin'));

    $settings->add(new admin_setting_configcheckbox('enrol_boleto/waitforpayment',
        get_string('waitforpayment', 'enrol_boleto'), get_string('waitforpayment_help', 'enrol_boleto'), 0, PARAM_INT));

    $settings->add(new admin_setting_configtext('enrol_boleto/cedente',
        get_string('cedente', 'enrol_boleto'), get_string('cedente_help', 'enrol_boleto'), 0, PARAM_INT));

    $settings->add(new admin_setting_configtext('enrol_boleto/cedentedv',
        get_string('cedentedv', 'enrol_boleto'), get_string('cedentedv_help', 'enrol_boleto'), 0, PARAM_INT));

    // Até 4 dígitos.
    $settings->add(new admin_setting_configtext('enrol_boleto/agencia',
        get_string('agencia', 'enrol_boleto'), get_string('agencia_help', 'enrol_boleto'), 0, PARAM_INT));

    $settings->add(new admin_setting_configtext('enrol_boleto/carteira',
        get_string('carteira', 'enrol_boleto'), get_string('carteira_help', 'enrol_boleto'), 0, PARAM_INT));

    $settings->add(new admin_setting_configtext('enrol_boleto/carteiradv',
        get_string('carteiradv', 'enrol_boleto'), get_string('carteiradv_help', 'enrol_boleto'), 0, PARAM_INT));

    $settings->add(new admin_setting_configtext('enrol_boleto/conta',
        get_string('conta', 'enrol_boleto'), get_string('conta_help', 'enrol_boleto'), 0, PARAM_INT));

    $settings->add(new admin_setting_configtext('enrol_boleto/contadv',
        get_string('contadv', 'enrol_boleto'), get_string('contadv_help', 'enrol_boleto'), 0, PARAM_INT));

    $settings->add(new admin_setting_configtext('enrol_boleto/nossonumero',
        get_string('nossonumero', 'enrol_boleto'), get_string('nossonumero_help', 'enrol_boleto'), 0, PARAM_INT));

    $settings->add(new admin_setting_configtext('enrol_boleto/razaosocial',
        get_string('razaosocial', 'enrol_boleto'), get_string('razaosocial_help', 'enrol_boleto'), '', PARAM_TEXT));

    $settings->add(new admin_setting_configtext('enrol_boleto/nomefantasia',
        get_string('nomefantasia', 'enrol_boleto'), get_string('nomefantasia_help', 'enrol_boleto'), 0, PARAM_TEXT));

    $settings->add(new admin_setting_configtext('enrol_boleto/cnpj',
        get_string('cnpj', 'enrol_boleto'), get_string('cnpj_help', 'enrol_boleto'), '', PARAM_TEXT));

    $settings->add(new admin_setting_configtext('enrol_boleto/cidade',
        get_string('cidade', 'enrol_boleto'), get_string('cidade_help', 'enrol_boleto'), '', PARAM_TEXT));

    $settings->add(new admin_setting_configtext('enrol_boleto/endereco',
        get_string('endereco', 'enrol_boleto'), get_string('endereco_help', 'enrol_boleto'), '', PARAM_TEXT));

    //--- general settings -----------------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('enrol_settings',
    get_string('enrolsettings', 'enrol_boleto'), get_string('enrolsettings', 'enrol_boleto'), 'admin'));

    $settings->add(new admin_setting_configcheckbox('enrol_boleto/requirepassword',
        get_string('requirepassword', 'enrol_boleto'), get_string('requirepassword_desc', 'enrol_boleto'), 0));

    $settings->add(new admin_setting_configcheckbox('enrol_boleto/usepasswordpolicy',
        get_string('usepasswordpolicy', 'enrol_boleto'), get_string('usepasswordpolicy_desc', 'enrol_boleto'), 0));

    $settings->add(new admin_setting_configcheckbox('enrol_boleto/showhint',
        get_string('showhint', 'enrol_boleto'), get_string('showhint_desc', 'enrol_boleto'), 0));

    // Note: let's reuse the ext sync constants and strings here, internally it is very similar,
    //       it describes what should happend when users are not supposed to be enerolled any more.
    $options = array(
        ENROL_EXT_REMOVED_KEEP           => get_string('extremovedkeep', 'enrol'),
        ENROL_EXT_REMOVED_SUSPENDNOROLES => get_string('extremovedsuspendnoroles', 'enrol'),
        ENROL_EXT_REMOVED_UNENROL        => get_string('extremovedunenrol', 'enrol'),
    );
    $settings->add(new admin_setting_configselect('enrol_boleto/expiredaction', get_string('expiredaction', 'enrol_boleto'), get_string('expiredaction_help', 'enrol_boleto'), ENROL_EXT_REMOVED_KEEP, $options));

    $options = array();
    for ($i=0; $i<24; $i++) {
        $options[$i] = $i;
    }
    $settings->add(new admin_setting_configselect('enrol_boleto/expirynotifyhour', get_string('expirynotifyhour', 'core_enrol'), '', 6, $options));

    //--- enrol instance defaults ----------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('enrol_boleto_defaults',
        get_string('enrolinstancedefaults', 'admin'), get_string('enrolinstancedefaults_desc', 'admin')));

    $settings->add(new admin_setting_configcheckbox('enrol_boleto/defaultenrol',
        get_string('defaultenrol', 'enrol'), get_string('defaultenrol_desc', 'enrol'), 1));

    $options = array(ENROL_INSTANCE_ENABLED  => get_string('yes'),
                     ENROL_INSTANCE_DISABLED => get_string('no'));
    $settings->add(new admin_setting_configselect('enrol_boleto/status',
        get_string('status', 'enrol_boleto'), get_string('status_desc', 'enrol_boleto'), ENROL_INSTANCE_DISABLED, $options));

    $options = array(1  => get_string('yes'), 0 => get_string('no'));
    $settings->add(new admin_setting_configselect('enrol_boleto/boletos',
        get_string('boletos', 'enrol_boleto'), get_string('boletos_desc', 'enrol_boleto'), 1, $options));

    $options = array(1  => get_string('yes'),
                     0 => get_string('no'));
    $settings->add(new admin_setting_configselect('enrol_boleto/groupkey',
        get_string('groupkey', 'enrol_boleto'), get_string('groupkey_desc', 'enrol_boleto'), 0, $options));

    if (!during_initial_install()) {
        $options = get_default_enrol_roles(context_system::instance());
        $student = get_archetype_roles('student');
        $student = reset($student);
        $settings->add(new admin_setting_configselect('enrol_boleto/roleid',
            get_string('defaultrole', 'enrol_boleto'), get_string('defaultrole_desc', 'enrol_boleto'), $student->id, $options));
    }

    $settings->add(new admin_setting_configduration('enrol_boleto/enrolperiod',
        get_string('enrolperiod', 'enrol_boleto'), get_string('enrolperiod_desc', 'enrol_boleto'), 0));

    $options = array(0 => get_string('no'), 1 => get_string('expirynotifyenroller', 'core_enrol'), 2 => get_string('expirynotifyall', 'core_enrol'));
    $settings->add(new admin_setting_configselect('enrol_boleto/expirynotify',
        get_string('expirynotify', 'core_enrol'), get_string('expirynotify_help', 'core_enrol'), 0, $options));

    $settings->add(new admin_setting_configduration('enrol_boleto/expirythreshold',
        get_string('expirythreshold', 'core_enrol'), get_string('expirythreshold_help', 'core_enrol'), 86400, 86400));

    $options = array(0 => get_string('never'),
                     1800 * 3600 * 24 => get_string('numdays', '', 1800),
                     1000 * 3600 * 24 => get_string('numdays', '', 1000),
                     365 * 3600 * 24 => get_string('numdays', '', 365),
                     180 * 3600 * 24 => get_string('numdays', '', 180),
                     150 * 3600 * 24 => get_string('numdays', '', 150),
                     120 * 3600 * 24 => get_string('numdays', '', 120),
                     90 * 3600 * 24 => get_string('numdays', '', 90),
                     60 * 3600 * 24 => get_string('numdays', '', 60),
                     30 * 3600 * 24 => get_string('numdays', '', 30),
                     21 * 3600 * 24 => get_string('numdays', '', 21),
                     14 * 3600 * 24 => get_string('numdays', '', 14),
                     7 * 3600 * 24 => get_string('numdays', '', 7));
    $settings->add(new admin_setting_configselect('enrol_boleto/longtimenosee',
        get_string('longtimenosee', 'enrol_boleto'), get_string('longtimenosee_help', 'enrol_boleto'), 0, $options));

    $settings->add(new admin_setting_configtext('enrol_boleto/maxenrolled',
        get_string('maxenrolled', 'enrol_boleto'), get_string('maxenrolled_help', 'enrol_boleto'), 0, PARAM_INT));

    $settings->add(new admin_setting_configcheckbox('enrol_boleto/sendcoursewelcomemessage',
        get_string('sendcoursewelcomemessage', 'enrol_boleto'), get_string('sendcoursewelcomemessage_help', 'enrol_boleto'), 1));
}
