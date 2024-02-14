<?
/*
 -------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Acesso e Segurança
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -------------------------------------------
*/

/*
  ----------------------------------------
  Função para Verificar Senha e Nome do
  usuario na entrada do Sistema
  ----------------------------------------

*/

include("../config.php");

/*
  -----------------------
  Função para Verificar o
  CNPJ e Valido
  -----------------------
*/

?>  

<script language="JavaScript">
<!-- Begin

function validaCNPJ(Campo2)
{
CNPJ = Campo2.value;
erro = new String;
if (CNPJ.length < 18) erro += "E' necessarios preencher corretamente o numero do CNPJ! \n\n";
if ((CNPJ.charAt(2) != ".") || (CNPJ.charAt(6) != ".") || (CNPJ.charAt(10) != "/") || (CNPJ.charAt(15) != "-")){
if (erro.length == 0) erro += "E' necessarios preencher corretamente o numero do CNPJ! \n\n";
}
//substituir os caracteres que nao sao numeros
if(document.layers && parseInt(navigator.appVersion) == 4){
x = CNPJ.substring(0,2);
x += CNPJ.substring(3,6);
x += CNPJ.substring(7,10);
x += CNPJ.substring(11,15);
x += CNPJ.substring(16,18);
CNPJ = x; 
} else {
CNPJ = CNPJ.replace(".","");
CNPJ = CNPJ.replace(".","");
CNPJ = CNPJ.replace("-","");
CNPJ = CNPJ.replace("/","");
}
var nonNumbers = /\D/;
if (nonNumbers.test(CNPJ)) erro += "A verificacao de CNPJ suporta apenas numeros! \n\n"; 
var a = [];
var b = new Number;
var c = [6,5,4,3,2,9,8,7,6,5,4,3,2];
for (i=0; i<12; i++){
a[i] = CNPJ.charAt(i);
b += a[i] * c[i+1];
}
if ((x = b % 11) < 2) { a[12] = 0 } else { a[12] = 11-x }
b = 0;
for (y=0; y<13; y++) {
b += (a[y] * c[y]); 
}
if ((x = b % 11) < 2) { a[13] = 0; } else { a[13] = 11-x; }
if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])){
erro +="CNPJ Invalido Verifique !!!!";
}
if (erro.length > 0){
alert(erro);
return false;
} else {

if(Campo2.value.length >0)
{
window.location = "salva_session.php?Var_X="+Campo2.value;     
}

}
return true;
}
     
function validaCNPJ2(Campo2)
{
CNPJ = Campo2.value;
erro = new String;
if (CNPJ.length < 18) erro += "E' necessarios preencher corretamente o numero do CNPJ! \n\n";
if ((CNPJ.charAt(2) != ".") || (CNPJ.charAt(6) != ".") || (CNPJ.charAt(10) != "/") || (CNPJ.charAt(15) != "-")){
if (erro.length == 0) erro += "E' necessarios preencher corretamente o numero do CNPJ! \n\n";
}
//substituir os caracteres que nao sao numeros
if(document.layers && parseInt(navigator.appVersion) == 4){
x = CNPJ.substring(0,2);
x += CNPJ.substring(3,6);
x += CNPJ.substring(7,10);
x += CNPJ.substring(11,15);
x += CNPJ.substring(16,18);
CNPJ = x; 
} else {
CNPJ = CNPJ.replace(".","");
CNPJ = CNPJ.replace(".","");
CNPJ = CNPJ.replace("-","");
CNPJ = CNPJ.replace("/","");
}
var nonNumbers = /\D/;
if (nonNumbers.test(CNPJ)) erro += "A verificacao de CNPJ suporta apenas numeros! \n\n"; 
var a = [];
var b = new Number;
var c = [6,5,4,3,2,9,8,7,6,5,4,3,2];
for (i=0; i<12; i++){
a[i] = CNPJ.charAt(i);
b += a[i] * c[i+1];
}
if ((x = b % 11) < 2) { a[12] = 0 } else { a[12] = 11-x }
b = 0;
for (y=0; y<13; y++) {
b += (a[y] * c[y]); 
}
if ((x = b % 11) < 2) { a[13] = 0; } else { a[13] = 11-x; }
if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])){
erro +="CNPJ Invalido Verifique !!!!";
}
if (erro.length > 0){
alert(erro);
return false;
} else {

if(Campo2.value.length >0)
{
window.location = "salva_session_update.php?Var_X="+Campo2.value;     
}

}
return true;
}

function txtBoxFormat(objForm, strField, sMask, evtKeyPress) {
     var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;

     if(document.all) { 
       nTecla = evtKeyPress.keyCode; }
     else if(document.layers) { 
       nTecla = evtKeyPress.which;
     }

     sValue = objForm[strField].value;

     sValue = sValue.toString().replace( "-", "" );
     sValue = sValue.toString().replace( "-", "" );
     sValue = sValue.toString().replace( ".", "" );
     sValue = sValue.toString().replace( ".", "" );
     sValue = sValue.toString().replace( "/", "" );
     sValue = sValue.toString().replace( "/", "" );
     sValue = sValue.toString().replace( "(", "" );
     sValue = sValue.toString().replace( "(", "" );
     sValue = sValue.toString().replace( ")", "" );
     sValue = sValue.toString().replace( ")", "" );
     sValue = sValue.toString().replace( " ", "" );
     sValue = sValue.toString().replace( " ", "" );
     fldLen = sValue.length;
     mskLen = sMask.length;

     i = 0;
     nCount = 0;
     sCod = "";
     mskLen = fldLen;

     while (i <= mskLen) {
       bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))
       bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))

       if (bolMask) {
         sCod += sMask.charAt(i);
         mskLen++; }
       else {
         sCod += sValue.charAt(nCount);
         nCount++;
       }

       i++;
     }

     objForm[strField].value = sCod;

     if (nTecla != 8) { 
       if (sMask.charAt(i-1) == "9") { 
         return ((nTecla > 47) && (nTecla < 58)); } 
       else { 
         return true;
       } }
     else {
       return true;
     }
   }

/*
  -----------------------
  Função para Verificar o
  CNPJ e Valido em Adms
  -----------------------
*/
     
function validaCNPJ_adms(Campo2)
{
CNPJ = Campo2.value;
erro = new String;
if (CNPJ.length < 18) erro += "E' necessarios preencher corretamente o numero do CNPJ! \n\n";
if ((CNPJ.charAt(2) != ".") || (CNPJ.charAt(6) != ".") || (CNPJ.charAt(10) != "/") || (CNPJ.charAt(15) != "-")){
if (erro.length == 0) erro += "E' necessarios preencher corretamente o numero do CNPJ! \n\n";
}
//substituir os caracteres que nao sao numeros
if(document.layers && parseInt(navigator.appVersion) == 4){
x = CNPJ.substring(0,2);
x += CNPJ.substring(3,6);
x += CNPJ.substring(7,10);
x += CNPJ.substring(11,15);
x += CNPJ.substring(16,18);
CNPJ = x; 
} else {
CNPJ = CNPJ.replace(".","");
CNPJ = CNPJ.replace(".","");
CNPJ = CNPJ.replace("-","");
CNPJ = CNPJ.replace("/","");
}
var nonNumbers = /\D/;
if (nonNumbers.test(CNPJ)) erro += "A verificacao de CNPJ suporta apenas numeros! \n\n"; 
var a = [];
var b = new Number;
var c = [6,5,4,3,2,9,8,7,6,5,4,3,2];
for (i=0; i<12; i++){
a[i] = CNPJ.charAt(i);
b += a[i] * c[i+1];
}
if ((x = b % 11) < 2) { a[12] = 0 } else { a[12] = 11-x }
b = 0;
for (y=0; y<13; y++) {
b += (a[y] * c[y]); 
}
if ((x = b % 11) < 2) { a[13] = 0; } else { a[13] = 11-x; }
if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])){
erro +="CNPJ Invalido Verifique !!!!";
}
if (erro.length > 0){
alert(erro);
return false;
} else {

if(Campo2.value.length >0)
{
window.location = "salva_session_adm.php?Var_12="+Campo2.value;     
}

}
return true;
}

//**************

function validaCNPJ_adms_up(Campo2)
{
CNPJ = Campo2.value;
erro = new String;
if (CNPJ.length < 18) erro += "E' necessarios preencher corretamente o numero do CNPJ! \n\n";
if ((CNPJ.charAt(2) != ".") || (CNPJ.charAt(6) != ".") || (CNPJ.charAt(10) != "/") || (CNPJ.charAt(15) != "-")){
if (erro.length == 0) erro += "E' necessarios preencher corretamente o numero do CNPJ! \n\n";
}
//substituir os caracteres que nao sao numeros
if(document.layers && parseInt(navigator.appVersion) == 4){
x = CNPJ.substring(0,2);
x += CNPJ.substring(3,6);
x += CNPJ.substring(7,10);
x += CNPJ.substring(11,15);
x += CNPJ.substring(16,18);
CNPJ = x; 
} else {
CNPJ = CNPJ.replace(".","");
CNPJ = CNPJ.replace(".","");
CNPJ = CNPJ.replace("-","");
CNPJ = CNPJ.replace("/","");
}
var nonNumbers = /\D/;
if (nonNumbers.test(CNPJ)) erro += "A verificacao de CNPJ suporta apenas numeros! \n\n"; 
var a = [];
var b = new Number;
var c = [6,5,4,3,2,9,8,7,6,5,4,3,2];
for (i=0; i<12; i++){
a[i] = CNPJ.charAt(i);
b += a[i] * c[i+1];
}
if ((x = b % 11) < 2) { a[12] = 0 } else { a[12] = 11-x }
b = 0;
for (y=0; y<13; y++) {
b += (a[y] * c[y]); 
}
if ((x = b % 11) < 2) { a[13] = 0; } else { a[13] = 11-x; }
if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])){
erro +="CNPJ Invalido Verifique !!!!";
}
if (erro.length > 0){
alert(erro);
return false;
} else {

if(Campo2.value.length >0)
{
window.location = "salva_session_adm_up.php?Var_12="+Campo2.value;     
}

}
return true;
}




     
// Funcao Salva Sessao incluir Edificios
function Salva1(Var1)
{
     if(Var1.value.length >0)
     {
     window.location = "salva_session.php?Var_1="+Var1.value;     
	 }
}
function Salva2(Var2)
{

     if(Var2.value.length >0)
     {
     window.location = "salva_session.php?Var_2="+Var2.value;     
	 }
}
function Salva3(Var3)
{

     if(Var3.value.length >0)
     {
     window.location = "salva_session.php?Var_3="+Var3.value;     
	 }
}
function Salva4(Var4)
{

     if(Var4.value.length >0)
     {
     window.location = "salva_session.php?Var_4="+Var4.value;     
	 }
}
function Salva5(Var5)
{

     if(Var5.value.length >0)
     {
     window.location = "salva_session.php?Var_5="+Var5.value;     
	 }
}
function Salva6(Var6)
{

     if(Var6.value.length >0)
     {
     window.location = "salva_session.php?Var_6="+Var6.value;     
	 }
}
function Verifica(Cep)
{
     if(Cep.value.length >0)
     {
     window.location = "salva_session.php?Cep_2x="+Cep.value;     
     window.location = "proc_cep_edif.php?Cep_2x="+Cep.value;     
	 }
}
function Salva7(Var7)
{

     if(Var7.value.length >0)
     {
     window.location = "salva_session.php?Var_7="+Var7.value;     
	 }
}
function Salva8(Var8)
{

     if(Var8.value.length >0)
     {
     window.location = "salva_session.php?Var_8="+Var8.value;     
	 }
}
function Salva9(Var9)
{

     if(Var9.value.length >0)
     {
     window.location = "salva_session.php?Var_9="+Var9.value;     
	 }
}
function Salva10(Var10)
{

     if(Var10.value.length >0)
     {
     window.location = "salva_session.php?Var_10="+Var10.value;     
	 }
}
function Salva11(Var11)
{

     if(Var11.value.length >0)
     {
     window.location = "salva_session.php?Var_11="+Var11.value;     
	 }
}
function Salva12(Var12)
{

     if(Var12.value.length >0)
     {
     window.location = "salva_session.php?Var_12="+Var12.value;     
	 }
}
function Salva13(Var13)
{

     if(Var13.value.length >0)
     {
     window.location = "salva_session.php?Var_13="+Var13.value;     
	 }
}
function Salva14(Var14)
{

     if(Var14.value.length >0)
     {
     window.location = "salva_session.php?Var_14="+Var14.value;     
	 }
}

