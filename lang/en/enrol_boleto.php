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
 * Strings for component 'enrol_boleto', language 'en'.
 *
 * @package    enrol_boleto
 * @copyright  2010 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['viewandprintinfo'] = 'Abaixo estão os boletos bancários que você deve pagar para permanecer inscrito.';
$string['avista'] = 'A vista';
$string['avista_help'] = 'Para pagamento parcelado (1+2) desmarque essa opção.';
$string['boletosettings'] = 'Configurações do boleto';
$string['boletoprintandpayinfo'] = 'Para se inscrever neste curso é necessário pagar um boleto bancário. Ao clicar no botão "Inscrever-me" abaixo, você será automaticamente inscrito no curso, mesmo não tendo pago o boleto. Caso você não pague o boleto até o dia do vencimento, sua inscrição no curso será suspensa. Após se inscrever, você poderá acessar novamente este boleto no link "Ver boletos" do menu "Administração do curso".<br/>Note que se você pagar o boleto e não clicar no botão abaixo, sua inscrição não será efetuada.';
$string['boletoprintandpayinfodirectlink'] = 'Você pode acessar este <a href="{$a}">link para ver e imprimir o boleto</a>.';
$string['boletoprintandpayinfoparceladolink0'] = '<a href="{$a}">Ver e imprimir o primeiro boleto, a ser pago a vista</a>.';
$string['boletoprintandpayinfoparceladolink1'] = '<a href="{$a}">Ver e imprimir o segundo boleto, a ser pago em até 30 dias</a>.';
$string['boletoprintandpayinfoparceladolink2'] = '<a href="{$a}">Ver e imprimir o terceiro boleto, a ser pago em até 60 dias</a>.';
$string['directavista'] = 'A vista no boleto';
$string['directparcelado'] = 'Parcelado no boleto';
$string['directpagseguro'] = 'PagSeguro';
$string['enrolsettings'] = 'Configurações de inscrição';
$string['vencimento'] = 'Vencimento';
$string['vencimento_help'] = 'Data de vencimento do boleto';
$string['valor'] = 'Valor';
$string['valor_help'] = 'Valor total do boleto.';
$string['sequencial'] = 'Sequencial';
$string['sequencial_help'] = 'Número sequencial para compor o Nosso Numero';
$string['cedente'] = 'Cedente';
$string['cedentedv'] = 'DV do Cedente';
$string['cedentedv_help'] = 'Dígito verificador do cedente';
$string['cedente_help'] = 'Conta do cedente, sem DV';
$string['enrolboletosettings'] = 'Configurações de inscrição';
$string['sacado'] = 'Sacado';
$string['sacado_help'] = '';
$string['agencia'] = 'Agência';
$string['agencia_help'] = 'Número da agência sem o DV';
$string['carteira'] = 'Carteira';
$string['carteiradv'] = 'DV da carteira';
$string['carteiradv_help'] = 'Dígito verificador da carteira';
$string['carteira_help'] = 'Número da carteira sem o DV';
$string['conta'] = 'Conta';
$string['contadv'] = 'DV da Conta';
$string['contadv_help'] = 'Dígito verificador da conta';
$string['conta_help'] = 'Número da conta sem o DV';
$string['nomefantasia'] = 'Nome fantasia';
$string['nomefantasia_help'] = 'Nome fantasia que por padrão será impresso no boleto.';
$string['razaosocial'] = 'Razão social';
$string['razaosocial_help'] = 'Razão social que por padrão será impressa no boleto.';
$string['cnpj'] = 'CNPJ';
$string['cnpj_help'] = 'CNPJ padrão que será impresso no boleto';
$string['cidade'] = 'Cidade';
$string['cidade_help'] = 'Cidade padrão que será impressa no boleto';
$string['endereco'] = 'Endereço';
$string['endereco_help'] = 'Endereço padrão que será impresso no boleto';
$string['nossonumero'] = 'Nosso número, sem o DV';
$string['nossonumero_help'] = 'Nosso número padrão, que será impresso no boleto, sem o DV';
$string['waitforpayment'] = 'Aguardar pagamento para inscrever';
$string['waitforpayment_help'] = 'Se essa opção for marcada, o usuário só será inscrito após compensação do boleto. Caso contrario ele é automaticamente inscrito e a inscrição é suspensa caso o pagamento nao seja compensado.';
$string['viewboleto'] = 'Ver e imprimir boletos';

$string['cannotenrol'] = 'Enrolment is disabled or inactive';
$string['cohortnonmemberinfo'] = 'Only members of cohort \'{$a}\' can boleto-enrol.';
$string['cohortonly'] = 'Only cohort members';
$string['cohortonly_help'] = 'boleto enrolment may be restricted to members of a specified cohort only. Note that changing this setting has no effect on existing enrolments.';
$string['customwelcomemessage'] = 'Custom welcome message';
$string['customwelcomemessage_help'] = 'A custom welcome message may be added as plain text or Moodle-auto format, including HTML tags and multi-lang tags.

The following placeholders may be included in the message:

