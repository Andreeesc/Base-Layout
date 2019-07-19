<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
 // Adiciona o arquivo class.phpmailer.php - você deve especificar corretamente o caminho da pasta com o este arquivo.
 require_once("PHPMailerAutoload.php");
 // Inicia a classe PHPMailer

		 $mail = new PHPMailer();
		 // DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
		 $mail->IsSMTP(); // Define que a mensagem será SMTP
		 $mail->Host = "smtp.fgmassociados.com.br"; // Seu endereço de host SMTP
		 $mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
		 $mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
		 $mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
		 $mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
		 $mail->Username = 'envio@fgmassociados.com.br'; // Conta de email existente e ativa em seu domínio
		 $mail->Password = 'q1w2e3r4t5'; // Senha da sua conta de email
		 // DADOS DO REMETENTE
		 $mail->Sender = "envio@fgmassociados.com.br"; // Conta de email existente e ativa em seu domínio
		 $mail->From = "envio@fgmassociados.com.br"; // Sua conta de email que será remetente da mensagem
		 $mail->FromName = "FGM Associados"; // Nome da conta de email
		 // DADOS DO DESTINATÁRIO
		 $mail->AddAddress('contato@fgmassociados.com.br'); // Define qual conta de email receberá a mensagem
		 //$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
		 $mail->AddCC('andre.castro@incandescente.com.br'); // Define qual conta de email receberá uma cópia
		 //$mail->AddBCC('vinicius.lucio@incandescente.com.br, nattan.dias@incandescente.com.br'); // Define qual conta de email receberá uma cópia oculta
		 // Definição de HTML/codificação
		 $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		 $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
		 // DEFINIÇÃO DA MENSAGEM
		 $mail->Subject  = "Formulário de Contato"; // Assunto da mensagem

		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$service = $_POST['service'];
		$message = $_POST['message'];
			
		$mail->Body .= "<table width='100%' border='0' cellspacing='0' cellpadding='8' style='font-family:tahoma;'>
					          <tr>
					            <td colspan='2'>
					              <h2>FGM Associados - Contato</h2>
					            </td>
					          </tr>";

		$mail->Body .= "<tr bgcolor='#D1D1D1'>
			            <td width='100'><strong>Nome:</strong></td>
						<td>".$name."</td></tr>"; // Texto da mensagem
		$mail->Body .= "<tr bgcolor='#ddd'>
						<td width='100'><strong>Telefone:</strong></td>
						<td>".$phone."</td></tr>"; // Texto da mensagem
		$mail->Body .= "<tr bgcolor='#D1D1D1'>
						<td width='100'><strong>Email:</strong></td>
						<td>".$email."</td></tr>"; // Texto da mensagem
		$mail->Body .= "<tr bgcolor='#ddd'>
						<td width='100'><strong>Serviços:</strong></td>
						<td>".$service."</td></tr>"; // Texto da mensagem
		$mail->Body .= "<tr bgcolor='#ddd'>
						<td width='100'><strong>Mensagem:</strong></td>
						<td>".$message."</td></tr>"; // Texto da mensagem


		$mail->Body .= "</table>";

		 // ENVIO DO EMAIL
		 $enviado = $mail->Send();
		 // Limpa os destinatários e os anexos
		 $mail->ClearAllRecipients();
		 // Exibe uma mensagem de resultado do envio (sucesso/erro)
		 if ($enviado) {
		   echo("<script type='text/javascript'> alert('Obrigado por entrar em contato!'); location.href='/';</script>");
		 } else {
		   //echo "Detalhes do erro: " . $mail->ErrorInfo;
		   echo("<script type='text/javascript'> alert('Não foi possível enviar o formulário.'); location.href='/';</script>");
		 }
