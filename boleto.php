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
 * This files shows a Boleto Bancário with CEF layout
 *
 * @package enrol_boleto
 * @copyright 2015 Daniel Neis
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');

$id = required_param('id', PARAM_INT);

if (!$boleto = $DB->get_record('enrol_boleto', array('id' => $id))) {
    print_error('invalid boleto');
}
if (!$instance = $DB->get_record('enrol', array('id' => $boleto->enrolid))) {
    print_error('invalid boleto');
}
$boletooptions = json_decode($instance->customchar3);

// The following variables are the same defined at vendor/bielsystems/boletophp/boleto_cef.php

$start_date = $instance->timecreated + ($boleto->parcela * 30 * 86400); // Cada parcela vence em mais 30 dias.

$prazo_para_pagamento = 2 * 86400;
$data_venc = date("d/m/Y", $start_date + ($prazo_para_pagamento));  // Prazo de X dias  OU  informe data: "13/04/2006"  OU  informe "" se Contra Apresentacao;
$valor_cobrado = $boleto->totalprice; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado, 2, ',', '');

// Carteira SR: 80, 81 ou 82 - Carteira CR: 90 (Confirmar com gerente qual usar)
$dadosboleto["inicio_nosso_numero"] = $boletooptions->carteira;

// Nosso numero sem o DV - REGRA: Máximo de 8 caracteres!
$dadosboleto["nosso_numero"] = $boletooptions->nossonumero;

// Num do pedido ou do documento
$dadosboleto["numero_documento"] = $boleto->numerodocumento;

 // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_vencimento"] = $data_venc;

 // Data de emissão do Boleto
$dadosboleto["data_documento"] = date("d/m/Y", $instance->timecreated);

 // Data de processamento do boleto (opcional)
$dadosboleto["data_processamento"] = date("d/m/Y", $instance->timecreated);

// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula
$dadosboleto["valor_boleto"] = $valor_boleto;

// Dados do seu cliente
$dadosboleto["sacado"] = $boleto->sacado;
$dadosboleto["endereco1"] = "";
$dadosboleto["endereco2"] = "";

// Informacoes para o cliente
$dadosboleto["demonstrativo1"] = "Pagamento de curso para UniSagres"; // TODO: variar conforme curso/evento. 
$dadosboleto["demonstrativo2"] = ""; // TODO: informar parcela?
$dadosboleto["demonstrativo3"] = "";

// Instruções para o caixa
$dadosboleto["instrucoes1"] = "";
$dadosboleto["instrucoes2"] = "";
$dadosboleto["instrucoes3"] = "";
$dadosboleto["instrucoes4"] = "";

// Dados opcionais de acordo com o banco ou cliente
$dadosboleto["quantidade"] = "";  // TODO: quantidade: quantidade de participantes
$dadosboleto["valor_unitario"] = ""; // TODO: preencher com preço?
$dadosboleto["aceite"] = ""; // ??
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";

// ---------------------- Dados fixos de configuração do seu boleto --------------- //

// Dados da sua conta - CEF
$dadosboleto["agencia"] = $boletooptions->agencia;  // Num da agencia, sem digito
$dadosboleto["conta"] = $boletooptions->conta;      // Num da conta, sem digito
$dadosboleto["conta_dv"] = $boletooptions->contadv; // Digito do Num da conta

// Dados personalizados - CEF
$dadosboleto["conta_cedente"] = $boletooptions->cedente;      // ContaCedente do Cliente, sem digito (Somente Números)
$dadosboleto["conta_cedente_dv"] = $boletooptions->cedentedv; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = $boletooptions->carteira;          // Código da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro)
                                                              // - (Confirmar com gerente qual usar)

// Seus dados
$dadosboleto["identificacao"] = $boletooptions->nomefantasia;
$dadosboleto["cpf_cnpj"] = $boletooptions->cnpj;
$dadosboleto["endereco"] = $boletooptions->endereco;
$dadosboleto["cidade_uf"] = $boletooptions->cidade;
$dadosboleto["cedente"] = $boletooptions->razaosocial;

// TODO: incluir logo preto-e-branco da unisagres
// Não alterar!
include("./vendor/bielsystems/boletophp/include/funcoes_cef.php"); 
include("./vendor/bielsystems/boletophp/include/layout_cef.php");
