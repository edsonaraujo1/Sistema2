<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Acesso ao Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

// Resgata a Sessao
@session_start();
$nome3 = $_SESSION["nome_log"];
$servletjs2 = $_SESSION["servletjs2"];

	if(empty($nome3)){
		
		include("login.php");
		//exit;
	}else{
		
		include("menu_1.php");
		//exit;
		
	}


?>