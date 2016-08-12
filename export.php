<?php
global $DB, $PAGE, $OUTPUT;
require_once("../../config.php");
require_once($CFG->libdir.'/adminlib.php');
require_login();

//print $OUTPUT->header();
$tabla = new html_table();
   $tabla->head = array(
                        'Nro',
                        'Email'                     

                    );
   $email = $DB->get_records('local_atx_suscript_emails', array());
   //print_r($email);
   $count = 0;
   foreach ($email as $e) {
   	# code...
   	 $count++;
   	 //echo $e->email;
   	 $row = new stdClass;
     $row->Nro = $count;
     $row->Email = $e->email;
     //print_r($row);
     $tabla->data[] = $row;
   }
  header('Content-Type: application/vnd.ms-excel; charset=UTF-8'); // This should work for IE & Opera
  header("Content-type: application/x-msexcel; charset=UTF-8"); // This should work for the rest
  header("Content-Disposition: attachment; filename=reporte.xls");  //File name extension was wrong
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: private",false);
  echo html_writer::table($tabla)   ;

//print $OUTPUT->footer();