<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
<meta charset="utf-8">
    
    <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
    padding-top: 90px;
            
}
.panel-login {
    border-color: #ccc;
    -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
    color: #00415d;
    background-color: #fff;
    border-color: #fff;
    text-align:center;
}
.panel-login>.panel-heading a{
    text-decoration: none;
    color: #666;
    font-weight: bold;
    font-size: 15px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
    color: #029f5b;
    font-size: 18px;
}
.panel-login>.panel-heading hr{
    margin-top: 10px;
    margin-bottom: 0px;
    clear: both;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
    height: 45px;
    border: 1px solid #ddd;
    font-size: 16px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
    outline:none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-color: #ccc;
}
.btn-login {
    background-color: #1CB94E;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #1CB94A;
}
.btn-login:hover,
.btn-login:focus {
    color: #fff;
    background-color: #1CB94E;
    border-color: #53A3CD;
}
.forgot-password {
    text-decoration: underline;
    color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
    text-decoration: underline;
    color: #666;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
   
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                             <div class="text-center mb-4">
                            <img width="300px" height="230px" src="imagens/logo.png"/>
                            <hr>
                            <br>
                            
                            <p style="font-size:180%; rgb(0, 0, 0); ">Recuperação enviada com sucesso!</p>
                        
                            <br>
                        <hr>
                    </div>

</html>

<?php

/* ############################################# AVISOS DE POSSÍVEIS MELHORIAS! #############################################
1 - Verificar se o campo da pagina recuperar-senha.php está em branco e redigir um erro caso seja verdadeiro
2 - Colocar tempo no link enviado por email
3 - Enviar link por email
4 - Vincular ao banco de dados a senha temporário gerada pelo sistema.
5 - Retornar a tela de login após clicar no link enviado por email, após ter feito o logon, mostrar imediatamente a tela de troca de senha.
6 - Formatar o texto que será enviado por email. */

if(isset($_POST['senha-submit'])){

    //-----------------------------------------GERADOR DE SENHA ---------------------------------------------------------

// Função que cria a senha 
    function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
{

// Armazenamento dos caracteres que estarão na senha.
$lmin = 'abcdefghijklmnopqrstuvwxyz';
$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$num = '1234567890';
$simb = '!@#$%*-';

$retorno = '';
$caracteres = '';

$caracteres .= $lmin;
if ($maiusculas) $caracteres .= $lmai;
if ($numeros) $caracteres .= $num;
if ($simbolos) $caracteres .= $simb;
// Calcula o total de caracteres possíveis
$len = strlen($caracteres);
for ($n = 1; $n <= $tamanho; $n++) {
// Cria um número aleatório de 1 até $len para pegar um dos caracteres
$rand = mt_rand(1, $len);
// Concatena um dos caracteres na variável $retorno
$retorno .= $caracteres[$rand-1];
}
return $retorno;
}
//Atribui a senha (qtd caracteres, letras maiusculas, numeros, simbolos).
 $senha = geraSenha(8, true, true, true);

    $destinatario = $_POST["prontuario"];

    require_once("class.phpmailer.php");
    //Nova instância do PHPMailer
    $mail = new PHPMailer;
    //Informa que será utilizado o SMTP para envio do e-mail
    $mail->IsSMTP();
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = 'mx1.hostinger.com.br';      // sets GMAIL as the SMTP server
    $mail->Username =  "contato@infoprojweb.tk";
    $mail->Password =   "123Info45!";

    //Titulo do e-mail
    $mail->Subject  =   "Recuperacao de senha";

    //Preenchimento do campo FROM do e-mail
    $mail->From = "contato@infoprojweb.tk";
    $mail->FromName = "Departamento de seguranca";

    //Email do destinatario
    $mail->AddAddress("".$destinatario);

    // MENSAGEM DO EMAIL
    $mail->Body =  "Parabéns!
    Sua senha foi gerada com sucesso. 
    Ela permite que você crie uma nova senha em nosso site e tenha acesso ao nosso conteúdo. 
    Bom trabalho! 
    Senha de acesso: " . $senha . 

    "      Link para acesso: http://infoprojweb.tk/login.php ";

    //Envia o e-mail
    $enviadoSite = $mail->Send();
    
    
}
?>
