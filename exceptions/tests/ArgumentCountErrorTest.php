<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\ArgumentCountError
    [1] => ArgumentCountError
    [2] => TypeError
    [3] => Error
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class ArgumentCountErrorTest extends \PHPUnit\Framework\TestCase
{
    public function test_ArgumentCountError_FightTheIce_Exceptions_ArgumentCountError()
    {
        $this->expectException(\FightTheIce\Exceptions\ArgumentCountError::class);
        throw new \FightTheIce\Exceptions\ArgumentCountError("FightTheIce\Exceptions\ArgumentCountError->Exception");
    }

    public function test_ArgumentCountError_ArgumentCountError()
    {
        $this->expectException(\ArgumentCountError::class);
        throw new \FightTheIce\Exceptions\ArgumentCountError("ArgumentCountError->Exception");
    }

    public function test_ArgumentCountError_TypeError()
    {
        $this->expectException(\TypeError::class);
        throw new \FightTheIce\Exceptions\ArgumentCountError("TypeError->Exception");
    }

    public function test_ArgumentCountError_Error()
    {
        $this->expectException(\Error::class);
        throw new \FightTheIce\Exceptions\ArgumentCountError("Error->Exception");
    }

    public function test_ArgumentCountError_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\ArgumentCountError("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_ArgumentCountError_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\ArgumentCountError;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_ArgumentCountError_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\ArgumentCountError::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\ArgumentCountError('Custom Message', 1);
    }

    public function test_ArgumentCountError_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\ArgumentCountError;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
