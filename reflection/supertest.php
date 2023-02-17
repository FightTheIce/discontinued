<?php

include 'vendor/autoload.php';

$classes = include 'vendor/composer/autoload_classmap.php';
$results = array();
foreach ($classes as $name => $path) {
    $tmp = array(
        'class'     => $name,
        'error'     => false,
        'exception' => '',
        'path'      => '',
    );

    $reflection = null;

    try {
        $reflection = new FightTheIce\Coding\ClassReflection($name);
    } catch (\Exception $e) {
        $tmp['error']     = true;
        $tmp['exception'] = $e->getMessage();
    }

    if ($tmp['error'] == false) {
        $tmp['path'] = $reflection->getFileName();

        try {
            $reflection->getConstants();
        } catch (\Exception $e) {
            $tmp['error']     = true;
            $tmp['exception'] = $e->getMessage();
        }
    }

    $results[] = $tmp;
}

//rebundle
$rebundle = array();
foreach ($results as $result) {
    if ($result['error'] == true) {
        $rebundle[] = $result;
    }
}

print_r($rebundle);