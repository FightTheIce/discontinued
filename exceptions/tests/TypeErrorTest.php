<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\TypeError
    [1] => TypeError
    [2] => Error
    [3] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class TypeErrorTest extends \PHPUnit\Framework\TestCase
{
    public function test_TypeError_FightTheIce_Exceptions_TypeError()
    {
        $this->expectException(\FightTheIce\Exceptions\TypeError::class);
        throw new \FightTheIce\Exceptions\TypeError("FightTheIce\Exceptions\TypeError->Exception");
    }

    public function test_TypeError_TypeError()
    {
        $this->expectException(\TypeError::class);
        throw new \FightTheIce\Exceptions\TypeError("TypeError->Exception");
    }

    public function test_TypeError_Error()
    {
        $this->expectException(\Error::class);
        throw new \FightTheIce\Exceptions\TypeError("Error->Exception");
    }

    public function test_TypeError_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\TypeError("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_TypeError_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\TypeError;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_TypeError_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\TypeError::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\TypeError('Custom Message', 1);
    }

    public function test_TypeError_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\TypeError;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
