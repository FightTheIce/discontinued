<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\Error
    [1] => Error
    [2] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class ErrorTest extends \PHPUnit\Framework\TestCase
{
    public function test_Error_FightTheIce_Exceptions_Error()
    {
        $this->expectException(\FightTheIce\Exceptions\Error::class);
        throw new \FightTheIce\Exceptions\Error("FightTheIce\Exceptions\Error->Exception");
    }

    public function test_Error_Error()
    {
        $this->expectException(\Error::class);
        throw new \FightTheIce\Exceptions\Error("Error->Exception");
    }

    public function test_Error_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\Error("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_Error_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\Error;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_Error_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\Error::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\Error('Custom Message', 1);
    }

    public function test_Error_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\Error;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