* Course name {$a->coursename}
* Link to user\'s profile page {$a->profileurl}
* User email {$a->email}
* User fullname {$a->fullname}';
$string['defaultrole'] = 'Default role assignment';
$string['defaultrole_desc'] = 'Select role which should be assigned to users during boleto enrolment';
$string['enrolenddate'] = 'End date';
$string['enrolenddate_help'] = 'If enabled, users can enrol themselves until this date only.';
$string['enrolenddaterror'] = 'Enrolment end date cannot be earlier than start date';
$string['enrolme'] = 'Enrol me';
$string['enrolperiod'] = 'Enrolment duration';
$string['enrolperiod_desc'] = 'Default length of time that the enrolment is valid. If set to zero, the enrolment duration will be unlimited by default.';
$string['enrolperiod_help'] = 'Length of time that the enrolment is valid, starting with the moment the user enrols themselves. If disabled, the enrolment duration will be unlimited.';
$string['enrolstartdate'] = 'Start date';
$string['enrolstartdate_help'] = 'If enabled, users can enrol themselves from this date onward only.';
$string['expiredaction'] = 'Enrolment expiration action';
$string['expiredaction_help'] = 'Select action to carry out when user enrolment expires. Please note that some user data and settings are purged from course during course unenrolment.';
$string['expirymessageenrollersubject'] = 'boleto enrolment expiry notification';
$string['expirymessageenrollerbody'] = 'boleto enrolment in the course \'{$a->course}\' will expire within the next {$a->threshold} for the following users:

{$a->users}

To extend their enrolment, go to {$a->extendurl}';
$string['expirymessageenrolledsubject'] = 'boleto enrolment expiry notification';
$string['expirymessageenrolledbody'] = 'Dear {$a->user},

This is a notification that your enrolment in the course \'{$a->course}\' is due to expire on {$a->timeend}.

If you need help, please contact {$a->enroller}.';
$string['groupkey'] = 'Use group enrolment keys';
$string['groupkey_desc'] = 'Use group enrolment keys by default.';
$string['groupkey_help'] = 'In addition to restricting access to the course to only those who know the key, use of group enrolment keys means users are automatically added to groups when they enrol in the course.

Note: An enrolment key for the course must be specified in the boleto enrolment settings as well as group enrolment keys in the group settings.';
$string['keyholder'] = 'You should have received this enrolment key from:';
$string['longtimenosee'] = 'Unenrol inactive after';
$string['longtimenosee_help'] = 'If users haven\'t accessed a course for a long time, then they are automatically unenrolled. This parameter specifies that time limit.';
$string['maxenrolled'] = 'Max enrolled users';
$string['maxenrolled_help'] = 'Specifies the maximum number of users that can boleto enrol. 0 means no limit.';
$string['maxenrolledreached'] = 'Maximum number of users allowed to boleto-enrol was already reached.';
$string['messageprovider:expiry_notification'] = 'boleto enrolment expiry notifications';
$string['boletos'] = 'Allow new enrolments';
$string['boletos_desc'] = 'Allow users to boleto enrol into new courses by default.';
$string['boletos_help'] = 'This setting determines whether a user can enrol into this course.';
$string['nopassword'] = 'No enrolment key required.';
$string['password'] = 'Enrolment key';
$string['password_help'] = 'An enrolment key enables access to the course to be restricted to only those who know the key.

If the field is left blank, any user may enrol in the course.

If an enrolment key is specified, any user attempting to enrol in the course will be required to supply the key. Note that a user only needs to supply the enrolment key ONCE, when they enrol in the course.';
$string['passwordinvalid'] = 'Incorrect enrolment key, please try again';
$string['passwordinvalidhint'] = 'That enrolment key was incorrect, please try again<br />
(Here\'s a hint - it starts with \'{$a}\')';
$string['pluginname'] = 'Boleto Bancário';
$string['pluginname_desc'] = 'The boleto bancário enrolment plugin allow teachers and managers to configure a way for users to pay to enrol on courses.';
$string['requirepassword'] = 'Require enrolment key';
$string['requirepassword_desc'] = 'Require enrolment key in new courses and prevent removing of enrolment key from existing courses.';
$string['role'] = 'Default assigned role';
$string['boleto:config'] = 'Configure boleto enrol instances';
$string['boleto:holdkey'] = 'Appear as the boleto enrolment key holder';
$string['boleto:manage'] = 'Manage enrolled users';
$string['boleto:unenrol'] = 'Unenrol users from course';
$string['boleto:unenrolself'] = 'Unenrol self from the course';
$string['sendcoursewelcomemessage'] = 'Send course welcome message';
$string['sendcoursewelcomemessage_help'] = 'If enabled, users receive a welcome message via email when they boleto-enrol in a course.';
$string['showhint'] = 'Show hint';
$string['showhint_desc'] = 'Show first letter of the guest access key.';
$string['status'] = 'Enable existing enrolments';
$string['status_desc'] = 'Enable boleto enrolment method in new courses.';
$string['status_help'] = 'If disabled all existing boleto enrolments are suspended and new users can not enrol.';
$string['unenrol'] = 'Unenrol user';
$string['unenrolboletoconfirm'] = 'Do you really want to unenrol yourboleto from course "{$a}"?';
$string['unenroluser'] = 'Do you really want to unenrol "{$a->user}" from course "{$a->course}"?';
$string['usepasswordpolicy'] = 'Use password policy';
$string['usepasswordpolicy_desc'] = 'Use standard password policy for enrolment keys.';
$string['welcometocourse'] = 'Welcome to {$a}';
$string['welcometocoursetext'] = 'Welcome to {$a->coursename}!

If you have not done so already, you should edit your profile page so that we can learn more about you:

  {$a->profileurl}';
