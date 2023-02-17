<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\DivisionByZeroError
    [1] => DivisionByZeroError
    [2] => ArithmeticError
    [3] => Error
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class DivisionByZeroErrorTest extends \PHPUnit\Framework\TestCase
{
    public function test_DivisionByZeroError_FightTheIce_Exceptions_DivisionByZeroError()
    {
        $this->expectException(\FightTheIce\Exceptions\DivisionByZeroError::class);
        throw new \FightTheIce\Exceptions\DivisionByZeroError("FightTheIce\Exceptions\DivisionByZeroError->Exception");
    }

    public function test_DivisionByZeroError_DivisionByZeroError()
    {
        $this->expectException(\DivisionByZeroError::class);
        throw new \FightTheIce\Exceptions\DivisionByZeroError("DivisionByZeroError->Exception");
    }

    public function test_DivisionByZeroError_ArithmeticError()
    {
        $this->expectException(\ArithmeticError::class);
        throw new \FightTheIce\Exceptions\DivisionByZeroError("ArithmeticError->Exception");
    }

    public function test_DivisionByZeroError_Error()
    {
        $this->expectException(\Error::class);
        throw new \FightTheIce\Exceptions\DivisionByZeroError("Error->Exception");
    }

    public function test_DivisionByZeroError_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\DivisionByZeroError("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_DivisionByZeroError_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\DivisionByZeroError;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_DivisionByZeroError_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\DivisionByZeroError::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\DivisionByZeroError('Custom Message', 1);
    }

    public function test_DivisionByZeroError_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\DivisionByZeroError;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
