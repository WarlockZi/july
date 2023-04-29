<?php
echo 'before';
require __DIR__.'/core/bootstrap.php';
$app = new App();
$app->run();
echo 'after';