// Funcao Salva Sessao alterar Edificios
function Salva1x(Var1)
{
     if(Var1.value.length >0)
     {
     window.location = "salva_session_update.php?Var_1="+Var1.value;     
	 }
}
function Salva2x(Var2)
{

     if(Var2.value.length >0)
     {
     window.location = "salva_session_update.php?Var_2="+Var2.value;     
	 }
}
function Salva3x(Var3)
{

     if(Var3.value.length >0)
     {
     window.location = "salva_session_update.php?Var_3="+Var3.value;     
	 }
}
function Salva4x(Var4)
{

     if(Var4.value.length >0)
     {
     window.location = "salva_session_update.php?Var_4="+Var4.value;     
	 }
}
function Salva5x(Var5)
{

     if(Var5.value.length >0)
     {
     window.location = "salva_session_update.php?Var_5="+Var5.value;     
	 }
}
function Salva6x(Var6)
{

     if(Var6.value.length >0)
     {
     window.location = "salva_session_update.php?Var_6="+Var6.value;     
	 }
}
function Verificax(Cep)
{
     if(Cep.value.length >0)
     {
     window.location = "salva_session_update.php?Cep_2x="+Cep.value;     
     window.location = "proc_cep_edif_update.php?Cep_2x="+Cep.value;     
	 }
}
function Salva7x(Var7)
{

     if(Var7.value.length >0)
     {
     window.location = "salva_session_update.php?Var_7="+Var7.value;     
	 }
}
function Salva8x(Var8)
{

     if(Var8.value.length >0)
     {
     window.location = "salva_session_update.php?Var_8="+Var8.value;     
	 }
}
function Salva9x(Var9)
{

     if(Var9.value.length >0)
     {
     window.location = "salva_session_update.php?Var_9="+Var9.value;     
	 }
}
function Salva10x(Var10)
{

     if(Var10.value.length >0)
     {
     window.location = "salva_session_update.php?Var_10="+Var10.value;     
	 }
}
function Salva11x(Var11)
{

     if(Var11.value.length >0)
     {
     window.location = "salva_session_update.php?Var_11="+Var11.value;     
	 }
}
function Salva12x(Var12)
{

     if(Var12.value.length >0)
     {
     window.location = "salva_session_update.php?Var_12="+Var12.value;     
	 }
}
function Salva13x(Var13)
{

     if(Var13.value.length >0)
     {
     window.location = "salva_session_update.php?Var_13="+Var13.value;     
	 }
}
function Salva14x(Var14)
{

     if(Var14.value.length >0)
     {
     window.location = "salva_session_update.php?Var_14="+Var14.value;     
	 }
}


// Funcao Salva Sessao incluir Socios
function Salva1s(Var1)
{
     if(Var1.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_1="+Var1.value;     
	 }
}
function Salva2s(Var2)
{
     if(Var2.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_2="+Var2.value;     
	 }
}
function Salva3s(Var3)
{
     if(Var3.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_3="+Var3.value;     
     window.location = "soc_pes_opo.php?Rg_2x="+Var3.value;     
	 }
}
function Salva4s(Var4)
{
     if(Var4.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_4="+Var4.value;     
	 }
}
function Salva5s(Var5)
{
     if(Var5.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_5="+Var5.value;     
	 }
}
function Salva6s(Var6)
{
     if(Var6.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_6="+Var6.value;     
	 }
}
function Salva7s(Var7)
{
     if(Var7.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_7="+Var7.value;     
	 }
}
function Salva8s(Var8)
{
     if(Var8.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_8="+Var8.value;     
	 }
}
function Salva9s(Var9)
{
     if(Var9.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_9="+Var9.value;     
	 }
}
function Salva10s(Var10)
{
     if(Var10.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_10="+Var10.value;     
	 }
}
function Salva11s(Var11)
{
     if(Var11.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_11="+Var11.value;     
	 }
}
function Salva12s(Var12)
{
     if(Var12.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_12="+Var12.value;     
	 }
}
function Salva13s(Var13)
{
     if(Var13.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_13="+Var13.value;     
	 }
}
function Salva14s(Var14)
{
     if(Var14.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_14="+Var14.value;     
	 }
}
function Salva15s(Var15)
{
     if(Var15.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_15="+Var15.value;     
	 }
}
function Salva16s(Var16)
{
     if(Var16.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_16="+Var16.value;
	 window.location = "proc_cep?Cep_2x="+Var16.value;     
	 }
}
function Salva17s(Var17)
{
     if(Var17.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_17="+Var17.value;     
	 }
}
function Salva18s(Var18)
{
     if(Var18.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_18="+Var18.value;     
	 }
}
function Salva19s(Var19)
{
     if(Var19.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_19="+Var19.value;     
	 }
}
function Salva20s(Var20)
{
     if(Var20.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_20="+Var20.value;     
	 }
}
function Salva21s(Var21)
{
     if(Var21.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_21="+Var21.value;     
	 }
}
function Salva22s(Var22)
{
     if(Var22.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_22="+Var22.value;     
	 }
}
function Salva23s(Var23)
{
     if(Var23.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_23="+Var23.value;     
	 }
}
function Salva24s(Var24)
{
     if(Var24.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_24="+Var24.value;     
	 }
}
function Salva25s(Var25)
{
     if(Var25.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_25="+Var25.value;     
	 }
}
function Salva26s(Var26)
{
     if(Var26.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_26="+Var26.value;     
	 }
}
function Salva27s(Var27)
{
     if(Var27.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_27="+Var27.value;     
	 }
}
function Salva28s(Var28)
{
     if(Var28.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_28="+Var28.value;     
	 }
}
function Salva29s(Var29)
{
     if(Var29.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_29="+Var29.value;     
	 }
}
function Salva30s(Var30)
{
     if(Var30.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_30="+Var30.value;     
	 }
}
function Salva31s(Var31)
{
     if(Var31.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_31="+Var31.value;     
	 }
}
function Salva32s(Var32)
{
     if(Var32.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_32="+Var32.value;     
	 }
}
function Salva33s(Var33)
{
     if(Var33.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_33="+Var33.value;     
	 }
}
function Salva34s(Var34)
{
     if(Var34.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_34="+Var34.value;     
	 }
}
function Salva35s(Var35)
{
     if(Var35.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_35="+Var35.value;     
	 }
}
function Salva36s(Var36)
{
     if(Var36.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_36="+Var36.value;     
	 }
}
function Salva37s(Var37)
{
     if(Var37.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_37="+Var37.value;     
	 }
}
function Salva38s(Var38)
{
     if(Var38.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_38="+Var38.value;     
	 }
}
function Salva39s(Var39)
{
     if(Var39.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_39="+Var39.value;     
	 }
}
function Salva40s(Var40)
{
     if(Var40.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_40="+Var40.value;     
	 }
}
function Salva41s(Var41)
{
     if(Var41.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_41="+Var41.value;     
	 }
}
function Salva42s(Var42)
{
     if(Var42.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_42="+Var42.value;     
	 }
}
function Salva43s(Var43)
{
     if(Var43.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_43="+Var43.value;     
	 }
}
function Salva44s(Var44)
{
     if(Var44.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_44="+Var44.value;     
	 }
}
function Salva45s(Var45)
{
     if(Var45.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_45="+Var45.value;     
	 }
}
function Salva46s(Var46)
{
     if(Var46.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_46="+Var46.value;     
	 }
}
function Salva47s(Var47)
{
     if(Var47.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_47="+Var47.value;     
	 }
}
function Salva48s(Var48)
{
     if(Var48.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_48="+Var48.value;     
	 }
}
function Salva49s(Var49)
{
     if(Var49.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_49="+Var49.value;     
	 }
}
function Salva50s(Var50)
{
     if(Var50.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_50="+Var50.value;     
	 }
}
function Salva51s(Var51)
{
     if(Var51.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_51="+Var51.value;     
	 }
}
function Salva52s(Var52)
{
     if(Var52.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_52="+Var52.value;     
	 }
}
function Salva53s(Var53)
{
     if(Var53.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_53="+Var53.value;     
	 }
}
function Salva54s(Var54)
{
     if(Var54.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_54="+Var54.value;     
	 }
}
function Salva55s(Var55)
{
     if(Var55.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_55="+Var55.value;     
	 }
}
function Salva56s(Var56)
{
     if(Var56.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_56="+Var56.value;     
	 }
}
function Salva57s(Var57)
{
     if(Var57.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_57="+Var57.value;     
	 }
}
function Salva58s(Var58)
{
     if(Var58.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_58="+Var58.value;     
	 }
}
function Salva59s(Var59)
{
     if(Var59.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_59="+Var59.value;     
	 }
}
function Salva60s(Var60)
{
     if(Var60.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_60="+Var60.value;     
	 }
}
function Salva61s(Var61)
{
     if(Var61.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_61="+Var61.value;     
	 }
}
function Salva62s(Var62)
{
     if(Var62.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_62="+Var62.value;     
	 }
}
function Salva63s(Var63)
{
     if(Var63.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_63="+Var63.value;     
	 }
}
function Salva64s(Var64)
{
     if(Var64.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_64="+Var64.value;     
	 }
}
function Salva65s(Var65)
{
     if(Var65.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_65="+Var65.value;     
	 }
}
function Salva66s(Var66)
{
     if(Var66.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_66="+Var66.value;     
	 }
}
function Salva67s(Var67)
{
     if(Var67.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_67="+Var67.value;     
	 }
}
function Salva68s(Var68)
{
     if(Var68.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_68="+Var68.value;     
	 }
}
function Salva69s(Var69)
{
     if(Var69.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_69="+Var69.value;     
	 }
}
function Salva70s(Var70)
{
     if(Var70.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_70="+Var70.value;     
	 }
}


