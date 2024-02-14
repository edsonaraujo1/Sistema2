<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: criptografia e descriptografia de dados com chave de 128 bits
 Criado em Data.....: 09/09/2010
 Ultima Atualização : 09/09/2010 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

include( 'aes.class.php');

$key = AES::keygen( AES::KEYGEN_128_BITS, "htwextvghig" );

$aes = new AES( $key );


// Cofigicando.

$host = "http://www.sindificios.com.br/index.htm";
$user = "root";
$pass = "12345";
$db   = "bancodados";


$crip_host = $aes->encrypt( $host );
$crip_user = $aes->encrypt( $user );
$crip_pass = $aes->encrypt( $pass );
$crip_db   = $aes->encrypt( $db );


// Chave simétrica gerada de 128 bits
echo "Chave Simétrica 128 bits: ".$key."<br>";

echo "<b>Host criptografado: </b>".base64_encode($crip_host)."<br>";
echo "<b>User criptografado: </b>".base64_encode($crip_user)."<br>";
echo "<b>Pass criptografado: </b>".base64_encode($crip_pass)."<br>";
echo "<b>db criptografado: </b>".base64_encode($crip_db)."<br><br><br>";

// Decodificando a string.

$decrp_host = $aes->decrypt( $crip_host );
$decrp_user = $aes->decrypt( $crip_user );
$decrp_pass = $aes->decrypt( $crip_pass );
$decrp_db   = $aes->decrypt( $crip_db );


echo "<b>Host descriptografado: </b>".$decrp_host."<br>";
echo "<b>User descriptografado: </b>".$decrp_user."<br>";
echo "<b>Pass descriptografado: </b>".$decrp_pass."<br>";
echo "<b>db descriptografado: </b>".$decrp_db."<br>";



?>
