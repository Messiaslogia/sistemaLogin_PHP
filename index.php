<?php

include_once __DIR__.'/app/core/Core.php';

include_once __DIR__.'/lib/DataBase/Connection.php';

include_once __DIR__.'/app/controller/LoginController.php';
include_once __DIR__.'/app/model/User.php';

include_once __DIR__.'/vendor/autoload.php';

$core = new Core();
echo $core->parametersURL($_GET);

?>