<?php
/**
 * App Routes
 * ----------------------------------------------------------
 * Use the available Slim instnance in $app
 */

$app->get('/', function() use($app) {

    echo $app->render('home.php');

});