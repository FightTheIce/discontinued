<?php

namespace FightTheIce\Filesystem;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem as S_Filesystem;

class Filesystem extends S_Filesystem
{
    public function prependToFile($filename, $content)
    {
        $dir = \dirname($filename);
        if (!is_dir($dir)) {
            $this->mkdir($dir);
        }
        if (!is_writable($dir)) {
            throw new IOException(sprintf('Unable to write to the "%s" directory.', $dir), 0, null, $dir);
        }
        if (false === @file_put_contents($filename, $content . PHP_EOL . file_get_contents($filename))) {
            throw new IOException(sprintf('Failed to write file "%s".', $filename), 0, null, $filename);
        }
    }
}
