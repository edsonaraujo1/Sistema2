<?php

/**
 * @author holodek
 * @copyright 2009
 */

$Edit5 = "01/09/2001";
$Edit27 = "5";
$Edit28 = "2001";

/*
  ----------------------------------------
  Funcao para Verificar se o Socio 
  atingiu o tempo de ser Remido e
  verificar se o pagamento do Socio
  esta em Dia...
  ----------------------------------------
*/

$anosoc = substr("$Edit5", 6, 4);

$hoje   = date("Y");

$v_FIM = $hoje - $anosoc;

if ($v_FIM >= 20)
{
?>	
	<SCRIPT LANGUAGE='JavaScript'>
	<!--
	alert("Socio consta como REMIDO !");
	//-->
	</script>
<?
}
else	
{
	
$DATASIST = date("d/m/Y");
$PGSOC = SubtraiData("$DATASIST", 91, 0, 0);

$MDT = "00/00";
Switch ($Edit27)
{
	Case "01":
	     $MDT = "30/01";
	     break;

	Case "02":
	     $MDT = "30/02";
	     break;

	Case "03":
	     $MDT = "30/03";
	     break;

	Case "04":
	     $MDT = "30/04";
	     break;
	
	Case "05":
	     $MDT = "30/05";
	     break;

	Case "06":
	     $MDT = "30/06";
	     break;
	
	Case "07":
	     $MDT = "30/07";
	     break;

	Case "08":
	     $MDT = "30/08";
	     break;
	
	Case "09":
	     $MDT = "30/09";
	     break;

	Case 10:
	     $MDT = "30/10";
	     break;
	
	Case 11:
	     $MDT = "30/11";
	     break;
	
	Case 12:
	     $MDT = "30/12";
	     break;

}
$ADT = "0000";
Switch ($Edit28)
{
	Case "1999":
	     $ADT = "/1999";
	     break;

	Case "2000":
	     $ADT = "/2000";
	     break;

	Case "2001":
	     $ADT = "/2001";
	     break;

	Case "2002":
	     $ADT = "/2002";
	     break;
	
	Case "2003":
	     $ADT = "/2003";
	     break;

	Case "2004":
	     $ADT = "/2004";
	     break;
	
	Case "2005":
	     $ADT = "/2005";
	     break;

	Case "2006":
	     $ADT = "/2006";
	     break;
	
	Case "2007":
	     $ADT = "/2007";
	     break;

	Case "2008":
	     $ADT = "/2008";
	     break;
	
	Case 2009:
	     $ADT = "/2009";
	     break;
	
	Case 2010:
	     $ADT = "/2010";
	     break;

}

$CER_VO = TRIM($MDT.$ADT);

if ($CER_VO == "00/000000")
{
   $CERTO = "00/00/0000";
}
	else
{
		$CERTO = SubtraiData("$CER_VO", 0, 0, 0);
	
}

$CERTO = SubtraiData("$CER_VO", 0, 0, 0);

$CERTO_dia = substr("$CERTO", 0, 2); 
$CERTO_mes = substr("$CERTO", 3, 2); 
$CERTO_ano = substr("$CERTO", 8, 2); 

$_ts1 = mktime(0,0,0,$CERTO_mes,$CERTO_dia,$CERTO_ano);
$CERTO_fim = date('m/d/Y',$_ts1);

$PGSOC_dia = substr("$PGSOC", 0, 2);   
$PGSOC_mes = substr("$PGSOC", 3, 2);   
$PGSOC_ano = substr("$PGSOC", 8, 2);   

$_ts2 = mktime(0,0,0,$PGSOC_mes,$PGSOC_dia,$PGSOC_ano);
$PGSOC_fim = date('m/d/Y',$_ts2);

if ($CERTO_ano == date('Y'))
{
	
	}
	else
	{
    if ($PGSOC >= $CERTO)
    {
    	qtd_mes_x($Edit27,$Edit28);
	   ?>	
		<SCRIPT LANGUAGE='JavaScript'>
		<!--
		// alert("Socio Atrazado com PAGAMENTO !!!");
		//-->
		</script>
		<?	
	    $pagto = 0;
    }
		
	}
    if ($PGSOC_ano >= $CERTO_ano)
    {
    	if ($PGSOC_mes >= $CERTO_mes)
    	{
    		qtd_mes_x($Edit27,$Edit28);
	    $pagto = 0;
		}
    }
	
}

// Função Soma Quantidade de meses em atraso
function qtd_mes_x($mesz,$anoz)
{
	$qtd1    = 0;
	$faz     = 0;
	$som_qtd = 0;
	$i_mes1  = $mesz;
	$i_ano1  = $anoz;
	
	if ($i_ano1 == 0)
	{
	   ?>	
		<SCRIPT LANGUAGE='JavaScript'>
		<!--
		alert("RECÉM CADASTRADO OU NA CARÊNCIA                  \n VERIFIQUE DATA DE INCLUSÃO");
		//-->
		</script>
		<?
		}
			else
		{
			While($i_mes1 <= 12 and $i_ano1 <= date("Y"))
			{
				$i_mes1++;
				$qtd1++;
				$som_qtd++;
				if ($i_mes1 > 12)
				{
					$i_mes1 = 1;
					$i_ano1++;
				}
				if ($i_ano1 == date("Y"))
				{
					if($i_mes1 == date("m"))
					{
						$valor_2 = $som_qtd * 5.00;
						if($som_qtd >= 6)
						{
						   ?>	
							<SCRIPT LANGUAGE='JavaScript'>
							<!--
							alert("Socio ATRASADO COM PAGAMENTO, acertar no CAIXA ! \n Quantidade de <?=$som_qtd;?> Mensalidades atrasada num total de \n R$ <?=$valor_2;?>,00 Reais !!!");
							//-->
							</script>
							<?
							}
								else
							{
								   ?>	
									<SCRIPT LANGUAGE='JavaScript'>
									<!--
									alert("Socio ATRASADO COM PAGAMENTO, acertar no CAIXA ! \n Quantidade de <?=$som_qtd;?> Mensalidades atrasada num total de \n R$ <?=$valor_2;?>,00 Reais !!!");
									//-->
									</script>
									<?
									
						}
					}
				}
			}
			
		
	}
}
/*
  ---------------------------
  Função para Subtrair Data
  ---------------------------
*/

function SubtraiData($data, $dias, $meses, $ano)
{
   //passe a data no formato dd/mm/yyyy 
   $data = explode("/", $data);
   $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] - $meses,
    $data[0] - $dias, $data[2] - $ano) );
   return $newData;
}

/*
  ------------------------
  Função para Somar Data
  ------------------------
*/

function SomarData($data, $dias, $meses, $ano)
{
   //passe a data no formato dd/mm/yyyy 
   $data = explode("/", $data);
   $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses,
    $data[0] + $dias, $data[2] + $ano) );
   return $newData;
}



?>