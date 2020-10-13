# FightTheIce\Uname\Uname - A PHP helper library that attempts to provide information about the underlying operating system

## Installation

Install the latest version with

```bash
$ composer require fighttheice/uname
```

## Basic Usage

```php
<?php

use FightTheIce\Uname\Uname;

$uname = new Uname;

$allInformation = $uname->getAll();
$os             = $uname->getOs();
$hostname       = $uname->getHostname();
$releaseName    = $uname->getReleaseName();
$version        = $uname->getVersion();
$machineType    = $uname->getMachineType();
```

## Methods

Method | # Of Parameters| Parameters | Description
------ | -------------- | ---------- | -----------
parse|0||Builds an array of uname modes|
get|1|$mode|Returns a particule uname string based on the mode provided|
getAll|0||Returns all of the uname strings generated|
getOs|0||Returns the base operating system name|
getHostname|0||Returns the hostname of the server|
getReleaseName|0||Returns the release name of the base operating system|
getVersion|0||Returns the base operating system version number|
getMachineType|0||Returns the machine type of the base operating system|
