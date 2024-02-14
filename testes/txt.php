<?php

/**
 * @author holodek
 * @copyright 2010
 */
 
$dia_semana  = strftime("%A");
$dia_sem_mes = strftime("%B");

// Converte Dia da Semana Ingles Portugues
if (strftime("%A") == "Sunday")   { $dia_semana = "Domingo"; }
if (strftime("%A") == "Monday")   { $dia_semana = "Segunda-feira"; }
if (strftime("%A") == "Tuesday")  { $dia_semana = "Terça-feira"; }
if (strftime("%A") == "Wednesday"){ $dia_semana = "Quarta-feira"; }
if (strftime("%A") == "Thursday") { $dia_semana = "Quinta-feira"; }
if (strftime("%A") == "Friday")   { $dia_semana = "Sexta-feira"; }
if (strftime("%A") == "Saturday") { $dia_semana = "Sabado"; }

echo $dia_semana."<br><br>";

if ($dia_semana == "Sabado" or $dia_semana == "Domingo"){
	
    exit;
	
}else{ 
 
    echo "dia normal <br><br>";
} 

$nHora1       = date('H:i:m');
$nHora_inicio = '08:30';
$nHora_fim    = '18:30';

if (strtotime($nHora1) > strtotime($nHora_fim)){
	
	echo "vc nao tem permissoa de uso despois do horario<br> ";
    exit;
}

if (strtotime($nHora1) < strtotime($nHora_inicio)){
	
	echo "vc nao tem permissoa de uso antes do horario<br> ";
	exit;
}

echo "horario normal de uso <br><br><br>";
$nome2 = "edson";

			$nome_arq3    = $nome2;
			
			$arq          = $nome_arq3."xhtintxp";
			$date         = date('m/d/Y');
			$hora         = date('H:i:s');
			$ippc         = trim($_SERVER['REMOTE_ADDR']);
			$eli_rg2      = str_replace(".","",$ippc);
			$num_java1    = trim(substr($eli_rg2,2,1).substr($eli_rg2,4,1).substr($eli_rg2,8,1));
			$num_java2    = trim(substr($eli_rg2,7,1)); 
			$num_java     = $num_java1.$num_java2;
			$cont         = $num_java;
			
			if(file_exists("usuarios/$arq.txt")){

				$arquivo = fopen("usuarios/$arq.txt","r");
				$while = fread($arquivo,filesize("usuarios/$arq.txt"));
				fclose($arquivo);
			
			    $linha  = file("usuarios/$arq.txt");
		
				$total  = count($linha);
				for ($i = "0"; $i < $total; $i++){
				     list($dado1) = explode(" ",$linha[$i]);
				}


			    echo "Aqui exite<br>...meu codigo e  dado1...".$dado1;
				
				// 
			}else{
				
				$criar = fopen("usuarios/$arq.txt", "w");
				$permissao = chmod("usuarios/$arq.txt", 0777);
				$abrir = fopen("usuarios/$arq.txt","w");
				fwrite($abrir,$num_java);
				fclose($abrir);

			    echo "Aqui nao exite Criado<br>...meu codigo e ".$num_java;

			}
?>