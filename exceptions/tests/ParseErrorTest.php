<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\ParseError
    [1] => ParseError
    [2] => CompileError
    [3] => Error
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class ParseErrorTest extends \PHPUnit\Framework\TestCase
{
    public function test_ParseError_FightTheIce_Exceptions_ParseError()
    {
        $this->expectException(\FightTheIce\Exceptions\ParseError::class);
        throw new \FightTheIce\Exceptions\ParseError("FightTheIce\Exceptions\ParseError->Exception");
    }

    public function test_ParseError_ParseError()
    {
        $this->expectException(\ParseError::class);
        throw new \FightTheIce\Exceptions\ParseError("ParseError->Exception");
    }

    public function test_ParseError_CompileError()
    {
        $this->expectException(\CompileError::class);
        throw new \FightTheIce\Exceptions\ParseError("CompileError->Exception");
    }

    public function test_ParseError_Error()
    {
        $this->expectException(\Error::class);
        throw new \FightTheIce\Exceptions\ParseError("Error->Exception");
    }

    public function test_ParseError_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\ParseError("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_ParseError_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\ParseError;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_ParseError_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\ParseError::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\ParseError('Custom Message', 1);
    }

    public function test_ParseError_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\ParseError;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
