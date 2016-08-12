<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');

Global $DB,$CFG;


//Para insertar vamos a usar esta función del core de moodle;

if(!isset($_POST['email'] )){
  throw new moodle_exception('Not Exist');
}

$email=$_POST['email'] ;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    throw new moodle_exception('Esta dirección de correo no es válida');
}

$clase=new stdClass();
$clase->email=$email;
$clase->timecreated=time();
$DB->insert_record('local_atx_suscript_emails',  $clase,  $returnid=true,  $bulk=false);
//$CFG->wwwroot
//redirect($CFG->wwwroot, 'THANKS TO SUBSCRIBE', 10);

$to = $clase->email;
$subject = "Welcom";
$txt = "Gracias por suscribirse";
$headers = "From: crojas@atypax.com" . "\r\n" .
"CC: jair@atypax.com, crojas@atypax.com";

if(mail($to,$subject,$txt,$headers)
){
  redirect($CFG->wwwroot, 'THANKS TO SUBSCRIBE', 10);
}
