<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    
    <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
<link rel="stylesheet" type="text/css" href="css/confirmacao-cadastro.css">

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
							
							<p style="font-size:180%; rgb(0, 0, 0); ">Cadastro efetuado com sucesso!</p>
						
							<br>
						<hr>
					</div>

</body>
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

    $destinatario = $_POST["email"];

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
    Cadastro Efetuado com sucesso! 
    Bom trabalho! 
    Senha de acesso: " . $senha . 

    "      Link para acesso: http://infoprojweb.tk/login.php ";

    //Envia o e-mail
    $enviadoSite = $mail->Send();
    
    
 ?>