// Funcao Salva Sessao Alteracao Socios
function Salva1u(Var1)
{
     if(Var1.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_1="+Var1.value;     
	 }
}
function Salva2u(Var2)
{
     if(Var2.value.length >0)
     {
     window.location = "salva_session_soc.php?Var_2="+Var2.value;     
	 }
}
function Salva3u(Var3)
{
     if(Var3.value.length >0)
     {
     	
     window.location = "salva_session_soc_up.php?Var_3="+Var3.value;     
     window.location = "soc_pes_opo_up.php?Rg_2x="+Var3.value;     
	 }
}
function Salva4u(Var4)
{
     if(Var4.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_4="+Var4.value;     
	 }
}
function Salva5u(Var5)
{
     if(Var5.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_5="+Var5.value;     
	 }
}
function Salva6u(Var6)
{
     if(Var6.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_6="+Var6.value;     
	 }
}
function Salva7u(Var7)
{
     if(Var7.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_7="+Var7.value;     
	 }
}
function Salva8u(Var8)
{
     if(Var8.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_8="+Var8.value;     
	 }
}
function Salva9u(Var9)
{
     if(Var9.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_9="+Var9.value;     
	 }
}
function Salva10u(Var10)
{
     if(Var10.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_10="+Var10.value;     
	 }
}
function Salva11u(Var11)
{
     if(Var11.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_11="+Var11.value;     
	 }
}
function Salva12u(Var12)
{
     if(Var12.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_12="+Var12.value;     
	 }
}
function Salva13u(Var13)
{
     if(Var13.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_13="+Var13.value;     
	 }
}
function Salva14u(Var14)
{
     if(Var14.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_14="+Var14.value;     
	 }
}
function Salva15u(Var15)
{
     if(Var15.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_15="+Var15.value;     
	 }
}
function Salva16u(Var16)
{
     if(Var16.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_16="+Var16.value;
	 window.location = "proc_cep2?Cep_2x="+Var16.value;     
	      
	 }
}
function Salva17u(Var17)
{
     if(Var17.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_17="+Var17.value;     
	 }
}
function Salva18u(Var18)
{
     if(Var18.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_18="+Var18.value;     
	 }
}
function Salva19u(Var19)
{
     if(Var19.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_19="+Var19.value;     
	 }
}
function Salva20u(Var20)
{
     if(Var20.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_20="+Var20.value;     
	 }
}
function Salva21u(Var21)
{
     if(Var21.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_21="+Var21.value;     
	 }
}
function Salva22u(Var22)
{
     if(Var22.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_22="+Var22.value;     
	 }
}
function Salva23u(Var23)
{
     if(Var23.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_23="+Var23.value;     
	 }
}
function Salva24u(Var24)
{
     if(Var24.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_24="+Var24.value;     
	 }
}
function Salva25u(Var25)
{
     if(Var25.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_25="+Var25.value;     
	 }
}
function Salva26u(Var26)
{
     if(Var26.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_26="+Var26.value;     
	 }
}
function Salva27u(Var27)
{
     if(Var27.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_27="+Var27.value;     
	 }
}
function Salva28u(Var28)
{
     if(Var28.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_28="+Var28.value;     
	 }
}
function Salva29u(Var29)
{
     if(Var29.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_29="+Var29.value;     
	 }
}
function Salva30u(Var30)
{
     if(Var30.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_30="+Var30.value;     
	 }
}
function Salva31u(Var31)
{
     if(Var31.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_31="+Var31.value;     
	 }
}
function Salva32u(Var32)
{
     if(Var32.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_32="+Var32.value;     
	 }
}
function Salva33u(Var33)
{
     if(Var33.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_33="+Var33.value;     
	 }
}
function Salva34u(Var34)
{
     if(Var34.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_34="+Var34.value;     
	 }
}
function Salva35u(Var35)
{
     if(Var35.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_35="+Var35.value;     
	 }
}
function Salva36u(Var36)
{
     if(Var36.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_36="+Var36.value;     
	 }
}
function Salva37u(Var37)
{
     if(Var37.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_37="+Var37.value;     
	 }
}
function Salva38u(Var38)
{
     if(Var38.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_38="+Var38.value;     
	 }
}
function Salva39u(Var39)
{
     if(Var39.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_39="+Var39.value;     
	 }
}
function Salva40u(Var40)
{
     if(Var40.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_40="+Var40.value;     
	 }
}
function Salva41u(Var41)
{
     if(Var41.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_41="+Var41.value;     
	 }
}
function Salva42u(Var42)
{
     if(Var42.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_42="+Var42.value;     
	 }
}
function Salva43u(Var43)
{
     if(Var43.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_43="+Var43.value;     
	 }
}
function Salva44u(Var44)
{
     if(Var44.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_44="+Var44.value;     
	 }
}
function Salva45u(Var45)
{
     if(Var45.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_45="+Var45.value;     
	 }
}
function Salva46u(Var46)
{
     if(Var46.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_46="+Var46.value;     
	 }
}
function Salva47u(Var47)
{
     if(Var47.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_47="+Var47.value;     
	 }
}
function Salva48u(Var48)
{
     if(Var48.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_48="+Var48.value;     
	 }
}
function Salva49u(Var49)
{
     if(Var49.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_49="+Var49.value;     
	 }
}
function Salva50u(Var50)
{
     if(Var50.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_50="+Var50.value;     
	 }
}
function Salva51u(Var51)
{
     if(Var51.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_51="+Var51.value;     
	 }
}
function Salva52u(Var52)
{
     if(Var52.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_52="+Var52.value;     
	 }
}
function Salva53u(Var53)
{
     if(Var53.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_53="+Var53.value;     
	 }
}
function Salva54u(Var54)
{
     if(Var54.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_54="+Var54.value;     
	 }
}
function Salva55u(Var55)
{
     if(Var55.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_55="+Var55.value;     
	 }
}
function Salva56u(Var56)
{
     if(Var56.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_56="+Var56.value;     
	 }
}
function Salva57u(Var57)
{
     if(Var57.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_57="+Var57.value;     
	 }
}
function Salva58u(Var58)
{
     if(Var58.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_58="+Var58.value;     
	 }
}
function Salva59u(Var59)
{
     if(Var59.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_59="+Var59.value;     
	 }
}
function Salva60u(Var60)
{
     if(Var60.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_60="+Var60.value;     
	 }
}
function Salva61u(Var61)
{
     if(Var61.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_61="+Var61.value;     
	 }
}
function Salva62u(Var62)
{
     if(Var62.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_62="+Var62.value;     
	 }
}
function Salva63u(Var63)
{
     if(Var63.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_63="+Var63.value;     
	 }
}
function Salva64u(Var64)
{
     if(Var64.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_64="+Var64.value;     
	 }
}
function Salva65u(Var65)
{
     if(Var65.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_65="+Var65.value;     
	 }
}
function Salva66u(Var66)
{
     if(Var66.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_66="+Var66.value;     
	 }
}
function Salva67u(Var67)
{
     if(Var67.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_67="+Var67.value;     
	 }
}
function Salva68u(Var68)
{
     if(Var68.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_68="+Var68.value;     
	 }
}
function Salva69u(Var69)
{
     if(Var69.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_69="+Var69.value;     
	 }
}
function Salva70u(Var70)
{
     if(Var70.value.length >0)
     {
     window.location = "salva_session_soc_up.php?Var_70="+Var70.value;     
	 }
}

// Salva Sessao Sindical_adm
function Salva_sind1(Var1)
{

     if(Var1.value.length >0)
     {
     window.location = "salva_session_sindical.php?Var_1="+Var1.value;     
	 }
}
function Salva_sind2(Var2)
{

     if(Var2.value.length >0)
     {
     window.location = "salva_session_sindical.php?Var_2="+Var2.value;     
	 }
}
function Salva_sind3(Var3)
{

     if(Var3.value.length >0)
     {
     window.location = "salva_session_sindical.php?Var_3="+Var3.value;     
	 }
}
function Salva_sind4(Var4)
{

     if(Var4.value.length >0)
     {
     window.location = "salva_session_sindical.php?Var_4="+Var4.value;     
	 }
}

// Salva Sessao Confederativa Adms
function Salva_conf1(Var1)
{

     if(Var1.value.length >0)
     {
     window.location = "salva_session_confederativa.php?Var_1="+Var1.value;     
	 }
}
function Salva_conf2(Var2)
{

     if(Var2.value.length >0)
     {
     window.location = "salva_session_confederativa.php?Var_2="+Var2.value;     
	 }
}
function Salva_conf3(Var3)
{

     if(Var3.value.length >0)
     {
     window.location = "salva_session_confederativa.php?Var_3="+Var3.value;     
	 }
}
function Salva_conf4(Var4)
{

     if(Var4.value.length >0)
     {
     window.location = "salva_session_confederativa.php?Var_4="+Var4.value;     
	 }
}


