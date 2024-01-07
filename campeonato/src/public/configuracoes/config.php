<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define("MODELO", realpath(dirname(__FILE__) . '/../modelos'));
define("CONFIGURACOES", realpath(dirname(__FILE__) . '/../configuracoes'));
define("INTERFACES",  realpath(dirname(__FILE__) . '/../interfaces'));
define("COMPONENTES",  realpath(dirname(__FILE__) . '/../interfaces/componentes'));
define("CONTROLES",  realpath(dirname(__FILE__) . '/../controles'));
define("EXCECOES",  realpath(dirname(__FILE__) . '/../excecoes'));

require("session.php");
require('utilitarios.php');
require(EXCECOES . "/AppException.php");
require(EXCECOES . "/ValidationException.php");
require(MODELO . "/Banco.php");
require(MODELO . "/Modelo.php");
require('loader.php');
// require(MODELO . "/Usuario.php");
// require(MODELO . "/Jogador.php");
// require(MODELO . "/Time.php");
// require(MODELO . "/Contrato.php");
// require(MODELO . "/Campeonato.php");
// require(MODELO . "/Edicao.php");
// require(MODELO . "/Resultado.php");
// require(MODELO . "/CampeonatoEdicao.php");
// require(MODELO . "/Jogo.php");
// require(MODELO . "/Partida.php");
// require(MODELO . "/Paginacao.php");

