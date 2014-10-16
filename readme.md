# Slim Application Template

Simple application folder structure and bootstrapping for quickly getting started with [Slim framework](http://www.slimframework.com/).

### Requirements
* php 5.4+
* [Composer](http://getcomposer.org)

### Installation
```
$ composer create-project maer/slim-app-template
$ composer install
```

### Setup
```
$ cd /path/to/package/folder
$ chmod +w app/logs
```

There are two config files:
* `app/config.global.php` - Here you can see and change all default config parameters for Slim. This file will be sent to Slim on instantiation as the config file. So this is basically where you configure Slim.
* `app/config.env.php` - If you want to change some parameters depending on the environment/server, you can override those parameters here. You should probably add this file to .gitignore so different developers/servers can have their own settings.

### File structure
```
app/
    logs/
    templates/
    config.env.php
    config.global.php
    routes.php
    start.php
 helpers/
    misc.php
public/
    .htaccess
    index.php
```

### Conclusion
This is by no means any "best-practice" structure. I made it to be able to knock out small apps using Slim quickly. And according to the DRY principle, this seemd like a good idea.
To see in what order things happen, look at the bootrap.php-file and you will get a good grasp. Not much is really happening.

Enjoy and happy coding!
 