// Salva Sessao Oposicao
function Salva1op(Var1)
{

     if(Var1.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_1="+Var1.value;     
	 }
}
function Salva2op(Var2)
{

     if(Var2.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_2="+Var2.value;     
	 }
}
function Salva3op(Var3)
{

     if(Var3.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_3="+Var3.value;     
	 }
}
function Salva4op(Var4)
{

     if(Var4.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_4="+Var4.value;     
	 }
}
function Salva5op(Var5)
{

     if(Var5.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_5="+Var5.value;     
	 }
}
function Salva6op(Var6)
{

     if(Var6.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_6="+Var6.value;     
	 }
}
function Salva7op(Var7)
{

     if(Var7.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_7="+Var7.value;     
	 }
}
function Salva8op(Var8)
{

     if(Var8.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_8="+Var8.value;     
	 }
}
function Salva9op(Var9)
{

     if(Var9.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_9="+Var9.value;     
	 }
}
function Salva10op(Var10)
{

     if(Var10.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_10="+Var10.value;     
	 }
}
function Salva11op(Var11)
{

     if(Var11.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_11="+Var11.value;     
	 }
}
function Salva12op(Var12)
{

     if(Var12.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_12="+Var12.value;     
	 }
}
function Salva13op(Var13)
{

     if(Var13.value.length >0)
     {
     window.location = "salva_session_opo_up.php?Var_13="+Var13.value;     
	 }
}

// Salva Sessao Oposicao Incluir
function Salva1op_add(Var1)
{

     if(Var1.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_1="+Var1.value;     
	 }
}
function Salva2op_add(Var2)
{
     if(Var2.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_2="+Var2.value;     
	 }
}
function Salva3op_add(Var3)
{

     if(Var3.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_3="+Var3.value;     
	 }
}
function Salva4op_add(Var4)
{

     if(Var4.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_4="+Var4.value;     
	 }
}
function Salva5op_add(Var5)
{

     if(Var5.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_5="+Var5.value;     
	 }
}
function Salva6op_add(Var6)
{

     if(Var6.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_6="+Var6.value;     
	 }
}
function Salva7op_add(Var7)
{

     if(Var7.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_7="+Var7.value;     
	 }
}
function Salva8op_add(Var8)
{

     if(Var8.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_8="+Var8.value;     
	 }
}
function Salva9op_add(Var9)
{

     if(Var9.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_9="+Var9.value;     
	 }
}
function Salva10op_add(Var10)
{

     if(Var10.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_10="+Var10.value;     
	 }
}
function Salva11op_add(Var11)
{

     if(Var11.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_11="+Var11.value;     
	 }
}
function Salva12op_add(Var12)
{

     if(Var12.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_12="+Var12.value;     
	 }
}
function Salva13op_add(Var13)
{

     if(Var13.value.length >0)
     {
     window.location = "salva_session_opo.php?Var_13="+Var13.value;     
	 }
}

// Salva Sessao Etiquetas_Edif
function Salva_Etq_edif1(Var1)
{

     if(Var1.value.length >0)
     {
     window.location = "salva_session_etq_edif.php?Var_1="+Var1.value;     
	 }
}
function Salva_Etq_edif2(Var2)
{

     if(Var2.value.length >0)
     {
     window.location = "salva_session_etq_edif.php?Var_2="+Var2.value;     
	 }
}
function Salva_Etq_edif3(Var3)
{

     if(Var3.value.length >0)
     {
     window.location = "salva_session_etq_edif.php?Var_3="+Var3.value;     
	 }
}
function Salva_Etq_edif4(Var4)
{

     if(Var4.value.length >0)
     {
     window.location = "salva_session_etq_edif.php?Var_4="+Var4.value;     
	 }
}
function Salva_Etq_edif5(Var5)
{

     if(Var5.value.length >0)
     {
     window.location = "salva_session_etq_edif.php?Var_5="+Var5.value;     
	 }
}
function Salva_Etq_edif6(Var6)
{

     if(Var6.value.length >0)
     {
     window.location = "salva_session_etq_edif.php?Var_6="+Var6.value;     
	 }
}
function Salva_Etq_edif7(Var7)
{

     if(Var7.value.length >0)
     {
     window.location = "salva_session_etq_edif.php?Var_7="+Var7.value;     
	 }
}
function Salva_Etq_edif8(Var8)
{

     if(Var8.value.length >0)
     {
     window.location = "salva_session_etq_edif.php?Var_8="+Var8.value;     
	 }
}

// Funcao Salva Sessao incluir Administradora
function Salva_adm1(Var1)
{
     if(Var1.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_1="+Var1.value;     
	 }
}
function Salva_adm2(Var2)
{

     if(Var2.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_2="+Var2.value;     
	 }
}
function Salva_adm3(Var3)
{

     if(Var3.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_3="+Var3.value;     
	 }
}
function Salva_adm4(Var4)
{

     if(Var4.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_4="+Var4.value;     
	 }
}
function Salva_adm5(Var5)
{

     if(Var5.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_5="+Var5.value;     
	 }
}
function Salva_adm6(Var6)
{

     if(Var6.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_6="+Var6.value;     
	 }
}
function Salva_adm7(Var7)
{

     if(Var7.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_7="+Var7.value;     
	 }
}
function Salva_adm8(Var8)
{

     if(Var8.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_8="+Var8.value;     
	 }
}
function Salva_adm9(Var9)
{

     if(Var9.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_9="+Var9.value;     
	 window.location = "proc_cep_adm.php?Cep_2x="+Var9.value;     
	 }
}
function Salva_adm10(Var10)
{

     if(Var10.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_10="+Var10.value;     
	 }
}
function Salva_adm11(Var11)
{

     if(Var11.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_11="+Var11.value;     
	 }
}
function Salva_adm12(Var12)
{

     if(Var12.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_12="+Var12.value;     
	 }
}
function Salva_adm13(Var13)
{

     if(Var13.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_13="+Var13.value;     
	 }
}
function Salva_adm14(Var14)
{

     if(Var14.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_14="+Var14.value;     
	 }
}
function Salva_adm15(Var15)
{

     if(Var15.value.length >0)
     {
     window.location = "salva_session_adm.php?Var_15="+Var15.value;     
	 }
}


// Funcao Salva Sessao Alterar Administradora
function Salva_adm_up1(Var1)
{
     if(Var1.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_1="+Var1.value;     
	 }
}
function Salva_adm_up2(Var2)
{

     if(Var2.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_2="+Var2.value;     
	 }
}
function Salva_adm_up3(Var3)
{

     if(Var3.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_3="+Var3.value;     
	 }
}
function Salva_adm_up4(Var4)
{

     if(Var4.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_4="+Var4.value;     
	 }
}
function Salva_adm_up5(Var5)
{

     if(Var5.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_5="+Var5.value;     
	 }
}
function Salva_adm_up6(Var6)
{

     if(Var6.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_6="+Var6.value;     
	 }
}
function Salva_adm_up7(Var7)
{

     if(Var7.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_7="+Var7.value;     
	 }
}
function Salva_adm_up8(Var8)
{

     if(Var8.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_8="+Var8.value;     
	 }
}
function Salva_adm_up9(Var9)
{

     if(Var9.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_9="+Var9.value;    
	 window.location = "proc_cep_adm_update.php?Cep_2x="+Var9.value;     
 	 }
}
function Salva_adm_up10(Var10)
{

     if(Var10.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_10="+Var10.value;     
	 }
}
function Salva_adm_up11(Var11)
{

     if(Var11.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_11="+Var11.value;     
	 }
}
function Salva_adm_up12(Var12)
{

     if(Var12.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_12="+Var12.value;     
	 }
}
function Salva_adm_up13(Var13)
{

     if(Var13.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_13="+Var13.value;     
	 }
}
function Salva_adm_up14(Var14)
{

     if(Var14.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_14="+Var14.value;     
	 }
}
function Salva_adm_up15(Var15)
{

     if(Var15.value.length >0)
     {
     window.location = "salva_session_adm_up.php?Var_15="+Var15.value;     
	 }
}



// Funcao Salva Sessao incluir Vagas
function Salva_vagas1(Var1)
{
     if(Var1.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_1="+Var1.value;     
	 }
}
function Salva_vagas2(Var2)
{

     if(Var2.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_2="+Var2.value;     
	 }
}
function Salva_vagas3(Var3)
{

     if(Var3.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_3="+Var3.value;     
	 }
}
function Salva_vagas4(Var4)
{

     if(Var4.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_4="+Var4.value;     
	 }
}
function Salva_vagas5(Var5)
{

     if(Var5.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_5="+Var5.value;     
	 }
}
function Salva_vagas6(Var6)
{

     if(Var6.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_6="+Var6.value;     
	 }
}
function Salva_vagas7(Var7)
{

     if(Var7.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_7="+Var7.value;     
	 }
}
function Salva_vagas8(Var8)
{

     if(Var8.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_8="+Var8.value;     
	 }
}
function Salva_vagas9(Var9)
{

     if(Var9.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_9="+Var9.value;     
	 }
}
function Salva_vagas10(Var10)
{

     if(Var10.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_10="+Var10.value;     
	 }
}
function Salva_vagas11(Var11)
{

     if(Var11.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_11="+Var11.value;     
	 }
}
function Salva_vagas12(Var12)
{

     if(Var12.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_12="+Var12.value;
	 window.location = "proc_cep_vagas.php?Cep_2x="+Var12.value;     
	 }
}
function Salva_vagas13(Var13)
{

     if(Var13.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_13="+Var13.value;     
	 }
}
function Salva_vagas14(Var14)
{

     if(Var14.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_14="+Var14.value;     
	 }
}
function Salva_vagas15(Var15)
{

     if(Var15.value.length >0)
     {
     window.location = "salva_session_vagas.php?Var_15="+Var15.value;     
	 }
}


// Funcao Salva Sessao Alterar Vagas
function Salva_vagas1_up(Var1)
{
     if(Var1.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_1="+Var1.value;     
	 }
}
function Salva_vagas2_up(Var2)
{

     if(Var2.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_2="+Var2.value;     
	 }
}
function Salva_vagas3_up(Var3)
{

     if(Var3.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_3="+Var3.value;     
	 }
}
function Salva_vagas4_up(Var4)
{

     if(Var4.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_4="+Var4.value;     
	 }
}
function Salva_vagas5_up(Var5)
{

     if(Var5.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_5="+Var5.value;     
	 }
}
function Salva_vagas6_up(Var6)
{

     if(Var6.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_6="+Var6.value;     
	 }
}
function Salva_vagas7_up(Var7)
{

     if(Var7.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_7="+Var7.value;     
	 }
}
function Salva_vagas8_up(Var8)
{

     if(Var8.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_8="+Var8.value;     
	 }
}
function Salva_vagas9_up(Var9)
{

     if(Var9.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_9="+Var9.value;     
	 }
}
function Salva_vagas10_up(Var10)
{

     if(Var10.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_10="+Var10.value;     
	 }
}
function Salva_vagas11_up(Var11)
{

     if(Var11.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_11="+Var11.value;     
	 }
}
function Salva_vagas12_up(Var12)
{

     if(Var12.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_12="+Var12.value;  
	 window.location = "proc_cep_vagas_up.php?Cep_2x="+Var12.value;   
	 }
}
function Salva_vagas13_up(Var13)
{

     if(Var13.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_13="+Var13.value;     
	 }
}
function Salva_vagas14_up(Var14)
{

     if(Var14.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_14="+Var14.value;     
	 }
}
function Salva_vagas15_up(Var15)
{

     if(Var15.value.length >0)
     {
     window.location = "salva_session_vagas_up.php?Var_15="+Var15.value;     
	 }
}


