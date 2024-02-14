<?
/*
 ----------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Salvar info. digitadas em Sessao Soc
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

// Salva Sessao
session_name("Val_Socio");
session_start();
if (!empty($Var_1)) {    $Edit1  = $Var_1;   }else{	$Edit1   = $_SESSION['cod'];}
if (!empty($Var_2)) {    $Edit2  = $Var_2;   }else{	$Edit2   = $_SESSION['nu'];} 
if (!empty($Var_3)) {    $Edit3  = $Var_3;   }else{	$Edit3   = $_SESSION['rgassoc'];}
if (!empty($Var_4)) {    $Edit4  = Trim($Var_4);   }else{	$Edit4   = Trim($_SESSION['cpf']);}
if (!empty($Var_5)) {    $Edit5  = $Var_5;   }else{	$Edit5   = $_SESSION['datinsc'];}
if (!empty($Var_6)) {    $Edit6  = $Var_6;   }else{	$Edit6   = $_SESSION['dat2'];}
if (!empty($Var_7)) {    $Edit7  = $Var_7;   }else{	$Edit7   = $_SESSION['dat3'];}
if (!empty($Var_8)) {    $Edit8  = $Var_8;   }else{	$Edit8   = $_SESSION['sede'];}
if (!empty($Var_9)) {    $Edit9  = $Var_9;   }else{	$Edit9   = $_SESSION['categoria'];}
if (!empty($Var_10)){    $Edit10 = $Var_10;  }else{	$Edit10  = $_SESSION['codedif'];}
if (!empty($Var_11)){    $Edit11 = $Var_11;  }else{	$Edit11  = $_SESSION['nomeassoc'];}
if (!empty($Var_12)){    $Edit12 = $Var_12;  }else{	$Edit12  = $_SESSION['rua'];}
if (!empty($Var_13)){    $Edit13 = $Var_13;  }else{	$Edit13  = $_SESSION['endresid'];}
if (!empty($Var_14)){    $Edit14 = $Var_14;  }else{	$Edit14  = $_SESSION['numero'];}
if (!empty($Var_15)){    $Edit15 = $Var_15;  }else{	$Edit15  = $_SESSION['bairrores'];}
if (!empty($Var_16)){    $Edit16 = Trim($Var_16);  }else{	$Edit16  = Trim($_SESSION['cepres']);}
if (!empty($Var_17)){    $Edit17 = $Var_17;  }else{	$Edit17  = $_SESSION['cidaderes'];}
if (!empty($Var_18)){    $Edit18 = $Var_18;  }else{	$Edit18  = $_SESSION['estadores'];}
if (!empty($Var_19)){    $Edit19 = Trim($Var_19);   }else{	$Edit19  = Trim($_SESSION['telefone']);}
if (!empty($Var_20)){    $Edit20 = $Var_20;  }else{	$Edit20  = $_SESSION['carttrab'];}
if (!empty($Var_21)){    $Edit21 = $Var_21;  }else{	$Edit21  = $_SESSION['serie'];}
if (!empty($Var_22)){    $Edit22 = $Var_22;  }else{	$Edit22  = $_SESSION['emiscart'];}
if (!empty($Var_23)){    $Edit23 = $Var_23;  }else{	$Edit23  = $_SESSION['cargoassoc'];}
if (!empty($Var_24)){    $Edit24 = $Var_24;  }else{	$Edit24  = $_SESSION['datadimis'];}
if (!empty($Var_25)){    $Edit25 = $Var_25;  }else{	$Edit25  = $_SESSION['estcivil'];}
if (!empty($Var_26)){    $Edit26 = $Var_26;  }else{	$Edit26  = $_SESSION['numdep'];}
if (!empty($Var_27)){    $Edit27 = $Var_27;  }else{	$Edit27  = $_SESSION['mes'];}
if (!empty($Var_28)){    $Edit28 = $Var_28;  }else{	$Edit28  = $_SESSION['ano'];}
if (!empty($Var_29)){    $Edit29 = $Var_29;  }else{	$Edit29  = $_SESSION['cad_si'];}
if (!empty($Var_30)){    $Edit30 = $Var_30;  }else{	$Edit30  = $_SESSION['saldo'];}
if (!empty($Var_31)){    $Edit31 = $Var_31;  }else{	$Edit31  = $_SESSION['prest'];}
if (!empty($Var_32)){    $Edit32 = $Var_32;  }else{	$Edit32  = $_SESSION['pago'];}
if (!empty($Var_33)){    $Edit33 = $Var_33;  }else{	$Edit33  = $_SESSION['natural'];}
if (!empty($Var_34)){    $Edit34 = $Var_34;  }else{	$Edit34  = $_SESSION['datnasc'];}
if (!empty($Var_35)){    $Edit35 = $Var_35;  }else{	$Edit35  = $_SESSION['nascion'];}
if (!empty($Var_36)){    $Edit36 = $Var_36;  }else{	$Edit36  = $_SESSION['pai'];}
if (!empty($Var_37)){    $Edit37 = $Var_37;  }else{	$Edit37  = $_SESSION['mae'];}
if (!empty($Var_38)){    $Edit38 = $Var_38;  }else{	$Edit38  = $_SESSION['conjuge'];}
if (!empty($Var_39)){    $Edit39 = $Var_39;  }else{	$Edit39  = $_SESSION['datconj'];}
if (!empty($Var_40)){    $Edit40 = $Var_40;  }else{	$Edit40  = $_SESSION['filho01'];}
if (!empty($Var_41)){    $Edit41 = $Var_41;  }else{	$Edit41  = $_SESSION['dat01'];}
if (!empty($Var_42)){    $Edit42 = $Var_42;  }else{	$Edit42  = $_SESSION['sexo01'];}
if (!empty($Var_43)){    $Edit43 = $Var_43;  }else{	$Edit43  = $_SESSION['filho02'];}
if (!empty($Var_44)){    $Edit44 = $Var_44;  }else{	$Edit44  = $_SESSION['dat02'];}
if (!empty($Var_45)){    $Edit45 = $Var_45;  }else{	$Edit45  = $_SESSION['sexo02'];}
if (!empty($Var_46)){    $Edit46 = $Var_46;  }else{	$Edit46  = $_SESSION['filho03'];}
if (!empty($Var_47)){    $Edit47 = $Var_47;  }else{	$Edit47  = $_SESSION['dat03'];}
if (!empty($Var_48)){    $Edit48 = $Var_48;  }else{	$Edit48  = $_SESSION['sexo03'];}
if (!empty($Var_49)){    $Edit49 = $Var_49;  }else{	$Edit49  = $_SESSION['filho04'];}
if (!empty($Var_50)){    $Edit50 = $Var_50;  }else{	$Edit50  = $_SESSION['dat04'];}
if (!empty($Var_51)){    $Edit51 = $Var_51;  }else{	$Edit51  = $_SESSION['sexo04'];}
if (!empty($Var_52)){    $Edit52 = $Var_52;  }else{	$Edit52  = $_SESSION['filho05'];}
if (!empty($Var_53)){    $Edit53 = $Var_53;  }else{	$Edit53  = $_SESSION['dat05'];}
if (!empty($Var_54)){    $Edit54 = $Var_54;  }else{	$Edit54  = $_SESSION['sexo05'];}
if (!empty($Var_55)){    $Edit55 = $Var_55;  }else{	$Edit55  = $_SESSION['filho06'];}
if (!empty($Var_56)){    $Edit56 = $Var_56;  }else{	$Edit56  = $_SESSION['dat06'];}
if (!empty($Var_57)){    $Edit57 = $Var_57;  }else{	$Edit57  = $_SESSION['sexo06'];}
if (!empty($Var_58)){    $Edit58 = $Var_58;  }else{	$Edit58  = $_SESSION['filho07'];}
if (!empty($Var_59)){    $Edit59 = $Var_59;  }else{	$Edit59  = $_SESSION['dat07'];}
if (!empty($Var_60)){    $Edit60 = $Var_60;  }else{	$Edit60  = $_SESSION['sexo07'];}
if (!empty($Var_61)){    $Edit61 = $Var_61;  }else{	$Edit61  = $_SESSION['filho08'];}
if (!empty($Var_62)){    $Edit62 = $Var_62;  }else{	$Edit62  = $_SESSION['dat08'];}
if (!empty($Var_63)){    $Edit63 = $Var_63;  }else{	$Edit63  = $_SESSION['sexo08'];}
if (!empty($Var_64)){    $Edit64 = $Var_64;  }else{	$Edit64  = $_SESSION['filho09'];}
if (!empty($Var_65)){    $Edit65 = $Var_65;  }else{	$Edit65  = $_SESSION['dat09'];}
if (!empty($Var_66)){    $Edit66 = $Var_66;  }else{	$Edit66  = $_SESSION['sexo09'];}
if (!empty($Var_67)){    $Edit67 = $Var_67;  }else{	$Edit67  = $_SESSION['filho10'];}
if (!empty($Var_68)){    $Edit68 = $Var_68;  }else{	$Edit68  = $_SESSION['dat10'];}
if (!empty($Var_69)){    $Edit69 = $Var_69;  }else{	$Edit69  = $_SESSION['sexo10'];}
if (!empty($Var_70)){    $Edit70 = $Var_70;  }else{	$Edit70  = $_SESSION['obs'];}

$_SESSION['cod']      	= $Edit1;
$_SESSION['nu']      	= $Edit2; 
$_SESSION['rgassoc']    = $Edit3;
$_SESSION['cpf']      	= Trim($Edit4);
$_SESSION['datinsc']    = $Edit5;
$_SESSION['dat2']      	= $Edit6;
$_SESSION['dat3']      	= $Edit7;
$_SESSION['sede']      	= $Edit8;
$_SESSION['categoria']  = $Edit9;
$_SESSION['codedif']    = $Edit10;
$_SESSION['nomeassoc']  = $Edit11;
$_SESSION['rua']      	= $Edit12;
$_SESSION['endresid']   = $Edit13;
$_SESSION['numero']     = $Edit14;
$_SESSION['bairrores']  = $Edit15;
$_SESSION['cepres']     = trim($Edit16);
$_SESSION['cidaderes']  = $Edit17;
$_SESSION['estadores']  = $Edit18;
$_SESSION['telefone']   = Trim($Edit19);
$_SESSION['carttrab']   = $Edit20;
$_SESSION['serie']      = $Edit21;
$_SESSION['emiscart']   = $Edit22;
$_SESSION['cargoassoc'] = $Edit23;
$_SESSION['datadimis']  = $Edit24;
$_SESSION['estcivil']   = $Edit25;
$_SESSION['numdep']     = $Edit26;
$_SESSION['mes']      	= $Edit27;
$_SESSION['ano']      	= $Edit28;
$_SESSION['cad_si']     = $Edit29;
$_SESSION['saldo']      = $Edit30;
$_SESSION['prest']      = $Edit31;
$_SESSION['pago']       = $Edit32;
$_SESSION['natural']    = $Edit33;
$_SESSION['datnasc']    = $Edit34;
$_SESSION['nascion']    = $Edit35;
$_SESSION['pai']      	= $Edit36;
$_SESSION['mae']        = $Edit37;
$_SESSION['conjuge']    = $Edit38;
$_SESSION['datconj']    = $Edit39;
$_SESSION['filho01']    = $Edit40;
$_SESSION['dat01']      = $Edit41;
$_SESSION['sexo01']     = $Edit42;
$_SESSION['filho02']    = $Edit43;
$_SESSION['dat02']      = $Edit44;
$_SESSION['sexo02']     = $Edit45;
$_SESSION['filho03']    = $Edit46;
$_SESSION['dat03']      = $Edit47;
$_SESSION['sexo03']     = $Edit48;
$_SESSION['filho04']    = $Edit49;
$_SESSION['dat04']      = $Edit50;
$_SESSION['sexo04']     = $Edit51;
$_SESSION['filho05']    = $Edit52;
$_SESSION['dat05']      = $Edit53;
$_SESSION['sexo05']     = $Edit54;
$_SESSION['filho06']    = $Edit55;
$_SESSION['dat06']      = $Edit56;
$_SESSION['sexo06']     = $Edit57;
$_SESSION['filho07']    = $Edit58;
$_SESSION['dat07']      = $Edit59;
$_SESSION['sexo07']     = $Edit60;
$_SESSION['filho08']    = $Edit61;
$_SESSION['dat08']      = $Edit62;
$_SESSION['sexo08']     = $Edit63;
$_SESSION['filho09']    = $Edit64;
$_SESSION['dat09']      = $Edit65;
$_SESSION['sexo09']     = $Edit66;
$_SESSION['filho10']    = $Edit67;
$_SESSION['dat10']      = $Edit68;
$_SESSION['sexo10']     = $Edit69;
$_SESSION['obs']        = $Edit70;


require("menu.php");
include("soclayout2.php");

?>