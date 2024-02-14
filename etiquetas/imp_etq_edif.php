<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Imprimir Etiquetas
 Criado em Data.....: 23/03/2008
 Ultima Atualização : 23/03/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

include_once("../logar.php");

//include("../index.php");

$nome3 = $_SESSION["nome_log"];

// Resgata Sessao
session_name("Val_Etq_Edif");
session_start();

$Edit1  = $_SESSION['Edit1'];
$Edit2  = $_SESSION['Edit2'];
$Edit3  = $_SESSION['Edit3']; 
$Edit4  = $_SESSION['Edit4'];
$Edit5  = $_SESSION['Edit5'];
$Edit6  = $_SESSION['Edit6'];
$Edit7  = $_SESSION['Edit7'];
$receber  = $_SESSION['Edit8'];

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Limpar tabela etiquetas

$consulta = "TRUNCATE TABLE `etiquetas_edif`";

@mysql_query($consulta, $link);

$consulta2 = "TRUNCATE TABLE `etiquetas_adms`";

@mysql_query($consulta2, $link);

$consulta3 = "TRUNCATE TABLE `etiquetas_socios`";

@mysql_query($consulta3, $link);


$consulta4 = "TRUNCATE TABLE `etiquetas_fena`";

@mysql_query($consulta4, $link);


$consulta5 = "TRUNCATE TABLE `etiquetas_lorival`";

@mysql_query($consulta5, $link);

// Transportar dados para etiquetas_edif

