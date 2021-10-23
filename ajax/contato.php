<?php

header('Content-Type: application/json; charset=utf-8');
session_start();

include('../class/Conexao.php');
include('../class/Contato.php');
include('../Conexao.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
$mail = new PHPMailer(true);
//Create an instance; passing `true` enables exceptions

$data_envio           = date('Y-m-d H: i: s');
$modal                = new Contato();
$modal->nome          = $_POST['nome'];
$modal->email         = $_POST['email'];
$modal->telefone      = $_POST['telefone'];
$modal->mensagem      = $_POST['mensagem'];
$modal->data_site     = $_SESSION['data_site'];
$modal->hash          = $_POST['emailv'];
$modal->hash_verifica = $_SESSION['hash'];
$modal->segundos_trava = 15;

//Configuração disparo do e-mail
$modal->mail = $mail;


$modal->mail_host    = 'host';
$modal->mail_usuario = 'envios@email.com.br';
$modal->mail_nome    = 'Envio Site';
$modal->mail_senha   = '33333';
$modal->mail_titulo  = 'Contato Site';
$modal->mail_porta   = '587'; 
$modal->destinatario ='teste@gmail.com';

$modal->mail_corpo = '
				<html>
					<body>
						<center style="color: #333">
							<table width="620" border="0" cellpadding="0" style="background-color: #eeeeee; padding-top: 20px; padding-bottom: 20px;">
								<tr>
									<td align="center">
									Envio Site
									</td>
								</tr>
							</table>
							<table width="620" border="0" cellpadding="0" style="background-color: #fff">
								<tr>
									<td align="left" style="font-family: verdana">
										<br>
										
										<b>Nome :</b> '.utf8_decode($modal->nome ).'<br>
										<b>E-Mail:</b> '.utf8_decode($modal->email).'<br>
										<b>Telefone:</b> '.$modal->telefone.'<br>
										<b>Mensagem:</b> '.$modal->mensagem.'<br><br>
										<br>
										
									</td>
								</tr>
							</table>
							<table width="620" border="0" cellpadding="0" style="background-color: #eeeeee; padding-top: 20px; padding-bottom: 20px;">
								<tr>
									<td align="center">
									</td>
								</tr>
							</table>
						</center>
					</body>
				</html>
			';

 $retorno['banco'] = $modal->contatoGravar();
 $retorno['status'] = $modal->contatoEnviar();

echo json_encode($retorno);


?>