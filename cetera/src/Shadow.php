<?php

namespace FightTheIce\Cetera;

use Webmozart\Assert\Assert;

class Shadow
{
    protected $path    = '';
    protected $results = array();

    public function __construct($path = null)
    {
        if (!is_null($path)) {
            $this->setPath($path);
        }
    }

    public function setPath($path)
    {
        Assert::string($path);

        if (!file_exists($path)) {
            throw new \ErrorException('The path: [' . $path . '] does not exists!');
        }

        if (!is_readable($path)) {
            throw new \ErrorException('The path:[' . $path . '] is not readable!');
        }

        $this->path = $path;

        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function parse()
    {
        if (count($this->results) > 0) {
            return $this;
        }

        $contents      = file($this->getPath());
        $countContents = count($contents);

        if ($countContents == 0) {
            throw new \ErrorException('The file: [' . $this->getPath() . '] contains no parsible data!');
        }

        $results = array();
        for ($a = 0; $a < $countContents; $a++) {
            $row    = &$contents[$a];
            $xplode = explode(':', $row);

            $temp = array(
                'username'    => $xplode[0],
                'password'    => $xplode[1],
                'lastchanged' => $xplode[2],
                'minimum'     => $xplode[3],
                'maximum'     => $xplode[4],
                'warn'        => $xplode[5],
                'inactive'    => $xplode[6],
                'expire'      => $xplode[7],
            );

            $results[] = $temp;
        }

        $this->results = $results;

        return $this;
    }

    public function getResults()
    {
        return $this->results;
    }

    public function getResultCollection()
    {
        $this->parse();

        return collect($this->results);
    }
}
