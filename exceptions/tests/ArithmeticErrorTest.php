<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\ArithmeticError
    [1] => ArithmeticError
    [2] => Error
    [3] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class ArithmeticErrorTest extends \PHPUnit\Framework\TestCase
{
    public function test_ArithmeticError_FightTheIce_Exceptions_ArithmeticError()
    {
        $this->expectException(\FightTheIce\Exceptions\ArithmeticError::class);
        throw new \FightTheIce\Exceptions\ArithmeticError("FightTheIce\Exceptions\ArithmeticError->Exception");
    }

    public function test_ArithmeticError_ArithmeticError()
    {
        $this->expectException(\ArithmeticError::class);
        throw new \FightTheIce\Exceptions\ArithmeticError("ArithmeticError->Exception");
    }

    public function test_ArithmeticError_Error()
    {
        $this->expectException(\Error::class);
        throw new \FightTheIce\Exceptions\ArithmeticError("Error->Exception");
    }

    public function test_ArithmeticError_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\ArithmeticError("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_ArithmeticError_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\ArithmeticError;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_ArithmeticError_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\ArithmeticError::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\ArithmeticError('Custom Message', 1);
    }

    public function test_ArithmeticError_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\ArithmeticError;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
