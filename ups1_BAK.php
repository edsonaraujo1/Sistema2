<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Desenvolvido por...: Jean Carlos de Araujo
 
 Finalidade.........: Evitar Ataques
 Criado em Data.....: 06/07/2009
 Ultima Atualização : 07/07/2009 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

include("config.php");
	
	// Abre Conexão com o MySql
include("conexao.php");
	// Chama o Banco de Dados
		
$link = @mysql_connect($host,$user,$pass);
		
@mysql_select_db($db);


$ip_bam_nome = $_SERVER['REMOTE_ADDR'];


// Quarda historico de invasao
$cons_log1xx  = "SELECT * FROM ip_chek_up WHERE ip_user = '$ip_bam_nome'";
			
	// Retorno o Resultado da Pesquisa
$resu_log1xx    = @mysql_query($cons_log1xx);
$row1lxx        = @mysql_fetch_array($resu_log1xx);
$qtd_qt_at      = @$row1lxx["qtd"];

$bloque_io = 0;
	
if ($qtd_qt_at >= 5){
	?>
	<meta HTTP-EQUIV="Refresh" CONTENT="0;URL=http://www.uol.com.br/"/>
	<?php
	exit();
}else{
	
	if ($bloque_io == 0)
	{

	// Atualiza tempo de Bloqueio do IP
	$timestamp  = time(); 
	$timeout    = time()-345600; // valor em segundos 
	$result_ip  = @mysql_db_query($db, "DELETE FROM log_invasao WHERE timestamp<$timeout"); 
	  
	// Consulta o IP Bloqueado   
	$consu_bam1  = "SELECT id_1 FROM log_invasao WHERE ip_user = '$ip_bam_nome'";
			
	// Retorno o Resultado da Pesquisa
	$resu_bam1   = @mysql_query($consu_bam1);
	$row_bam1    = @mysql_fetch_array($resu_bam1);
	$qtd_qt      = @mysql_num_rows($resu_bam1);
	$id1         = @$row_bam1["id_1"];
	
	
	if ($qtd_qt >= 5){
		?>
		<meta HTTP-EQUIV="Refresh" CONTENT="0;URL=http://www.uol.com.br/"/>
        <?php
		//header("Location: http://www.uol.com.br/");
		exit();
	}else{
	
	
	set_include_path(
	    get_include_path()
	    . PATH_SEPARATOR
	    . 'lib/'
	);
	
	if (!session_id()) {
	    @session_start();
	}
	
	// Inclui o arquivo do PHPIDS
	require_once 'IDS/Init.php';
	
	$request = array('REQUEST' => $_REQUEST,
	                  'GET' => $_GET,
					  'POST' => $_POST,
					  'COOKIE'  => $_COOKIE
					  );
	// Inicia o PHPIDS
	$init = IDS_Init::init(dirname(__FILE__) . '/lib/IDS/Config/Config.ini.php');
	
	$init->config['General']['base_path'] = dirname(__FILE__) . '/lib/IDS/';
	$init->config['General']['use_base_path'] = true;
	$init->config['Caching']['caching'] = 'none';
	
	// 2. Initiate the PHPIDS and fetch the results
	$ids = new IDS_Monitor($request, $init);
	$result = $ids->run();
	
	
	if (!$result->isEmpty()) {
	    // Exibe resultados caso sejam encontrados
	     //include("sal_inv_ast2.php");	
	    //echo $result;
	    //exit();
	    
		//include("config.php");
		
		// Abre Conexão com o MySql
		//include("conexao.php");
		// Chama o Banco de Dados
			
		$link = @mysql_connect($host,$user,$pass);
			
		@mysql_select_db($db);
		
		// Atualiza arquivo Log
		$data_log  = date("d-m-Y")." as ".date("H:i");
		$even_log  = "TENTATIVA DE INVASAO";
		$arqui     = $_SERVER['PHP_SELF'];
		$ip_inv    = $_SERVER['REMOTE_ADDR'];
		$commed    = $result;
		$timestamp = time(); 
		
		echo "time ".$timestamp."<br>";
		echo "data ".$data_log."<br>";
		echo "serv ".$even_log."<br>";
		echo "arq  ".$arqui."<br>";
		echo "ip   ".$ip_inv."<br>";
		echo "comm ".$commed."<br>";
		
		//exit();
			
		$consulta_log_in = "INSERT INTO log_invasao (timestamp,
		                                          data,
				                                  log,
				                                  ip_user,
				  						          pagina_invadida,
												  comando_usado)
													   
					                           VALUES ('$timestamp',
											           '$data_log',
					                                   '$even_log', 
													   '$ip_inv',
													   '$arqui',
													   '$commed')";
						
		@mysql_query($consulta_log_in, $link)
		
		or die ("1 erro salvando !!!!");
	
	    // Quarda historico de invasao
		$cons_log1xx  = "SELECT * FROM ip_chek_up WHERE ip_user = '$ip_inv'";
				
		// Retorno o Resultado da Pesquisa
		$resu_log1xx  = @mysql_query($cons_log1xx);
		
		$row1lxx      = @mysql_fetch_array($resu_log1xx);
		
		$id1lxx       = @$row1lxx["id"];
		$qtdxx        = @$row1lxx["qtd"];
		$qtd_1 = $qtdxx+1;
	
	    if (!empty($id1lxx)){
	    	
			$consulta_chekin = "UPDATE ip_chek_up SET qtd  = '$qtd_1', data = '$data_log' WHERE ip_user = '$ip_inv'";
							
	    	
	    }else{
	    	
			$consulta_chekin = "INSERT INTO ip_chek_up (ip_user,
			                                            data,
					                                    attack,
					                                    qtd)
														   
						                           VALUES ('$ip_inv',
												           '$data_log',
						                                   '$commed', 
														   '$qtd_1')";
	    }
		
		@mysql_query($consulta_chekin, $link)
		
		or die ("2 erro salvando !!!!");
	    
	    include("server.php");
	    
	    exit();
	}
	
	}

} // Fim do if bloqueio	
	
}

?>