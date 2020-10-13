<?php

namespace FightTheIce\Apache;

class Directory
{
    protected $contents = array();

    protected $path = null;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function setDirectoryIndex($index)
    {
        $this->contents[] = 'DirectoryIndex ' . $index;

        return $this;
    }

    public function setAllowOverride($options)
    {
        $this->contents[] = 'AllowOverride ' . $options;

        return $this;
    }

    public function setRequire($options)
    {
        $this->contents[] = 'Require ' . $options;

        return $this;
    }

    public function addComment($comment)
    {
        $this->contents[] = '#' . ltrim($comment, '#');

        return $this;
    }

    public function newLine()
    {
        $this->contents[] = '';

        return $this;
    }

    public function generate()
    {
        foreach ($this->contents as &$content) {
            $content = '        ' . $content;
        }

        return '<Directory "' . $this->path . '">' . PHP_EOL . implode(PHP_EOL, $this->contents) . PHP_EOL . '    </Directory>';
    }
}
