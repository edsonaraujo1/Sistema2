<?

/* Funcoes para haver nao cache */
  header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
  header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
  header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
  header ("Pragma: no-cache");                          
/* Fim */

$host = "localhost";
$user = "root";
$senha = "1234";
$dbname = "Cadastro";

//conecta ao banco de dados
mysql_connect($host, $user, $senha)
  or die("Não foi possível conectar-se com o banco de dados");

//seleciona o banco de dados
mysql_select_db($dbname)
  or die("Não foi possível conectar-se com o banco de dados");


//inclui o arquivo de conexão com o banco de dados

//cria a tabela no db senão retorna a mensagem "não foi possívelcriar a tabela"
mysql_query("CREATE TABLE login (
nome VARCHAR(25) NOT NULL,
senha VARCHAR (15) NOT NULL
)") or die ("não foi possível criar as tabelas");
?>