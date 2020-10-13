<?php

namespace FightTheIce\Apache;

class VirtualHost
{
    protected $ip   = null;
    protected $port = null;

    protected $contents  = array();
    protected $ifModules = array();

    public function setServerAdmin($email)
    {
        $this->contents[] = 'ServerAdmin ' . $email;

        return $this;
    }

    public function setServerName($name)
    {
        $this->contents[] = 'ServerName ' . $name;

        return $this;
    }

    public function setServerAlias($aliases)
    {
        $allAliases = array();

        //make sure aliases is an array
        foreach ($aliases as $al) {
            $x = explode(',', $al);

            foreach ($x as $l) {
                if (!in_array($al, $allAliases)) {
                    $allAliases[] = $l;
                }
            }
        }

        $this->contents[] = 'ServerAlias ' . implode(' ', $allAliases);

        return $this;
    }

    public function setDocumentRoot($path)
    {
        $this->contents[] = 'DocumentRoot "' . rtrim(ltrim($path, '"'), '"') . '"';

        return $this;
    }

    public function setSSLEngine($value)
    {
        $value = ucfirst(strtolower($value));

        $valid = array('On', 'Off');
        if (!in_array($value, $valid)) {
            throw new \ErrorException('Some exception');
        }

        $this->contents[] = 'SSLEngine ' . $value;

        return $this;
    }

    public function addComment($comment)
    {
        $this->contents[] = '#' . ltrim($comment, '#');

        return $this;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    public function getIp()
    {
        if (is_null($this->ip)) {
            return '*';
        }

        return $this->ip;
    }

    public function getPort()
    {
        if (is_null($this->port)) {
            return '80';
        }

        return $this->port;
    }

    public function newLine()
    {
        $this->contents[] = '';

        return $this;
    }

    public function setSSLCertificateFile($path)
    {
        $this->contents[] = 'SSLCertificateFile ' . $path;

        return $this;
    }

    public function setSSLCertificateKeyFile($path)
    {
        $this->contents[] = 'SSLCertificateKeyFile ' . $path;

        return $this;
    }

    public function addDirectory($dir)
    {
        $this->contents[] = $dir->generate();

        return $this;
    }

    public function addIfModule($module)
    {
        $this->ifModules[] = $module;

        return $this;
    }

    public function generate()
    {
        foreach ($this->contents as &$content) {
            $content = '    ' . $content;
        }

        $end = '<VirtualHost ' . $this->getIp() . ':' . $this->getPort() . '>' . PHP_EOL . implode(PHP_EOL, $this->contents) . PHP_EOL . '</VirtualHost>';

        if (count($this->ifModules) > 0) {
            foreach ($this->ifModules as $mod) {
                $moo = explode(PHP_EOL, $end);
                foreach ($moo as &$cow) {
                    $cow = '    ' . $cow;
                }
                $end = implode(PHP_EOL, $moo);

                $end = '<IfModule ' . $mod . '>' . PHP_EOL . $end . PHP_EOL . '</IfModule>';
            }

        }

        return $end;
    }

    public function getRawContents()
    {
        return $this->contents;
    }

    public function cloneHost($host)
    {
        $this->contents = $host->getRawContents();

        return $this;
    }

    public function setCustomLog($path, $value = 'combined')
    {
        $this->contents[] = 'CustomLog "' . rtrim(ltrim($path, '"'), '"') . '" ' . $value;

        return $this;
    }

    public function setErrorLog($path)
    {
        $this->contents[] = 'ErrorLog "' . rtrim(ltrim($path, '"'), '"') . '"';

        return $this;
    }
}
