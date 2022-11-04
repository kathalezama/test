<?php


require '../config/database.php';

$citas = App\entities\_citas::get();
include "../resources/views/list.php";