Switch ($receber){
	

	Case 0:

        include("../config.php");    

        
		die("<style type=text/css>
		    <!--
		
		    body { background-image: url('../$logo_sis');}
		
		    .style6{
			
			color: #336699;
			font-family: Verdana, Arial;
			font-weight: bold;
		    }	
		
		    -->
		    </style>
		
			
		     <br>
		     <br>
		     <body>
			 <div align=center>
		     
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Opção não Selecionada !!! ***</b>
		     <table align=center>
		     <form method='POST' action='javascript:window.close()'>
		     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div></body>");

	exit;

	Case 1: // Etiquetas Empresas


        Switch ($Edit1){

        CASE "CODIGO":  // Order de Codigo
        
             $consulta1  = "INSERT INTO etiquetas_edif SELECT * FROM edificios WHERE COD >= '$Edit2' and COD <= '$Edit3'";

			 @mysql_query($consulta1, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_edif.php");
			 break;

        CASE "ATIVIDADE":
        
             $consulta1  = "INSERT INTO etiquetas_edif SELECT * FROM edificios WHERE ATIV >= '$Edit2' and ATIV <= '$Edit3'";

			 @mysql_query($consulta1, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_edif.php");
			 break;

        CASE "NOME":
        
             $consulta1  = "INSERT INTO etiquetas_edif SELECT * FROM edificios WHERE NOME >= '$Edit2' and NOME <= '$Edit3' and ATIV = '$Edit4' ORDER BY NOME";

			 @mysql_query($consulta1, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_edif.php");
			 break;

        CASE "ENDEREÇO":
        
             $consulta1  = "INSERT INTO etiquetas_edif SELECT * FROM edificios WHERE ENDERECO = '$Edit2' and ENDERECO <= '$Edit3' and ATIV = '$Edit4'";

			 @mysql_query($consulta1, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_edif.php");
			 break;

        CASE "CEP":
        
             $consulta1  = "INSERT INTO etiquetas_edif SELECT * FROM edificios WHERE CEP >= '$Edit2' and CEP <= '$Edit3' and ATIV = '$Edit4'";

			 @mysql_query($consulta1, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_edif.php");
			 break;
        
        }
        break;

	Case 2: // Etiquetas Socios


        Switch ($Edit1){

        CASE "MATRICULA":  // Order de Codigo

             if ($Edit4 == "CONTRIBUINTE"){
             	$Edit4 = "C";
             }

//echo $Edit2."<br>";
//echo $Edit3."<br>";
//echo $Edit4;

		     $consulta1  = "INSERT INTO etiquetas_socios SELECT * FROM socios WHERE CODP >= '$Edit2' and CODP <= '$Edit3' and CATEGORIA = '$Edit4'";
		
			 @mysql_query($consulta1, $link);
				
			 session_start();
				
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
				
			 include("Label_socios.php");
			 break;
			 
        CASE "NOME":

             if ($Edit4 == "CONTRIBUINTE"){
             	$Edit4 = "C";
             }
        
		     $consulta1  = "INSERT INTO etiquetas_socios SELECT * FROM socios WHERE NOMEASSOC >= '$Edit2' and NOMEASSOC <= '$Edit3' and CATEGORIA = '$Edit4'";

			 @mysql_query($consulta1, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_socios.php");
			 break;

        CASE "CEP":
        
             if ($Edit4 == "CONTRIBUINTE"){
             	$Edit4 = "C";
             }
		     $consulta1  = "INSERT INTO etiquetas_socios SELECT * FROM socios WHERE CEPRES >= '$Edit2' and CEPRES <= '$Edit3' and CATEGORIA = '$Edit4'";

			 @mysql_query($consulta1, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_socios.php");
			 break;
			 
        }
        break;

	Case 3: // Etiquetas Adms

        Switch ($Edit1){

        CASE "CODIGO":  // Order de Codigo

	         $consulta1  = "INSERT INTO etiquetas_adms SELECT * FROM adms WHERE cod >= '$Edit2' and cod <= '$Edit3' and ativa != 'SINDICATO' and ativa != 'NAO ATIVA'";
	
			 @mysql_query($consulta1, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_adms.php");
			 break;

        CASE "NOME":  // Order de Codigo

	         $consulta1  = "INSERT INTO etiquetas_adms SELECT * FROM adms WHERE nomeadm >= '$Edit2' and nomeadm <= '$Edit3' and ativa != 'SINDICATO' and ativa != 'NAO ATIVA'";
	
			 @mysql_query($consulta1, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_adms.php");
			 break;

        CASE "CEP":  // Order de Cep

	         $consulta1  = "INSERT INTO etiquetas_adms SELECT * FROM adms WHERE cep >= '$Edit2' and cep <= '$Edit3' and ativa != 'SINDICATO' and ativa != 'NAO ATIVA'";
	
			 @mysql_query($consulta1, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_adms.php");
			 break;

        }
        break;


	Case 4: // Etiquetas Fenatec

        Switch ($Edit1){

        CASE "CODIGO":  // Order de Codigo

	         $consulta4  = "INSERT INTO etiquetas_fena SELECT * FROM fenatec WHERE Edit1 >= '$Edit2' and Edit1 <= '$Edit3'";
	
			 @mysql_query($consulta4, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_fena.php");
			 break;

        CASE "NOME":  // Order de Nome

	         $consulta4  = "INSERT INTO etiquetas_fena SELECT * FROM fenatec WHERE Edit5 >= '$Edit2' and Edit5 <= '$Edit3'";
	
			 @mysql_query($consulta4, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_fena.php");
			 break;

        CASE "CEP":  // Order de CEP

	         $consulta4  = "INSERT INTO etiquetas_fena SELECT * FROM fenatec WHERE Edit9 >= '$Edit2' and Edit9 <= '$Edit3'";
	
			 @mysql_query($consulta4, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_fena.php");
			 break;

        }
        break;


	Case 5: // Etiquetas Lorival


        Switch ($Edit1){

        CASE "CODIGO":  // Order de Codigo

             if ($Edit4 == "CONTRIBUINTE"){
             	$Edit4 = "C";
             }

		     $consulta5  = "INSERT INTO etiquetas_lorival SELECT * FROM atendimento_soc WHERE COD >= '$Edit2' and COD <= '$Edit3'";
		
			 @mysql_query($consulta5, $link);
				
			 session_start();
				
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
				
			 include("Label_lorival.php");
			 break;
			 
        CASE "NOME":

             if ($Edit4 == "CONTRIBUINTE"){
             	$Edit4 = "C";
             }
        
		     $consulta5  = "INSERT INTO etiquetas_lorival SELECT * FROM atendimento_soc WHERE NOMEASSOC >= '$Edit2' and NOMEASSOC <= '$Edit3'";

			 @mysql_query($consulta5, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_lorival.php");
			 break;

        CASE "CEP":
        
             if ($Edit4 == "CONTRIBUINTE"){
             	$Edit4 = "C";
             }
		     $consulta5  = "INSERT INTO etiquetas_lorival SELECT * FROM atendimento_soc WHERE CEPRES >= '$Edit2' and CEPRES <= '$Edit3'";

			 @mysql_query($consulta5, $link);
			
			 session_start();
			
			 unset ($_SESSION['Edit1']);
			 unset ($_SESSION['Edit2']);
			 unset ($_SESSION['Edit3']);
			 unset ($_SESSION['Edit4']);
			 unset ($_SESSION['Edit5']);
			 unset ($_SESSION['Edit6']);
			 unset ($_SESSION['Edit7']);
			 unset ($_SESSION['Edit8']);
			
			 include("Label_lorival.php");
			 break;
			 
        }
        break;


}
?>