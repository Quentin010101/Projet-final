<?php
session_start();

require_once('./controler/sign.contr.php');
require_once('./controler/home.contr.php');
require_once('./controler/userAccount.contr.php');
require_once('./controler/journey.contr.php');
require_once('./modele/utility/Application.php');
require_once('./modele/utility/Redirect.php');
require_once('./modele/utility/Render.php');
require_once('./modele/Reservation.php');


Application::process();