/*
 ------------------------
 Funcao verifica CEP Edificios
 ------------------------
*/


function Verifica2(Cep)
{
     if(Cep.value.length >0)
     {
     window.location = "proc_cep_edif_update.php?Cep_2x="+Cep.value;     
	 }
}


/*
 ------------------------
 Funcao verifica CEP Administradora
 ------------------------
*/

function Verifica_adm(Cep)
{
     if(Cep.value.length >0)
     {
     window.location = "proc_cep_adm.php?Cep_2x="+Cep.value;     
	 }
}

function Verifica_adm2(Cep)
{
     if(Cep.value.length >0)
     {
     window.location = "proc_cep_adm_update.php?Cep_2x="+Cep.value;     
	 }
}


/*
 ------------------------
 Funcao verifica Oposição
 ------------------------
*/

function Verifica_opo(Rgassoc)
{
     if(Rgassoc.value.length >0)
     {
     window.location = "socincluir2.php?Rg_2x="+Rgassoc.value;
	 }
	
}

// End -->
</script>

<?

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

/*
  -----------------------------
  Verifica qual a Categoria
  e apresenta mensagem na tela
  -----------------------------
*/

Function categoria($categoria)
{
	
Switch ($categoria)
{
	Case 'D':

	?>
	<SCRIPT LANGUAGE='JavaScript'>
	<!--
	alert("Socio consta como DESISTENTE");
	//-->
	</script>
	<?
	break;
	
	Case 'O':

	?>
	<SCRIPT LANGUAGE='JavaScript'>
	<!--
	alert("Socio com carta de OPOSIÇÃO");
	//-->
	</script>
	<?
	break;

}
	
}

?>

<script language="JavaScript">
<!-- Begin

 function validarCPF(Cpf){
      window.location = "salva_session_soc.php?Var_4="+Cpf.value;
	
   var cpf = Cpf.value;
   var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
   if(!filtro.test(cpf)){
     window.alert("CPF inválido. Tente novamente.");
	 return false;
   }
   
   cpf = remove(cpf, ".");
   cpf = remove(cpf, "-");
    
   if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
	  cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
	  cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
	  cpf == "88888888888" || cpf == "99999999999"){
	  window.alert("CPF inválido. Tente novamente.");
	  return false;
   }

   soma = 0;
   for(i = 0; i < 9; i++)
   	 soma += parseInt(cpf.charAt(i)) * (10 - i);
   resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(9))){
	 window.alert("CPF inválido. Tente novamente.");
	 return false;
   }
   soma = 0;
   for(i = 0; i < 10; i ++)
	 soma += parseInt(cpf.charAt(i)) * (11 - i);
   resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(10))){
     window.alert("CPF inválido. Tente novamente.");
	 return false;
   }


   return true;
   
 }


 function remove(str, sub) {
   i = str.indexOf(sub);
   r = "";
   if (i == -1) return str;
   r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
   return r;
 }

 function validarCPF2(Cpf){
	
   var cpf = Cpf.value;
   var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
   if(!filtro.test(cpf)){
     window.alert("CPF inválido. Tente novamente.");
	 return false;
   }
   
   cpf = remove(cpf, ".");
   cpf = remove(cpf, "-");
    
   if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
	  cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
	  cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
	  cpf == "88888888888" || cpf == "99999999999"){
	  window.alert("CPF inválido. Tente novamente.");
	  return false;
   }

   soma = 0;
   for(i = 0; i < 9; i++)
   	 soma += parseInt(cpf.charAt(i)) * (10 - i);
   resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(9))){
	 window.alert("CPF inválido. Tente novamente.");
	 return false;
   }
   soma = 0;
   for(i = 0; i < 10; i ++)
	 soma += parseInt(cpf.charAt(i)) * (11 - i);
   resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(10))){
     window.alert("CPF inválido. Tente novamente.");
	 return false;
   }


   return true;
   
 }


 function remove(str, sub) {
   i = str.indexOf(sub);
   r = "";
   if (i == -1) return str;
   r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
   return r;
 }
// End -->

</script>


<script language="JavaScript">
<!-- Begin

 function validarCPF2(Cpf){
      window.location = "salva_session_soc_up.php?Var_4="+Cpf.value;
	
   var cpf = Cpf.value;
   var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
   if(!filtro.test(cpf)){
     window.alert("CPF inválido. Tente novamente.");
	 return false;
   }
   
   cpf = remove(cpf, ".");
   cpf = remove(cpf, "-");
    
   if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
	  cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
	  cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
	  cpf == "88888888888" || cpf == "99999999999"){
	  window.alert("CPF inválido. Tente novamente.");
	  return false;
   }

   soma = 0;
   for(i = 0; i < 9; i++)
   	 soma += parseInt(cpf.charAt(i)) * (10 - i);
   resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(9))){
	 window.alert("CPF inválido. Tente novamente.");
	 return false;
   }
   soma = 0;
   for(i = 0; i < 10; i ++)
	 soma += parseInt(cpf.charAt(i)) * (11 - i);
   resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(10))){
     window.alert("CPF inválido. Tente novamente.");
	 return false;
   }


   return true;
   
 }


 function remove(str, sub) {
   i = str.indexOf(sub);
   r = "";
   if (i == -1) return str;
   r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
   return r;
 }

 function validarCPF2(Cpf){
	
   var cpf = Cpf.value;
   var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
   if(!filtro.test(cpf)){
     window.alert("CPF inválido. Tente novamente.");
	 return false;
   }
   
   cpf = remove(cpf, ".");
   cpf = remove(cpf, "-");
    
   if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
	  cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
	  cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
	  cpf == "88888888888" || cpf == "99999999999"){
	  window.alert("CPF inválido. Tente novamente.");
	  return false;
   }

   soma = 0;
   for(i = 0; i < 9; i++)
   	 soma += parseInt(cpf.charAt(i)) * (10 - i);
   resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(9))){
	 window.alert("CPF inválido. Tente novamente.");
	 return false;
   }
   soma = 0;
   for(i = 0; i < 10; i ++)
	 soma += parseInt(cpf.charAt(i)) * (11 - i);
   resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(10))){
     window.alert("CPF inválido. Tente novamente.");
	 return false;
   }


   return true;
   
 }


 function remove(str, sub) {
   i = str.indexOf(sub);
   r = "";
   if (i == -1) return str;
   r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
   return r;
 }
// End -->

</script>


<?
// Funcao para apresentar na tela as bordas azul
// no formato JavaScript
//
?>
<script language="JavaScript">
<!-- Begin

var jg_ok, jg_ie, jg_fast, jg_dom, jg_moz;


function chkDHTM(x, i)
{
	x = document.body || null;
	jg_ie = x && typeof x.insertAdjacentHTML != "undefined" && document.createElement;
	jg_dom = (x && !jg_ie &&
		typeof x.appendChild != "undefined" &&
		typeof document.createRange != "undefined" &&
		typeof (i = document.createRange()).setStartBefore != "undefined" &&
		typeof i.createContextualFragment != "undefined");
	jg_fast = jg_ie && document.all && !window.opera;
	jg_moz = jg_dom && typeof x.style.MozOpacity != "undefined";
	jg_ok = !!(jg_ie || jg_dom);
}

function pntCnvDom()
{
	var x = this.wnd.document.createRange();
	x.setStartBefore(this.cnv);
	x = x.createContextualFragment(jg_fast? this.htmRpc() : this.htm);
	if(this.cnv) this.cnv.appendChild(x);
	this.htm = "";
}

function pntCnvIe()
{
	if(this.cnv) this.cnv.insertAdjacentHTML("BeforeEnd", jg_fast? this.htmRpc() : this.htm);
	this.htm = "";
}

function pntDoc()
{
	this.wnd.document.write(jg_fast? this.htmRpc() : this.htm);
	this.htm = '';
}

function pntN()
{
	;
}

function mkDiv(x, y, w, h)
{
	this.htm += '<div style="position:absolute;'+
		'left:' + x + 'px;'+
		'top:' + y + 'px;'+
		'width:' + w + 'px;'+
		'height:' + h + 'px;'+
		'clip:rect(0,'+w+'px,'+h+'px,0);'+
		'background-color:' + this.color +
		(!jg_moz? ';overflow:hidden' : '')+
		';"><\/div>';
}

function mkDivIe(x, y, w, h)
{
	this.htm += '%%'+this.color+';'+x+';'+y+';'+w+';'+h+';';
}

function mkDivPrt(x, y, w, h)
{
	this.htm += '<div style="position:absolute;'+
		'border-left:' + w + 'px solid ' + this.color + ';'+
		'left:' + x + 'px;'+
		'top:' + y + 'px;'+
		'width:0px;'+
		'height:' + h + 'px;'+
		'clip:rect(0,'+w+'px,'+h+'px,0);'+
		'background-color:' + this.color +
		(!jg_moz? ';overflow:hidden' : '')+
		';"><\/div>';
}

var regex =  /%%([^;]+);([^;]+);([^;]+);([^;]+);([^;]+);/g;
function htmRpc()
{
	return this.htm.replace(
		regex,
		'<div style="overflow:hidden;position:absolute;background-color:'+
		'$1;left:$2;top:$3;width:$4;height:$5"></div>\n');
}

function htmPrtRpc()
{
	return this.htm.replace(
		regex,
		'<div style="overflow:hidden;position:absolute;background-color:'+
		'$1;left:$2;top:$3;width:$4;height:$5;border-left:$4px solid $1"></div>\n');
}

