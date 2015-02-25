<?php
/**
 * App Routes
 * ----------------------------------------------------------
 * Use the available Slim instnance in slim()
 */

slim()->get('/', function() {

    controller('HomeController')->showHome();

});
