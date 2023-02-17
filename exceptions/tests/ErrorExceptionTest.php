<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\ErrorException
    [1] => ErrorException
    [2] => Exception
    [3] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class ErrorExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_ErrorException_FightTheIce_Exceptions_ErrorException()
    {
        $this->expectException(\FightTheIce\Exceptions\ErrorException::class);
        throw new \FightTheIce\Exceptions\ErrorException("FightTheIce\Exceptions\ErrorException->Exception");
    }

    public function test_ErrorException_ErrorException()
    {
        $this->expectException(\ErrorException::class);
        throw new \FightTheIce\Exceptions\ErrorException("ErrorException->Exception");
    }

    public function test_ErrorException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\ErrorException("Exception->Exception");
    }

    public function test_ErrorException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\ErrorException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_ErrorException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\ErrorException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_ErrorException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\ErrorException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\ErrorException('Custom Message', 1);
    }

    public function test_ErrorException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\ErrorException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
