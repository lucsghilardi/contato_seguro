<?php




class Contato extends Conexao  

{
	public $data_site;
	public $data_envio;
	public $nome;
	public $mensagem;
    public $telefone;
	public $mail;
	public $email;
	//public $private_key='6LdLT7kcAAAAADvKW0GvzCR_Af-2gzyQVL0xms8I';
	public $hash;
	public $hash_verifica;
	public $segundos_trava;
	//EMAIL
	public $mail_usuario;
	public $mail_senha;
	public $mail_titulo;
	public $mail_porta ;
	public $destinatario ;
	public $mail_host;
	public $mail_nome;

	public $mail_corpo;
	



	public function contatoGravar() {

		//Bloqueio tempo
		$verifica = $this->bloqueioTempo();
		//verifica hash
		$verifica2 = $this->bloqueiaHash();

		if (($verifica =='ok')&& ($verifica2 =='ok'))

		{
			$conexao = $this->conexao();
			$stmt = $conexao->prepare("INSERT INTO contato (nome,email,mensagem,telefone) VALUES (?,?,?,?)");
			$stmt->bind_param("ssss", $this->nome,$this->email,$this->mensagem,$this->telefone);
			$stmt->execute();

		}
	}

	public function contatoEnviar() {

		//Bloqueio tempo
		$verifica = $this->bloqueioTempo();
		//verifica hash
		$verifica2 = $this->bloqueiaHash();
		if (($verifica =='ok')&& ($verifica2 =='ok'))

		{
			
			try {



				//Server settings
				$this->mail->SMTPDebug ='0';                      //Enable verbose debug output
				$this->mail->isSMTP();                                            //Send using SMTP
				$this->mail->Host       = $this ->mail_host;                  //Set the SMTP server to send through
				$this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$this->mail->Username   = $this->mail_usuario;                 //SMTP username
				$this->mail->Password   = $this->mail_senha;                              //SMTP password
			   // $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
				$this->mail->Port       = $this->mail_porta;                                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
				//Recipients
				$this->mail->setFrom($this->mail_usuario, $this->mail_nome);
				$this->mail->addAddress($this->destinatario, 'Teste');     //Add a recipient
			  
			
				//Content
				$data=date('d/m/Y');
				$this->mail->isHTML(true);                                  //Set email format to HTML
				$this->mail->Subject = $this->mail_titulo;
				$this->mail->Body    = $this->mail_corpo;
				$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
				if(!$this->mail->Send())
				{
					echo "Error sending: " . $this->ErrorInfo;
				}
				else
				{
				return 'enviook';
				}
			   // echo 'Message has been sent';
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
			}




		}
	}


	public function bloqueioTempo()
	{

		$data1  = new DateTime($this->data_site);
		$data_envio=date('Y-m-d H:i:s');
		$data2 = new DateTime($data_envio);
		$intvl = $data1->diff($data2);
		$segundos = $intvl->s;
		$minutos = $intvl->i;

		$minutos;

		if ($segundos >=$this->segundos_trava)
		{
			return 'ok';

		}
		else
		{
			if ($minutos >=1)
			{
				//echo 'ok';
				return 'ok';
			}
			else
			{
				return 'error';
			}
		}

	}
	public function bloqueiaHash()

	{

		if ($this->hash == $this->hash_verifica )
		{
			return 'ok';
		}
		else
		{
			return 'error';
		}


	}


}



?>
