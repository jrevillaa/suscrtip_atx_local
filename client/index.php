<?php


require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
include_once($CFG->dirroot . '/local/atx_suscript/model.php');


$atx_suscript = new atx_suscript_Model();

$logo_second = $atx_suscript->get_image_course(30);
    echo "<pre>";
    print_r($logo_second);
    echo "</pre>";


    $sql = 'SELECT l.name, l.timecreated, l.image, l.description
				FROM {atx_suscript_entry} l
                WHERE description LIKE  "%' . 30 . ',%"';
    $params = array(15);

			$link = $DB->get_record_sql($sql,$params);

	echo "<pre>";
    print_r($link);
    echo "</pre>";	