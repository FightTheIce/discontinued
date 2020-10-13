# FightTheIce\Illuminate\Bundle - A Bundle that provides my favorite Illuminate packages for quick use.

FTI Illuminate\Bundle includes the Illuminate\Container, Illuminate\Events, Illuminate\Database and components. 
A boostraping class binds them all togther for quick usage (without setup).

## Installation

Install the latest version with

```bash
$ composer require fighttheice/illuminate-bundle
```

## Basic Usage

```php
<?php

use FightTheIce\Illuminate\Bundle;

$bundle = new Bundle;

$container = $bundle->getContainer(); //will return a FightTheIce\Illuminate\Container object that implements PSR\Container
$dbManager = $bundle->getDatabase(); //will return Illuminate\Database\Capsule\Manager
$events    = $bundle->getEvents(); //will return Illuminate\Events\Dispatcher
```

## Methods

Method | # Of Parameters| Parameters | Description
------ | -------------- | ---------- | -----------
setContainer|1|$container|Tells the bundle to use an existing Illuminate\Container object
setupContainer|0||Create an unadultered Illuminate\Container object
setupPSRContainer|0||Create a FightTheIce\Illuminate\Container object that implements PSR\Container
getContainer|0||Returns the container object that is in use by the bundle - Will create one if one has not been setup yet
setEvents|1|$events|Tells the bundle to use an existing Illuminate\Events\Dispatcher object
setupEvents|0||Tells the bundle to create a new Illuminate\Events\Dispatcher object
getEvents|0||Returns the Illuminate\Events\Dispatcher object that is in use by the bundle - Will create one if one has not been setup yet
setDatabase|1|$database|Tells the bundle use an existing Illuminate\Database\Capsule\Manager object
setupDatabase|0||Create an Illuminate\Database\Capsule\Manager object
getDatabase|0||Returns the existing Illuminate\Database\Capsule\Manager object - Will create on if one has not been setup yet