function mkLin(x1, y1, x2, y2)
{
	if(x1 > x2)
	{
		var _x2 = x2;
		var _y2 = y2;
		x2 = x1;
		y2 = y1;
		x1 = _x2;
		y1 = _y2;
	}
	var dx = x2-x1, dy = Math.abs(y2-y1),
	x = x1, y = y1,
	yIncr = (y1 > y2)? -1 : 1;

	if(dx >= dy)
	{
		var pr = dy<<1,
		pru = pr - (dx<<1),
		p = pr-dx,
		ox = x;
		while(dx > 0)
		{--dx;
			++x;
			if(p > 0)
			{
				this.mkDiv(ox, y, x-ox, 1);
				y += yIncr;
				p += pru;
				ox = x;
			}
			else p += pr;
		}
		this.mkDiv(ox, y, x2-ox+1, 1);
	}

	else
	{
		var pr = dx<<1,
		pru = pr - (dy<<1),
		p = pr-dy,
		oy = y;
		if(y2 <= y1)
		{
			while(dy > 0)
			{--dy;
				if(p > 0)
				{
					this.mkDiv(x++, y, 1, oy-y+1);
					y += yIncr;
					p += pru;
					oy = y;
				}
				else
				{
					y += yIncr;
					p += pr;
				}
			}
			this.mkDiv(x2, y2, 1, oy-y2+1);
		}
		else
		{
			while(dy > 0)
			{--dy;
				y += yIncr;
				if(p > 0)
				{
					this.mkDiv(x++, oy, 1, y-oy);
					p += pru;
					oy = y;
				}
				else p += pr;
			}
			this.mkDiv(x2, oy, 1, y2-oy+1);
		}
	}
}

function mkLin2D(x1, y1, x2, y2)
{
	if(x1 > x2)
	{
		var _x2 = x2;
		var _y2 = y2;
		x2 = x1;
		y2 = y1;
		x1 = _x2;
		y1 = _y2;
	}
	var dx = x2-x1, dy = Math.abs(y2-y1),
	x = x1, y = y1,
	yIncr = (y1 > y2)? -1 : 1;

	var s = this.stroke;
	if(dx >= dy)
	{
		if(dx > 0 && s-3 > 0)
		{
			var _s = (s*dx*Math.sqrt(1+dy*dy/(dx*dx))-dx-(s>>1)*dy) / dx;
			_s = (!(s-4)? Math.ceil(_s) : Math.round(_s)) + 1;
		}
		else var _s = s;
		var ad = Math.ceil(s/2);

		var pr = dy<<1,
		pru = pr - (dx<<1),
		p = pr-dx,
		ox = x;
		while(dx > 0)
		{--dx;
			++x;
			if(p > 0)
			{
				this.mkDiv(ox, y, x-ox+ad, _s);
				y += yIncr;
				p += pru;
				ox = x;
			}
			else p += pr;
		}
		this.mkDiv(ox, y, x2-ox+ad+1, _s);
	}

	else
	{
		if(s-3 > 0)
		{
			var _s = (s*dy*Math.sqrt(1+dx*dx/(dy*dy))-(s>>1)*dx-dy) / dy;
			_s = (!(s-4)? Math.ceil(_s) : Math.round(_s)) + 1;
		}
		else var _s = s;
		var ad = Math.round(s/2);

		var pr = dx<<1,
		pru = pr - (dy<<1),
		p = pr-dy,
		oy = y;
		if(y2 <= y1)
		{
			++ad;
			while(dy > 0)
			{--dy;
				if(p > 0)
				{
					this.mkDiv(x++, y, _s, oy-y+ad);
					y += yIncr;
					p += pru;
					oy = y;
				}
				else
				{
					y += yIncr;
					p += pr;
				}
			}
			this.mkDiv(x2, y2, _s, oy-y2+ad);
		}
		else
		{
			while(dy > 0)
			{--dy;
				y += yIncr;
				if(p > 0)
				{
					this.mkDiv(x++, oy, _s, y-oy+ad);
					p += pru;
					oy = y;
				}
				else p += pr;
			}
			this.mkDiv(x2, oy, _s, y2-oy+ad+1);
		}
	}
}

function mkLinDott(x1, y1, x2, y2)
{
	if(x1 > x2)
	{
		var _x2 = x2;
		var _y2 = y2;
		x2 = x1;
		y2 = y1;
		x1 = _x2;
		y1 = _y2;
	}
	var dx = x2-x1, dy = Math.abs(y2-y1),
	x = x1, y = y1,
	yIncr = (y1 > y2)? -1 : 1,
	drw = true;
	if(dx >= dy)
	{
		var pr = dy<<1,
		pru = pr - (dx<<1),
		p = pr-dx;
		while(dx > 0)
		{--dx;
			if(drw) this.mkDiv(x, y, 1, 1);
			drw = !drw;
			if(p > 0)
			{
				y += yIncr;
				p += pru;
			}
			else p += pr;
			++x;
		}
	}
	else
	{
		var pr = dx<<1,
		pru = pr - (dy<<1),
		p = pr-dy;
		while(dy > 0)
		{--dy;
			if(drw) this.mkDiv(x, y, 1, 1);
			drw = !drw;
			y += yIncr;
			if(p > 0)
			{
				++x;
				p += pru;
			}
			else p += pr;
		}
	}
	if(drw) this.mkDiv(x, y, 1, 1);
}

function mkOv(left, top, width, height)
{
	var a = (++width)>>1, b = (++height)>>1,
	wod = width&1, hod = height&1,
	cx = left+a, cy = top+b,
	x = 0, y = b,
	ox = 0, oy = b,
	aa2 = (a*a)<<1, aa4 = aa2<<1, bb2 = (b*b)<<1, bb4 = bb2<<1,
	st = (aa2>>1)*(1-(b<<1)) + bb2,
	tt = (bb2>>1) - aa2*((b<<1)-1),
	w, h;
	while(y > 0)
	{
		if(st < 0)
		{
			st += bb2*((x<<1)+3);
			tt += bb4*(++x);
		}
		else if(tt < 0)
		{
			st += bb2*((x<<1)+3) - aa4*(y-1);
			tt += bb4*(++x) - aa2*(((y--)<<1)-3);
			w = x-ox;
			h = oy-y;
			if((w&2) && (h&2))
			{
				this.mkOvQds(cx, cy, x-2, y+2, 1, 1, wod, hod);
				this.mkOvQds(cx, cy, x-1, y+1, 1, 1, wod, hod);
			}
			else this.mkOvQds(cx, cy, x-1, oy, w, h, wod, hod);
			ox = x;
			oy = y;
		}
		else
		{
			tt -= aa2*((y<<1)-3);
			st -= aa4*(--y);
		}
	}
	w = a-ox+1;
	h = (oy<<1)+hod;
	y = cy-oy;
	this.mkDiv(cx-a, y, w, h);
	this.mkDiv(cx+ox+wod-1, y, w, h);
}

function mkOv2D(left, top, width, height)
{
	var s = this.stroke;
	width += s+1;
	height += s+1;
	var a = width>>1, b = height>>1,
	wod = width&1, hod = height&1,
	cx = left+a, cy = top+b,
	x = 0, y = b,
	aa2 = (a*a)<<1, aa4 = aa2<<1, bb2 = (b*b)<<1, bb4 = bb2<<1,
	st = (aa2>>1)*(1-(b<<1)) + bb2,
	tt = (bb2>>1) - aa2*((b<<1)-1);

	if(s-4 < 0 && (!(s-2) || width-51 > 0 && height-51 > 0))
	{
		var ox = 0, oy = b,
		w, h,
		pxw;
		while(y > 0)
		{
			if(st < 0)
			{
				st += bb2*((x<<1)+3);
				tt += bb4*(++x);
			}
			else if(tt < 0)
			{
				st += bb2*((x<<1)+3) - aa4*(y-1);
				tt += bb4*(++x) - aa2*(((y--)<<1)-3);
				w = x-ox;
				h = oy-y;

				if(w-1)
				{
					pxw = w+1+(s&1);
					h = s;
				}
				else if(h-1)
				{
					pxw = s;
					h += 1+(s&1);
				}
				else pxw = h = s;
				this.mkOvQds(cx, cy, x-1, oy, pxw, h, wod, hod);
				ox = x;
				oy = y;
			}
			else
			{
				tt -= aa2*((y<<1)-3);
				st -= aa4*(--y);
			}
		}
		this.mkDiv(cx-a, cy-oy, s, (oy<<1)+hod);
		this.mkDiv(cx+a+wod-s, cy-oy, s, (oy<<1)+hod);
	}

	else
	{
		var _a = (width-(s<<1))>>1,
		_b = (height-(s<<1))>>1,
		_x = 0, _y = _b,
		_aa2 = (_a*_a)<<1, _aa4 = _aa2<<1, _bb2 = (_b*_b)<<1, _bb4 = _bb2<<1,
		_st = (_aa2>>1)*(1-(_b<<1)) + _bb2,
		_tt = (_bb2>>1) - _aa2*((_b<<1)-1),

		pxl = new Array(),
		pxt = new Array(),
		_pxb = new Array();
		pxl[0] = 0;
		pxt[0] = b;
		_pxb[0] = _b-1;
		while(y > 0)
		{
			if(st < 0)
			{
				pxl[pxl.length] = x;
				pxt[pxt.length] = y;
				st += bb2*((x<<1)+3);
				tt += bb4*(++x);
			}
			else if(tt < 0)
			{
				pxl[pxl.length] = x;
				st += bb2*((x<<1)+3) - aa4*(y-1);
				tt += bb4*(++x) - aa2*(((y--)<<1)-3);
				pxt[pxt.length] = y;
			}
			else
			{
				tt -= aa2*((y<<1)-3);
				st -= aa4*(--y);
			}

			if(_y > 0)
			{
				if(_st < 0)
				{
					_st += _bb2*((_x<<1)+3);
					_tt += _bb4*(++_x);
					_pxb[_pxb.length] = _y-1;
				}
				else if(_tt < 0)
				{
					_st += _bb2*((_x<<1)+3) - _aa4*(_y-1);
					_tt += _bb4*(++_x) - _aa2*(((_y--)<<1)-3);
					_pxb[_pxb.length] = _y-1;
				}
				else
				{
					_tt -= _aa2*((_y<<1)-3);
					_st -= _aa4*(--_y);
					_pxb[_pxb.length-1]--;
				}
			}
		}

		var ox = -wod, oy = b,
		_oy = _pxb[0],
		l = pxl.length,
		w, h;
		for(var i = 0; i < l; i++)
		{
			if(typeof _pxb[i] != "undefined")
			{
				if(_pxb[i] < _oy || pxt[i] < oy)
				{
					x = pxl[i];
					this.mkOvQds(cx, cy, x, oy, x-ox, oy-_oy, wod, hod);
					ox = x;
					oy = pxt[i];
					_oy = _pxb[i];
				}
			}
			else
			{
				x = pxl[i];
				this.mkDiv(cx-x, cy-oy, 1, (oy<<1)+hod);
				this.mkDiv(cx+ox+wod, cy-oy, 1, (oy<<1)+hod);
				ox = x;
				oy = pxt[i];
			}
		}
		this.mkDiv(cx-a, cy-oy, 1, (oy<<1)+hod);
		this.mkDiv(cx+ox+wod, cy-oy, 1, (oy<<1)+hod);
	}
}

