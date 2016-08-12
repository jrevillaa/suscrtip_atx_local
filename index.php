<?php
global $DB, $PAGE, $OUTPUT;
require_once("../../config.php");
require_once($CFG->libdir.'/adminlib.php');
require_login();
$context = context_system::instance();
$main_url = new moodle_url('/local/atx_suscript/index.php');
$PAGE->set_context($context);
$PAGE->set_url($main_url);
$title = 'Listado de Suscripciones';
$PAGE->set_title($title);
$PAGE->set_heading($title);
print $OUTPUT->header();
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

echo html_writer::table($tabla)   ;
   $url = new moodle_url('/local/atx_suscript/export.php');
  $text = 'Exportar Suscripciones'; //Translate this
  print html_writer::link($url,$text,array('class'=>'btn btn-default'));
  print html_writer::empty_tag('br');
print $OUTPUT->footer();