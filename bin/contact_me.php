<?php
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['phone']) 		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Nie uzupełniono pól!";
	return false;
   }
	
$name = $_POST['name'];
$phone = $_POST['phone'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$upload_folder = './uploads/';
	
// create email body and send it	
$to = 'biuro@meblerecznierobione.pl'; // PUT YOUR EMAIL ADDRESS HERE
$email_subject = "Zapytanie ze strony od:  $name"; // EDIT THE EMAIL SUBJECT LINE HERE
$email_body = "Otrzymałeś maila z formularza kontaktowego swojej strony.\n\n"."Poniżej szczegóły:\n\nImię i nazwisko: $name\n\nTelefon: $phone\n\nEmail: $email_address\n\nWiadomość:\n$message";
$headers = "Od: $email_address";
$headers .= "Odpowiedz do: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>