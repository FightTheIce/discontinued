<?php

namespace FightTheIce\Uname;

class Uname
{
    protected $modes = array(
        'a' => array(
            'key'         => 'a',
            'description' => 'This is the default. Contains all modes in the sequence "s n r v m".',
        ),
        's' => array(
            'key'         => 's',
            'description' => 'Operating system name. eg. FreeBSD.',
        ),
        'n' => array(
            'key'         => 'n',
            'description' => 'Host name. eg. localhost.example.com.',
        ),
        'r' => array(
            'key'         => 'r',
            'description' => 'Release name. eg. 5.1.2-RELEASE.',
        ),
        'v' => array(
            'key'         => 'v',
            'description' => 'Version information. Varies a lot between operating systems.',
        ),
        'm' => array(
            'key'         => 'm',
            'description' => 'Machine type. eg. i386.',
        ),
    );

    protected $data = array(
    );

    public function parse()
    {
        foreach (array_keys($this->modes) as $mode) {
            $this->data[$mode] = php_uname($mode);
        }
    }

    public function get($mode = 'a')
    {
        if (count($this->data) == 0) {
            $this->parse();
        }

        return $this->data[$mode];
    }

    public function getAll()
    {
        return $this->get('a');
    }

    public function getOs()
    {
        return $this->get('s');
    }

    public function getHostname()
    {
        return $this->get('n');
    }

    public function getReleaseName()
    {
        return $this->get('r');
    }

    public function getVersion()
    {
        return $this->get('v');
    }

    public function getMachineType()
    {
        return $this->get('m');
    }

    public function getData()
    {
        return $this->data;
    }
}
