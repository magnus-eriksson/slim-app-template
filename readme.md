# Slim Application Template

Simple application folder structure and bootstrapping for quickly getting started with [Slim framework](http://www.slimframework.com/).

### Requirements
* php 5.4+
* [Composer](http://getcomposer.org)

### Installation
```
$ composer create-project maer/slim-app-template
```

### Setup

There are two config files:
* `app/config.global.php` - Here you can see and change all default config parameters for Slim. This file will be sent to Slim on instantiation as the config file. So this is basically where you configure Slim.
* `app/config.env.php` - If you want to change some parameters depending on the environment/server, you can override those parameters here. You should probably add this file to .gitignore so different developers/servers can have their own settings.

I've added the Illuminate\Container to this package to be able to handle dependency injection.

There is also a file called app/start.php which is included right before the routes are called. This would be a good place to register classes for dependency injection and bootstrap other eventual packages you include. 

To get the Slim instance, use the helper `slim()`.

### File structure
```
app/
    Controllers/
    templates/
    config.env.php
    config.global.php
    routes.php
    start.php
 helpers/
    core.php
    misc.php
idefix/
    App.php
public/
    .htaccess
    index.php
```

### Conclusion
This is by no means any "best-practice" structure. I made it to be able to knock out small apps using Slim quickly, and according to the DRY principle, this seemed like a good idea.
To see the the order of things, look at the bootstrap.php-file.

Enjoy and happy coding!
 
