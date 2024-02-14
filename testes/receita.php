<?php

/**
 * @author holodek
 * @copyright 2010
 */


// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

include('calculos.php');

		echo number_format($total_semana1,2,",",".")." - ";
		echo number_format($total_semana2,2,",",".")." - ";
		echo number_format($total_semana3,2,",",".")." - ";
		echo number_format($total_semana4,2,",",".")." - ";
		echo number_format($total_semana5,2,",",".")." - ";
		echo number_format($total_semana6,2,",",".")." - ";
		echo number_format($total_semana7,2,",",".")." - ";
		echo number_format($total_semana8,2,",",".")." - ";
		echo number_format($total_1,2,",",".")."<br>";


		echo number_format($total_semana1a,2,",",".")." - ";
		echo number_format($total_semana2a,2,",",".")." - ";
		echo number_format($total_semana3a,2,",",".")." - ";
		echo number_format($total_semana4a,2,",",".")." - ";
		echo number_format($total_semana5a,2,",",".")." - ";
		echo number_format($total_semana6a,2,",",".")." - ";
		echo number_format($total_semana7a,2,",",".")." - ";
		echo number_format($total_semana8a,2,",",".")." - ";
		echo number_format($total_1a,2,",",".")."<br>";

		echo number_format($total_semana1b,2,",",".")." - ";
		echo number_format($total_semana2b,2,",",".")." - ";
		echo number_format($total_semana3b,2,",",".")." - ";
		echo number_format($total_semana4b,2,",",".")." - ";
		echo number_format($total_semana5b,2,",",".")." - ";
		echo number_format($total_semana6b,2,",",".")." - ";
		echo number_format($total_semana7b,2,",",".")." - ";
		echo number_format($total_semana8b,2,",",".")." - ";
		echo number_format($total_1b,2,",",".")."<br>";

		echo number_format($total_semana1c,2,",",".")." - ";
		echo number_format($total_semana2c,2,",",".")." - ";
		echo number_format($total_semana3c,2,",",".")." - ";
		echo number_format($total_semana4c,2,",",".")." - ";
		echo number_format($total_semana5c,2,",",".")." - ";
		echo number_format($total_semana6c,2,",",".")." - ";
		echo number_format($total_semana7c,2,",",".")." - ";
		echo number_format($total_semana8c,2,",",".")." - ";
		echo number_format($total_1c,2,",",".")."<br>";

		echo number_format($total_semana1d,2,",",".")." - ";
		echo number_format($total_semana2d,2,",",".")." - ";
		echo number_format($total_semana3d,2,",",".")." - ";
		echo number_format($total_semana4d,2,",",".")." - ";
		echo number_format($total_semana5d,2,",",".")." - ";
		echo number_format($total_semana6d,2,",",".")." - ";
		echo number_format($total_semana7d,2,",",".")." - ";
		echo number_format($total_semana8d,2,",",".")." - ";
		echo number_format($total_1d,2,",",".")."<br>";

		echo number_format($total_semana1e,2,",",".")." - ";
		echo number_format($total_semana2e,2,",",".")." - ";
		echo number_format($total_semana3e,2,",",".")." - ";
		echo number_format($total_semana4e,2,",",".")." - ";
		echo number_format($total_semana5e,2,",",".")." - ";
		echo number_format($total_semana6e,2,",",".")." - ";
		echo number_format($total_semana7e,2,",",".")." - ";
		echo number_format($total_semana8e,2,",",".")." - ";
		echo number_format($total_1e,2,",",".")."<br>";

		echo number_format($total_semana1f,2,",",".")." - ";
		echo number_format($total_semana2f,2,",",".")." - ";
		echo number_format($total_semana3f,2,",",".")." - ";
		echo number_format($total_semana4f,2,",",".")." - ";
		echo number_format($total_semana5f,2,",",".")." - ";
		echo number_format($total_semana6f,2,",",".")." - ";
		echo number_format($total_semana7f,2,",",".")." - ";
		echo number_format($total_semana8f,2,",",".")." - ";
		echo number_format($total_1f,2,",",".")."<br>";

		echo number_format($total_semana1g,2,",",".")." - ";
		echo number_format($total_semana2g,2,",",".")." - ";
		echo number_format($total_semana3g,2,",",".")." - ";
		echo number_format($total_semana4g,2,",",".")." - ";
		echo number_format($total_semana5g,2,",",".")." - ";
		echo number_format($total_semana6g,2,",",".")." - ";
		echo number_format($total_semana7g,2,",",".")." - ";
		echo number_format($total_semana8g,2,",",".")." - ";
		echo number_format($total_1g,2,",",".")."<br>";

		echo number_format($total_semana1h,2,",",".")." - ";
		echo number_format($total_semana2h,2,",",".")." - ";
		echo number_format($total_semana3h,2,",",".")." - ";
		echo number_format($total_semana4h,2,",",".")." - ";
		echo number_format($total_semana5h,2,",",".")." - ";
		echo number_format($total_semana6h,2,",",".")." - ";
		echo number_format($total_semana7h,2,",",".")." - ";
		echo number_format($total_semana8h,2,",",".")." - ";
		echo number_format($total_1h,2,",",".")."<br>";

		echo number_format($total_semana1i,2,",",".")." - ";
		echo number_format($total_semana2i,2,",",".")." - ";
		echo number_format($total_semana3i,2,",",".")." - ";
		echo number_format($total_semana4i,2,",",".")." - ";
		echo number_format($total_semana5i,2,",",".")." - ";
		echo number_format($total_semana6i,2,",",".")." - ";
		echo number_format($total_semana7i,2,",",".")." - ";
		echo number_format($total_semana8i,2,",",".")." - ";
		echo number_format($total_1i,2,",",".")."<br>";

		echo number_format($total_semana1j,2,",",".")." - ";
		echo number_format($total_semana2j,2,",",".")." - ";
		echo number_format($total_semana3j,2,",",".")." - ";
		echo number_format($total_semana4j,2,",",".")." - ";
		echo number_format($total_semana5j,2,",",".")." - ";
		echo number_format($total_semana6j,2,",",".")." - ";
		echo number_format($total_semana7j,2,",",".")." - ";
		echo number_format($total_semana8j,2,",",".")." - ";
		echo number_format($total_1j,2,",",".")."<br>";

		echo number_format($total_semana1k,2,",",".")." - ";
		echo number_format($total_semana2k,2,",",".")." - ";
		echo number_format($total_semana3k,2,",",".")." - ";
		echo number_format($total_semana4k,2,",",".")." - ";
		echo number_format($total_semana5k,2,",",".")." - ";
		echo number_format($total_semana6k,2,",",".")." - ";
		echo number_format($total_semana7k,2,",",".")." - ";
		echo number_format($total_semana8k,2,",",".")." - ";
		echo number_format($total_1k,2,",",".")."<br>";

		echo number_format($total_semana1l,2,",",".")." - ";
		echo number_format($total_semana2l,2,",",".")." - ";
		echo number_format($total_semana3l,2,",",".")." - ";
		echo number_format($total_semana4l,2,",",".")." - ";
		echo number_format($total_semana5l,2,",",".")." - ";
		echo number_format($total_semana6l,2,",",".")." - ";
		echo number_format($total_semana7l,2,",",".")." - ";
		echo number_format($total_semana8l,2,",",".")." - ";
		echo number_format($total_1l,2,",",".")."<br>";

		echo number_format($total_semana1m,2,",",".")." - ";
		echo number_format($total_semana2m,2,",",".")." - ";
		echo number_format($total_semana3m,2,",",".")." - ";
		echo number_format($total_semana4m,2,",",".")." - ";
		echo number_format($total_semana5m,2,",",".")." - ";
		echo number_format($total_semana6m,2,",",".")." - ";
		echo number_format($total_semana7m,2,",",".")." - ";
		echo number_format($total_semana8m,2,",",".")." - ";
		echo number_format($total_1m,2,",",".")."<br>";

		echo number_format($total_semana1n,2,",",".")." - ";
		echo number_format($total_semana2n,2,",",".")." - ";
		echo number_format($total_semana3n,2,",",".")." - ";
		echo number_format($total_semana4n,2,",",".")." - ";
		echo number_format($total_semana5n,2,",",".")." - ";
		echo number_format($total_semana6n,2,",",".")." - ";
		echo number_format($total_semana7n,2,",",".")." - ";
		echo number_format($total_semana8n,2,",",".")." - ";
		echo number_format($total_1n,2,",",".")."<br>";

		echo number_format($total_semana1o,2,",",".")." - ";
		echo number_format($total_semana2o,2,",",".")." - ";
		echo number_format($total_semana3o,2,",",".")." - ";
		echo number_format($total_semana4o,2,",",".")." - ";
		echo number_format($total_semana5o,2,",",".")." - ";
		echo number_format($total_semana6o,2,",",".")." - ";
		echo number_format($total_semana7o,2,",",".")." - ";
		echo number_format($total_semana8o,2,",",".")." - ";
		echo number_format($total_1o,2,",",".")."<br>";

		echo number_format($total_semana1p,2,",",".")." - ";
		echo number_format($total_semana2p,2,",",".")." - ";
		echo number_format($total_semana3p,2,",",".")." - ";
		echo number_format($total_semana4p,2,",",".")." - ";
		echo number_format($total_semana5p,2,",",".")." - ";
		echo number_format($total_semana6p,2,",",".")." - ";
		echo number_format($total_semana7p,2,",",".")." - ";
		echo number_format($total_semana8p,2,",",".")." - ";
		echo number_format($total_1p,2,",",".")."<br>";

		echo number_format($total_semana1q,2,",",".")." - ";
		echo number_format($total_semana2q,2,",",".")." - ";
		echo number_format($total_semana3q,2,",",".")." - ";
		echo number_format($total_semana4q,2,",",".")." - ";
		echo number_format($total_semana5q,2,",",".")." - ";
		echo number_format($total_semana6q,2,",",".")." - ";
		echo number_format($total_semana7q,2,",",".")." - ";
		echo number_format($total_semana8q,2,",",".")." - ";
		echo number_format($total_1q,2,",",".")."<br>";

		echo number_format($total_semana1r,2,",",".")." - ";
		echo number_format($total_semana2r,2,",",".")." - ";
		echo number_format($total_semana3r,2,",",".")." - ";
		echo number_format($total_semana4r,2,",",".")." - ";
		echo number_format($total_semana5r,2,",",".")." - ";
		echo number_format($total_semana6r,2,",",".")." - ";
		echo number_format($total_semana7r,2,",",".")." - ";
		echo number_format($total_semana8r,2,",",".")." - ";
		echo number_format($total_1r,2,",",".")."<br>";

		echo number_format($total_semana1s,2,",",".")." - ";
		echo number_format($total_semana2s,2,",",".")." - ";
		echo number_format($total_semana3s,2,",",".")." - ";
		echo number_format($total_semana4s,2,",",".")." - ";
		echo number_format($total_semana5s,2,",",".")." - ";
		echo number_format($total_semana6s,2,",",".")." - ";
		echo number_format($total_semana7s,2,",",".")." - ";
		echo number_format($total_semana8s,2,",",".")." - ";
		echo number_format($total_1s,2,",",".")."<br>";

		echo number_format($total_semana1t,2,",",".")." - ";
		echo number_format($total_semana2t,2,",",".")." - ";
		echo number_format($total_semana3t,2,",",".")." - ";
		echo number_format($total_semana4t,2,",",".")." - ";
		echo number_format($total_semana5t,2,",",".")." - ";
		echo number_format($total_semana6t,2,",",".")." - ";
		echo number_format($total_semana7t,2,",",".")." - ";
		echo number_format($total_semana8t,2,",",".")." - ";
		echo number_format($total_1t,2,",",".")."<br>";

		echo number_format($total_semana1u,2,",",".")." - ";
		echo number_format($total_semana2u,2,",",".")." - ";
		echo number_format($total_semana3u,2,",",".")." - ";
		echo number_format($total_semana4u,2,",",".")." - ";
		echo number_format($total_semana5u,2,",",".")." - ";
		echo number_format($total_semana6u,2,",",".")." - ";
		echo number_format($total_semana7u,2,",",".")." - ";
		echo number_format($total_semana8u,2,",",".")." - ";
		echo number_format($total_1u,2,",",".")."<br>";

		echo number_format($total_semana1v,2,",",".")." - ";
		echo number_format($total_semana2v,2,",",".")." - ";
		echo number_format($total_semana3v,2,",",".")." - ";
		echo number_format($total_semana4v,2,",",".")." - ";
		echo number_format($total_semana5v,2,",",".")." - ";
		echo number_format($total_semana6v,2,",",".")." - ";
		echo number_format($total_semana7v,2,",",".")." - ";
		echo number_format($total_semana8v,2,",",".")." - ";
		echo number_format($total_1v,2,",",".")."<br>";

		echo number_format($total_semana1x,2,",",".")." - ";
		echo number_format($total_semana2x,2,",",".")." - ";
		echo number_format($total_semana3x,2,",",".")." - ";
		echo number_format($total_semana4x,2,",",".")." - ";
		echo number_format($total_semana5x,2,",",".")." - ";
		echo number_format($total_semana6x,2,",",".")." - ";
		echo number_format($total_semana7x,2,",",".")." - ";
		echo number_format($total_semana8x,2,",",".")." - ";
		echo number_format($total_1x,2,",",".")."<br>";



?>