function mkOvDott(left, top, width, height)
{
	var a = (++width)>>1, b = (++height)>>1,
	wod = width&1, hod = height&1, hodu = hod^1,
	cx = left+a, cy = top+b,
	x = 0, y = b,
	aa2 = (a*a)<<1, aa4 = aa2<<1, bb2 = (b*b)<<1, bb4 = bb2<<1,
	st = (aa2>>1)*(1-(b<<1)) + bb2,
	tt = (bb2>>1) - aa2*((b<<1)-1),
	drw = true;
	while(y > 0)
	{
		if(st < 0)
		{
			st += bb2*((x<<1)+3);
			tt += bb4*(++x);
		}
		else if(tt < 0)
		{
			st += bb2*((x<<1)+3) - aa4*(y-1);
			tt += bb4*(++x) - aa2*(((y--)<<1)-3);
		}
		else
		{
			tt -= aa2*((y<<1)-3);
			st -= aa4*(--y);
		}
		if(drw && y >= hodu) this.mkOvQds(cx, cy, x, y, 1, 1, wod, hod);
		drw = !drw;
	}
}

function mkRect(x, y, w, h)
{
	var s = this.stroke;
	this.mkDiv(x, y, w, s);
	this.mkDiv(x+w, y, s, h);
	this.mkDiv(x, y+h, w+s, s);
	this.mkDiv(x, y+s, s, h-s);
}

function mkRectDott(x, y, w, h)
{
	this.drawLine(x, y, x+w, y);
	this.drawLine(x+w, y, x+w, y+h);
	this.drawLine(x, y+h, x+w, y+h);
	this.drawLine(x, y, x, y+h);
}

function jsgFont()
{
	this.PLAIN = 'font-weight:normal;';
	this.BOLD = 'font-weight:bold;';
	this.ITALIC = 'font-style:italic;';
	this.ITALIC_BOLD = this.ITALIC + this.BOLD;
	this.BOLD_ITALIC = this.ITALIC_BOLD;
}
var Font = new jsgFont();

function jsgStroke()
{
	this.DOTTED = -1;
}
var Stroke = new jsgStroke();

function jsGraphics(cnv, wnd)
{
	this.setColor = new Function('arg', 'this.color = arg.toLowerCase();');

	this.setStroke = function(x)
	{
		this.stroke = x;
		if(!(x+1))
		{
			this.drawLine = mkLinDott;
			this.mkOv = mkOvDott;
			this.drawRect = mkRectDott;
		}
		else if(x-1 > 0)
		{
			this.drawLine = mkLin2D;
			this.mkOv = mkOv2D;
			this.drawRect = mkRect;
		}
		else
		{
			this.drawLine = mkLin;
			this.mkOv = mkOv;
			this.drawRect = mkRect;
		}
	};

	this.setPrintable = function(arg)
	{
		this.printable = arg;
		if(jg_fast)
		{
			this.mkDiv = mkDivIe;
			this.htmRpc = arg? htmPrtRpc : htmRpc;
		}
		else this.mkDiv = arg? mkDivPrt : mkDiv;
	};

	this.setFont = function(fam, sz, sty)
	{
		this.ftFam = fam;
		this.ftSz = sz;
		this.ftSty = sty || Font.PLAIN;
	};

	this.drawPolyline = this.drawPolyLine = function(x, y)
	{
		for (var i=x.length - 1; i;)
		{--i;
			this.drawLine(x[i], y[i], x[i+1], y[i+1]);
		}
	};

	this.fillRect = function(x, y, w, h)
	{
		this.mkDiv(x, y, w, h);
	};

	this.drawPolygon = function(x, y)
	{
		this.drawPolyline(x, y);
		this.drawLine(x[x.length-1], y[x.length-1], x[0], y[0]);
	};

	this.drawEllipse = this.drawOval = function(x, y, w, h)
	{
		this.mkOv(x, y, w, h);
	};

	this.fillEllipse = this.fillOval = function(left, top, w, h)
	{
		var a = w>>1, b = h>>1,
		wod = w&1, hod = h&1,
		cx = left+a, cy = top+b,
		x = 0, y = b, oy = b,
		aa2 = (a*a)<<1, aa4 = aa2<<1, bb2 = (b*b)<<1, bb4 = bb2<<1,
		st = (aa2>>1)*(1-(b<<1)) + bb2,
		tt = (bb2>>1) - aa2*((b<<1)-1),
		xl, dw, dh;
		if(w) while(y > 0)
		{
			if(st < 0)
			{
				st += bb2*((x<<1)+3);
				tt += bb4*(++x);
			}
			else if(tt < 0)
			{
				st += bb2*((x<<1)+3) - aa4*(y-1);
				xl = cx-x;
				dw = (x<<1)+wod;
				tt += bb4*(++x) - aa2*(((y--)<<1)-3);
				dh = oy-y;
				this.mkDiv(xl, cy-oy, dw, dh);
				this.mkDiv(xl, cy+y+hod, dw, dh);
				oy = y;
			}
			else
			{
				tt -= aa2*((y<<1)-3);
				st -= aa4*(--y);
			}
		}
		this.mkDiv(cx-a, cy-oy, w, (oy<<1)+hod);
	};

	this.fillArc = function(iL, iT, iW, iH, fAngA, fAngZ)
	{
		var a = iW>>1, b = iH>>1,
		iOdds = (iW&1) | ((iH&1) << 16),
		cx = iL+a, cy = iT+b,
		x = 0, y = b, ox = x, oy = y,
		aa2 = (a*a)<<1, aa4 = aa2<<1, bb2 = (b*b)<<1, bb4 = bb2<<1,
		st = (aa2>>1)*(1-(b<<1)) + bb2,
		tt = (bb2>>1) - aa2*((b<<1)-1),
		// Vars for radial boundary lines
		xEndA, yEndA, xEndZ, yEndZ,
		iSects = (1 << (Math.floor((fAngA %= 360.0)/180.0) << 3))
				| (2 << (Math.floor((fAngZ %= 360.0)/180.0) << 3))
				| ((fAngA >= fAngZ) << 16),
		aBndA = new Array(b+1), aBndZ = new Array(b+1);
		
		// Set up radial boundary lines
		fAngA *= Math.PI/180.0;
		fAngZ *= Math.PI/180.0;
		xEndA = cx+Math.round(a*Math.cos(fAngA));
		yEndA = cy+Math.round(-b*Math.sin(fAngA));
		aBndA.mkLinVirt(cx, cy, xEndA, yEndA);
		xEndZ = cx+Math.round(a*Math.cos(fAngZ));
		yEndZ = cy+Math.round(-b*Math.sin(fAngZ));
		aBndZ.mkLinVirt(cx, cy, xEndZ, yEndZ);

		while(y > 0)
		{
			if(st < 0) // Advance x
			{
				st += bb2*((x<<1)+3);
				tt += bb4*(++x);
			}
			else if(tt < 0) // Advance x and y
			{
				st += bb2*((x<<1)+3) - aa4*(y-1);
				ox = x;
				tt += bb4*(++x) - aa2*(((y--)<<1)-3);
				this.mkArcDiv(ox, y, oy, cx, cy, iOdds, aBndA, aBndZ, iSects);
				oy = y;
			}
			else // Advance y
			{
				tt -= aa2*((y<<1)-3);
				st -= aa4*(--y);
				if(y && (aBndA[y] != aBndA[y-1] || aBndZ[y] != aBndZ[y-1]))
				{
					this.mkArcDiv(x, y, oy, cx, cy, iOdds, aBndA, aBndZ, iSects);
					ox = x;
					oy = y;
				}
			}
		}
		this.mkArcDiv(x, 0, oy, cx, cy, iOdds, aBndA, aBndZ, iSects);
		if(iOdds >> 16) // Odd height
		{
			if(iSects >> 16) // Start-angle > end-angle
			{
				var xl = (yEndA <= cy || yEndZ > cy)? (cx - x) : cx;
				this.mkDiv(xl, cy, x + cx - xl + (iOdds & 0xffff), 1);
			}
			else if((iSects & 0x01) && yEndZ > cy)
				this.mkDiv(cx - x, cy, x, 1);
		}
	};

/* fillPolygon method, implemented by Matthieu Haller.
This javascript function is an adaptation of the gdImageFilledPolygon for Walter Zorn lib.
C source of GD 1.8.4 found at http://www.boutell.com/gd/

THANKS to Kirsten Schulz for the polygon fixes!

The intersection finding technique of this code could be improved
by remembering the previous intertersection, and by using the slope.
That could help to adjust intersections to produce a nice
interior_extrema. */
	this.fillPolygon = function(array_x, array_y)
	{
		var i;
		var y;
		var miny, maxy;
		var x1, y1;
		var x2, y2;
		var ind1, ind2;
		var ints;

		var n = array_x.length;
		if(!n) return;

		miny = array_y[0];
		maxy = array_y[0];
		for(i = 1; i < n; i++)
		{
			if(array_y[i] < miny)
				miny = array_y[i];

			if(array_y[i] > maxy)
				maxy = array_y[i];
		}
		for(y = miny; y <= maxy; y++)
		{
			var polyInts = new Array();
			ints = 0;
			for(i = 0; i < n; i++)
			{
				if(!i)
				{
					ind1 = n-1;
					ind2 = 0;
				}
				else
				{
					ind1 = i-1;
					ind2 = i;
				}
				y1 = array_y[ind1];
				y2 = array_y[ind2];
				if(y1 < y2)
				{
					x1 = array_x[ind1];
					x2 = array_x[ind2];
				}
				else if(y1 > y2)
				{
					y2 = array_y[ind1];
					y1 = array_y[ind2];
					x2 = array_x[ind1];
					x1 = array_x[ind2];
				}
				else continue;

				 //  Modified 11. 2. 2004 Walter Zorn
				if((y >= y1) && (y < y2))
					polyInts[ints++] = Math.round((y-y1) * (x2-x1) / (y2-y1) + x1);

				else if((y == maxy) && (y > y1) && (y <= y2))
					polyInts[ints++] = Math.round((y-y1) * (x2-x1) / (y2-y1) + x1);
			}
			polyInts.sort(CompInt);
			for(i = 0; i < ints; i+=2)
				this.mkDiv(polyInts[i], y, polyInts[i+1]-polyInts[i]+1, 1);
		}
	};

	this.drawString = function(txt, x, y)
	{
		this.htm += '<div style="position:absolute;white-space:nowrap;'+
			'left:' + x + 'px;'+
			'top:' + y + 'px;'+
			'font-family:' +  this.ftFam + ';'+
			'font-size:' + this.ftSz + ';'+
			'color:' + this.color + ';' + this.ftSty + '">'+
			txt +
			'<\/div>';
	};

/* drawStringRect() added by Rick Blommers.
Allows to specify the size of the text rectangle and to align the
text both horizontally (e.g. right) and vertically within that rectangle */
	this.drawStringRect = function(txt, x, y, width, halign)
	{
		this.htm += '<div style="position:absolute;overflow:hidden;'+
			'left:' + x + 'px;'+
			'top:' + y + 'px;'+
			'width:'+width +'px;'+
			'text-align:'+halign+';'+
			'font-family:' +  this.ftFam + ';'+
			'font-size:' + this.ftSz + ';'+
			'color:' + this.color + ';' + this.ftSty + '">'+
			txt +
			'<\/div>';
	};

	this.drawImage = function(imgSrc, x, y, w, h, a)
	{
		this.htm += '<div style="position:absolute;'+
			'left:' + x + 'px;'+
			'top:' + y + 'px;'+
			'width:' +  w + 'px;'+
			'height:' + h + 'px;">'+
			'<img src="' + imgSrc + '" width="' + w + '" height="' + h + '"' + (a? (' '+a) : '') + '>'+
			'<\/div>';
	};

	this.clear = function()
	{
		this.htm = "";
		if(this.cnv) this.cnv.innerHTML = "";
	};

	this.mkOvQds = function(cx, cy, x, y, w, h, wod, hod)
	{
		var xl = cx - x, xr = cx + x + wod - w, yt = cy - y, yb = cy + y + hod - h;
		if(xr > xl+w)
		{
			this.mkDiv(xr, yt, w, h);
			this.mkDiv(xr, yb, w, h);
		}
		else
			w = xr - xl + w;
		this.mkDiv(xl, yt, w, h);
		this.mkDiv(xl, yb, w, h);
	};
	
	this.mkArcDiv = function(x, y, oy, cx, cy, iOdds, aBndA, aBndZ, iSects)
	{
		var xrDef = cx + x + (iOdds & 0xffff), y2, h = oy - y, xl, xr, w;

		if(!h) h = 1;
		x = cx - x;

		if(iSects & 0xff0000) // Start-angle > end-angle
		{
			y2 = cy - y - h;
			if(iSects & 0x00ff)
			{
				if(iSects & 0x02)
				{
					xl = Math.max(x, aBndZ[y]);
					w = xrDef - xl;
					if(w > 0) this.mkDiv(xl, y2, w, h);
				}
				if(iSects & 0x01)
				{
					xr = Math.min(xrDef, aBndA[y]);
					w = xr - x;
					if(w > 0) this.mkDiv(x, y2, w, h);
				}
			}
			else
				this.mkDiv(x, y2, xrDef - x, h);
			y2 = cy + y + (iOdds >> 16);
			if(iSects & 0xff00)
			{
				if(iSects & 0x0100)
				{
					xl = Math.max(x, aBndA[y]);
					w = xrDef - xl;
					if(w > 0) this.mkDiv(xl, y2, w, h);
				}
				if(iSects & 0x0200)
				{
					xr = Math.min(xrDef, aBndZ[y]);
					w = xr - x;
					if(w > 0) this.mkDiv(x, y2, w, h);
				}
			}
			else
				this.mkDiv(x, y2, xrDef - x, h);
		}
		else
		{
			if(iSects & 0x00ff)
			{
				if(iSects & 0x02)
					xl = Math.max(x, aBndZ[y]);
				else
					xl = x;
				if(iSects & 0x01)
					xr = Math.min(xrDef, aBndA[y]);
				else
					xr = xrDef;
				y2 = cy - y - h;
				w = xr - xl;
				if(w > 0) this.mkDiv(xl, y2, w, h);
			}
			if(iSects & 0xff00)
			{
				if(iSects & 0x0100)
					xl = Math.max(x, aBndA[y]);
				else
					xl = x;
				if(iSects & 0x0200)
					xr = Math.min(xrDef, aBndZ[y]);
				else
					xr = xrDef;
				y2 = cy + y + (iOdds >> 16);
				w = xr - xl;
				if(w > 0) this.mkDiv(xl, y2, w, h);
			}
		}
	};

	this.setStroke(1);
	this.setFont("verdana,geneva,helvetica,sans-serif", "12px", Font.PLAIN);
	this.color = "#000000";
	this.htm = "";
	this.wnd = wnd || window;

	if(!jg_ok) chkDHTM();
	if(jg_ok)
	{
		if(cnv)
		{
			if(typeof(cnv) == "string")
				this.cont = document.all? (this.wnd.document.all[cnv] || null)
					: document.getElementById? (this.wnd.document.getElementById(cnv) || null)
					: null;
			else if(cnv == window.document)
				this.cont = document.getElementsByTagName("body")[0];
			// If cnv is a direct reference to a canvas DOM node
			// (option suggested by Andreas Luleich)
			else this.cont = cnv;
			// Create new canvas inside container DIV. Thus the drawing and clearing
			// methods won't interfere with the container's inner html.
			// Solution suggested by Vladimir.
			this.cnv = document.createElement("div");
			this.cont.appendChild(this.cnv);
			this.paint = jg_dom? pntCnvDom : pntCnvIe;
		}
		else
			this.paint = pntDoc;
	}
	else
		this.paint = pntN;

	this.setPrintable(false);
}

