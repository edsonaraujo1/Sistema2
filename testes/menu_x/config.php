<?
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: configuracao visual do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualizaзгo : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

	$path      = "../";

	// salva Secao
	@session_start();
	$_SESSION['Path1'] = $path;

	$conf_b = "config.txt";

	if(file_exists($conf_b))
	{
		
		
	$cria      = fopen("config.txt", "r");
	$linha     = file("config.txt");
	
    include_once('config/java_js.php');
	
	}else{
		
//	echo"Nгo foi possнvel localizar o banco de dados!";
	
		$cria      = fopen("../config.txt", "r");
	    $linha     = file("../config.txt");
	    
	    include_once('../config/java_js.php');

	
	}
	
    include_once('config/java_js.php');


	$total  = count($linha);
	for ($i = "0"; $i < $total; $i++){
	     list($dado1,$dado2,$dado3,$dado4,$dado5,$dado6,$dado7,$dado8,$dado9,$dado10,$dado11,$dado12,$dado13,$dado14,$dado15,$dado16,$dado17,$dado18,$dado19,$dado20,$dado21,) = explode(";",$linha[$i]);
	}

	$website     = decode5t($dado1);  // http://www.sindificios.com.br/index.htm
	$cpfwebsite  = decode5t($dado2);  // http://www.receita.fazenda.gov.br/Aplicacoes/ATCTA/cpf/ConsultaPublica.asp
	$atuali_za   = decode5t($dado3);  // 01/04/2008 аs 19:1
	$criado_za   = decode5t($dado4);  // 07/08/2007 аs 15:32
	$logo_sis    = decode5t($dado5);  // imagens/logo2.PNG
	$Titulo      = decode5t($dado6);  // Sysmp Sistema ERP - Web
	$cnpj_sis    = decode5t($dado7);  // 43.070.481/0001-14
	$logo1_sis   = decode5t($dado8);  // imagens/Logo1.JPG
	$logo2_sis   = decode5t($dado9);  // imagens/Logo_oficio4.bmp
	$color_bor   = decode5t($dado10); // #5A9CB1
	$versao_1    = decode5t($dado11); // 1.2
//	$db_x        = $dado12; // Banco de Dados
	$color_menu  = decode5t($dado12);
	
	$server_sq2  = decode5t($dado13);
	$server_sq3  = decode5t($dado14);
    $user_sq2    = decode5t($dado15);
    $pass_sq2    = decode5t($dado16);
    $banco_sq2   = decode5t($dado17);


    // SMTP
    $smtp_2      = decode5t($dado18);
    $email_2     = decode5t($dado19);
    $sen_email2  = decode5t($dado20);
    $email_ret2  = decode5t($dado21);


	// Salva Secao
	@session_start();
	
	$_SESSION['website'] 	= $website;
	$_SESSION['cpfwebsite'] = $cpfwebsite;
	$_SESSION['atuali_za'] 	= $atuali_za;
	$_SESSION['criado_za'] 	= $criado_za;
	$_SESSION['logo_sis'] 	= $logo_sis;
	$_SESSION['Titulo'] 	= $Titulo;
	$_SESSION['cnpj_sis'] 	= $cnpj_sis;
	$_SESSION['logo1_sis'] 	= $logo1_sis;
	$_SESSION['logo2_sis'] 	= $logo2_sis;
	$_SESSION['color_bor'] 	= $color_bor;
	$_SESSION['versao_1'] 	= $versao_1;
	$_SESSION['color_menu'] = $color_menu;
	
	// Banco de Dados
	$_SESSION['server_sq2'] = addslashes($server_sq2);
	$_SESSION['server_sq3'] = addslashes($server_sq3);
	$_SESSION['user_sq2']   = addslashes($user_sq2);
	$_SESSION['pass_sq2']   = addslashes($pass_sq2);
	$_SESSION['banco_sq2']  = addslashes($banco_sq2);


    // Dados SMPT
    
	$_SESSION['smtp_2'] 	 = $smtp_2;
	$_SESSION['email_2']     = $email_2;
	$_SESSION['sen_email2']  = $sen_email2;
    $_SESSION['email_ret2']  = $email_ret2;


// Funcao Verifica Versao do Browse

$browser_cliet = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT']:"";

if(strpos($browser_cliet, 'Opera')!== false) { $browser = 'Opera';
}elseif(strpos($browser_cliet, 'Gecko')!== false) { $browser = 'Firefox';
}elseif(strpos($browser_cliet, 'MSIE')!== false) { $browser = 'MS Internet Explorer';
}elseif(strpos($browser_cliet, 'Lynx')!== false) { $browser = 'Lynx';
}elseif(strpos($browser_cliet, 'WebTV')!== false) { $browser = 'WebTV';
}elseif(strpos($browser_cliet, 'Konqueror')!== false) { $browser = 'Konqueror';
}elseif(strpos($browser_cliet, 'Google')!== false) { $browser = 'Robфs de Busca';
}else $browser = " Desconhecido"; 
	
?>