<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\CompileError
    [1] => CompileError
    [2] => Error
    [3] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class CompileErrorTest extends \PHPUnit\Framework\TestCase
{
    public function test_CompileError_FightTheIce_Exceptions_CompileError()
    {
        $this->expectException(\FightTheIce\Exceptions\CompileError::class);
        throw new \FightTheIce\Exceptions\CompileError("FightTheIce\Exceptions\CompileError->Exception");
    }

    public function test_CompileError_CompileError()
    {
        $this->expectException(\CompileError::class);
        throw new \FightTheIce\Exceptions\CompileError("CompileError->Exception");
    }

    public function test_CompileError_Error()
    {
        $this->expectException(\Error::class);
        throw new \FightTheIce\Exceptions\CompileError("Error->Exception");
    }

    public function test_CompileError_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\CompileError("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_CompileError_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\CompileError;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_CompileError_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\CompileError::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\CompileError('Custom Message', 1);
    }

    public function test_CompileError_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\CompileError;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