Array.prototype.mkLinVirt = function(x1, y1, x2, y2)
{
	var dx = Math.abs(x2-x1), dy = Math.abs(y2-y1),
	x = x1, y = y1,
	xIncr = (x1 > x2)? -1 : 1,
	yIncr = (y1 > y2)? -1 : 1,
	p,
	i = 0;
	if(dx >= dy)
	{
		var pr = dy<<1,
		pru = pr - (dx<<1);
		p = pr-dx;
		while(dx > 0)
		{--dx;
			if(p > 0)    //  Increment y
			{
				this[i++] = x;
				y += yIncr;
				p += pru;
			}
			else p += pr;
			x += xIncr;
		}
	}
	else
	{
		var pr = dx<<1,
		pru = pr - (dy<<1);
		p = pr-dy;
		while(dy > 0)
		{--dy;
			y += yIncr;
			this[i++] = x;
			if(p > 0)    //  Increment x
			{
				x += xIncr;
				p += pru;
			}
			else p += pr;
		}
	}
	for(var len = this.length, i = len-i; i;)
		this[len-(i--)] = x;
};

function CompInt(x, y)
{
	return(x - y);
}

// End -->
</script>

<?

function fbarcode($valor){

$fino 	= 1 ;
$largo 	= 3 ;
$altura = 50 ;

  $barcodes[0] = "00110" ;
  $barcodes[1] = "10001" ;
  $barcodes[2] = "01001" ;
  $barcodes[3] = "11000" ;
  $barcodes[4] = "00101" ;
  $barcodes[5] = "10100" ;
  $barcodes[6] = "01100" ;
  $barcodes[7] = "00011" ;
  $barcodes[8] = "10010" ;
  $barcodes[9] = "01010" ;
  for($f1=9;$f1>=0;$f1--){ 
    for($f2=9;$f2>=0;$f2--){  
      $f = ($f1 * 10) + $f2 ;
      $texto = "" ;
      for($i=1;$i<6;$i++){ 
        $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
      }
      $barcodes[$f] = $texto;
    }
  }


//Desenho da barra

//Guarda inicial
?><img src=imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
<?
$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
    src=imagens/p.gif width=<?=$f1?> height=<?=$altura?> border=0><img 
<?
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=imagens/b.gif width=<?=$f2?> height=<?=$altura?> border=0><img 
<?
  }
}

// Draw guarda final
?>
src=imagens/p.gif width=<?=$largo?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/p.gif width=<?=1?> height=<?=$altura?> border=0> 
  <?
}

function SoNumeros($X){
	$tira = array(" ", ",", ".", "-","/");
	for($i=0;$i<strlen($X);$i++){	$X = str_replace($tira[$i],"", $X);	}
	return $X;
}

function colocaZeroEsquerda($X, $digitos){
	$zeros = $digitos - strlen($X);
	for($i=0;$i<$zeros;$i++){	$x .= 0;	}
	$X = $x.$X;
	return $X;
}

	function valorFormatado($x){
		if(empty($x)){
			$valor_retorno = '';
		} else {
   		$valor_retorno = number_format($x, 2, ',' , '.');
			//$valor_retorno = $valor_retorno;
		}
   	return $valor_retorno;
    }


function CodigoDeBarra($valor){

$fino = 1;
$largo = 3;
$altura = 50;

  $barcodes[0] = "00110" ;
  $barcodes[1] = "10001" ;
  $barcodes[2] = "01001" ;
  $barcodes[3] = "11000" ;
  $barcodes[4] = "00101" ;
  $barcodes[5] = "10100" ;
  $barcodes[6] = "01100" ;
  $barcodes[7] = "00011" ;
  $barcodes[8] = "10010" ;
  $barcodes[9] = "01010" ;
  for($f1=9;$f1>=0;$f1--){
    for($f2=9;$f2>=0;$f2--){
      $f = ($f1 * 10) + $f2 ;
      $texto = "" ;
      for($i=1;$i<6;$i++){ 
        $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
      }
      $barcodes[$f] = $texto;
    }
  }


//Desenho da barra


//Guarda inicial
?>
<img src=imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
<?
$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
    src=imagens/p.gif width=<?=$f1?> height=<?=$altura?> border=0><img 
<?
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=imagens/b.gif width=<?=$f2?> height=<?=$altura?> border=0><img 
<?
  }
}

// Draw guarda final
?>
src=imagens/p.gif width=<?=$largo?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/p.gif width=<?=1?> height=<?=$altura?> border=0> 
  <?
} //Fim da função

function esquerda($entra,$comp){
	return substr($entra,0,$comp);
}

function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
}


?>

