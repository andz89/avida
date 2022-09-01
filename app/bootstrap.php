<?php

//load config
require_once 'config/config.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/button_helper.php';
require_once 'helpers/section_helper.php';
require_once 'helpers/room_template.php';



//autoload core libraries
spl_autoload_register(function($className){

    require_once 'libraries/' . $className .'.php';
});