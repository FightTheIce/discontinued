<?php

namespace FightTheIce\Illuminate;

use FightTheIce\Illuminate\Bundle\AliasLoader;
use FightTheIce\Illuminate\Container as FTI_Container;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Database;
use Illuminate\Events\Dispatcher as Events;
use Illuminate\Support\Facades\Facade;
use Webmozart\Assert\Assert;

class Bundle
{
    protected $container = null;
    protected $events    = null;
    protected $database  = null;

    public function setContainer($container)
    {
        $this->container = $container;

        return $this;
    }

    public function setupContainer()
    {
        return $this->setContainer(new Container);
    }

    public function setupPSRContainer()
    {
        return $this->setContainer(new FTI_Container);
    }

    public function getContainer()
    {
        if (is_null($this->container)) {
            $this->setupPSRContainer();
        }

        return $this->container;
    }

    public function setEvents($events)
    {
        $this->events = $events;

        return $this;
    }

    public function setupEvents()
    {
        return $this->setEvents(new Events($this->getContainer()));
    }

    public function getEvents()
    {
        if (is_null($this->events)) {
            $this->setupEvents();
        }

        return $this->events;
    }

    public function setDatabase($database)
    {
        $this->database = $database;

        return $this;
    }

    public function setupDatabase()
    {
        $this->setDatabase(new Database($this->getContainer()));
        $this->database->setContainer($this->getContainer());
        $this->database->setEventDispatcher($this->getEvents());
        $this->database->setAsGlobal();
        $this->database->bootEloquent();

        return $this;
    }

    public function getDatabase()
    {
        if (is_null($this->database)) {
            $this->setupDatabase();
        }

        return $this->database;
    }

    public function setupFacades($aliases)
    {
        Assert::isArray($aliases);

        Facade::setFacadeApplication($this->getContainer());
        AliasLoader::getInstance($aliases)->register();

        return $this;
    }
}
