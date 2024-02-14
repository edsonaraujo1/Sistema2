<?php

/**
 * @author holodek
 * @copyright 2011
 */

$cont_rec  = 0;
$val_soma1 = 0;
$val_soma2 = 0;

	for ($iv_t = 289; $iv_t < 500; $iv_t++){
		
	    if($iv_t < 10){
	    	$i_conp == "00";
	    }
	    if($iv_t >= 10 and $iv_t < 100){
	    	$i_conp == "0";
	    }
	    if($iv_t >= 100 and $iv_t < 1000){
	    	$i_conp == "";
	    }
	    $i_sequenc = $i_conp.$iv_t;
	
		$linha = @file("txt/CBR64".trim($i_sequenc).".RET");
		
		$total = count($linha);
		
		for ($si = 0; $si < $total; $si++ ){
			
			list($dados1,$dados2,$dados3,$dados4,$dados5,) = explode("\t", $linha[$si]);
		
			// Manupula Dados
			
            
			// Pagamentos de Conf/Assist
			if(substr($dados1,31,7) == "2847232"){
			    $contri_sun++;
				$cont_rec++;
				 
			echo substr($dados1,31,7)."<br>";
			echo substr($dados1,46,16)."<br>";
			//echo substr($dados1,254,12)."<br>";
			//echo substr($dados1,306,12)."<br>";
			//echo $dados3."<br>";
			 
            $val_soma1 = $val_soma1 + intval(substr($dados1,254,12));
            $val_soma2 = $val_soma2 + intval(substr($dados1,306,12));


			$ivVALORa       = substr($dados1,254,12);
			$ivV2a          = substr($ivVALORa,0,10);
			$ivV1a          = substr($ivVALORa,10,2);
			$ivVALORa       = $ivV2a.".".$ivV1a;
			    
			echo $ivVALORa."<br>"; 
				 
			
			$ivVALORb       = substr($dados1,306,12);
			$ivV2b          = substr($ivVALORb,0,10);
			$ivV1b          = substr($ivVALORb,10,2);
			$ivVALORb       = $ivV2b.".".$ivV1b;
			    
			echo $ivVALORb."<br>"; 

            echo "<br>";
                }
}                
}

			$ivVALORc       = substr($val_soma1,0,12);
			$ivV2c          = substr($ivVALORc,0,6);
			$ivV1c          = substr($ivVALORc,6,2);
			$ivVALORc       = $ivV2c.".".$ivV1c;


			$ivVALORd       = substr($val_soma2,0,12);
			$ivV2d          = substr($ivVALORd,0,6);
			$ivV1d          = substr($ivVALORd,6,2);
			$ivVALORd       = $ivV2d.".".$ivV1d;

echo $ivVALORc."<br>";
echo $ivVALORd."<br>";
echo "Nº Registros  ".$cont_rec;

?>