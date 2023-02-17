<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\AssertionError
    [1] => AssertionError
    [2] => Error
    [3] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class AssertionErrorTest extends \PHPUnit\Framework\TestCase
{
    public function test_AssertionError_FightTheIce_Exceptions_AssertionError()
    {
        $this->expectException(\FightTheIce\Exceptions\AssertionError::class);
        throw new \FightTheIce\Exceptions\AssertionError("FightTheIce\Exceptions\AssertionError->Exception");
    }

    public function test_AssertionError_AssertionError()
    {
        $this->expectException(\AssertionError::class);
        throw new \FightTheIce\Exceptions\AssertionError("AssertionError->Exception");
    }

    public function test_AssertionError_Error()
    {
        $this->expectException(\Error::class);
        throw new \FightTheIce\Exceptions\AssertionError("Error->Exception");
    }

    public function test_AssertionError_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\AssertionError("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_AssertionError_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\AssertionError;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_AssertionError_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\AssertionError::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\AssertionError('Custom Message', 1);
    }

    public function test_AssertionError_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\AssertionError;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
