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
 * This files show courses based on the city 
 *
 * @package enrol_boleto
 * @copyright 2015 Daniel Neis
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');

$instanceid = required_param('instanceid', PARAM_INT);

$instance = $DB->get_record('enrol', array('id' => $instanceid));
$boletooptions = json_decode($instance->customchar3);

// The following variables are the same defined at vendor/bielsystems/boletophp/boleto_cef.php

$dias_de_prazo_para_pagamento = 2;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias  OU  informe data: "13/04/2006"  OU  informe "" se Contra Apresentacao;
$valor_cobrado = $boletooptions->valor; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado, 2, ',', '');

$dadosboleto["inicio_nosso_numero"] = "80";  // TODO: Carteira SR: 80, 81 ou 82  -  Carteira CR: 90 (Confirmar com gerente qual usar)
$dadosboleto["nosso_numero"] = "19525086";  // TODO: Nosso numero sem o DV - REGRA: Máximo de 8 caracteres!
$dadosboleto["numero_documento"] = "27.030195.10";// TODO: Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $boletooptions->sacado;
$dadosboleto["endereco1"] = "";
$dadosboleto["endereco2"] = "";

// INFORMACOES PARA O CLIENTE
// TODO: implement settings with options to populate boletos
$dadosboleto["demonstrativo1"] = "Pagamento de curso para UniSagres";
$dadosboleto["demonstrativo2"] = "";
$dadosboleto["demonstrativo3"] = "";

// INSTRUÇÕES PARA O CAIXA
$dadosboleto["instrucoes1"] = "";
$dadosboleto["instrucoes2"] = "";
$dadosboleto["instrucoes3"] = "";
$dadosboleto["instrucoes4"] = "";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
// TODO: implement settings with options to populate boletos
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";

// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //

// DADOS DA SUA CONTA - CEF
$dadosboleto["agencia"] = $boletooptions->agencia; // Num da agencia, sem digito
$dadosboleto["conta"] = $boletooptions->conta; 	// Num da conta, sem digito
$dadosboleto["conta_dv"] = $boletooptions->contadv; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - CEF
$dadosboleto["conta_cedente"] = $boletooptions->cedente; // ContaCedente do Cliente, sem digito (Somente Números)
$dadosboleto["conta_cedente_dv"] = $boletooptions->cedentedv; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = $boletooptions->carteira;  // Código da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)

// SEUS DADOS
$dadosboleto["identificacao"] = $boletooptions->nomefantasia;
$dadosboleto["cpf_cnpj"] = $boletooptions->cnpj;
$dadosboleto["endereco"] = $boletooptions->endereco;
$dadosboleto["cidade_uf"] = $boletooptions->cidade;
$dadosboleto["cedente"] = $boletooptions->razaosocial;

// NÃO ALTERAR!
include("./vendor/bielsystems/boletophp/include/funcoes_cef.php"); 
include("./vendor/bielsystems/boletophp/include/layout_cef.php");
