<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Imprimir Codigo de Barras 
 Criado em Data.....: 05/05/2009
 Ultima Atualização : 06/05/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

$host  = "192.168.1.50";   // Host do servidor
$user  = "sindificios";     // Conta do Usuario
$pass  = "@12XLSIN_!?";     // Senha do Usuario
$db    = "bancodados";      // Banco de Dados

$dat_rel = date("d/m/Y");
$soma_quant = 0;

// Chama o Banco de Dados
$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


// Realiza uma comsulta
$consulta  = "SELECT * FROM log_user_event WHERE USUARIO = 'CLEUSA' AND DATA = '17/06/2010'";
		
$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["EVENTO"];
$Edit2  = @$row["USUARIO"];
$Edit3  = @$row["DATA"];



     while ($linha = mysql_fetch_array($resultado))
     {

    $id_conf    = $linha["id"];
    $Edit1a     = $linha["EVENTO"]; 
	$Edit1      = substr($linha["EVENTO"],0,8);

	$program    = $Edit1a;
	$string     = $program;
	$array      = explode('/', $string);
	
	
	for ($si = 0; $si < strlen($program); $si++)
	{
	    //echo $array[$si].'-'.$si."<br>";
	    //echo $array[03];
//	    echo $array[$si].'<br>';
//        echo $si.'<br>';

	}
	    echo $array[2].'<br>';
        echo $si.'<br>';
 
	 if ($Edit1 == "CONSULTA"){
//	     echo substr($Edit1,0,8)."<br>";
//	     echo $cod."<br>";
	     $CONT++;
		}
     }
     echo "quantidade e ".$CONT;
?>

