<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\RuntimeException
    [1] => RuntimeException
    [2] => Exception
    [3] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class RuntimeExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_RuntimeException_FightTheIce_Exceptions_RuntimeException()
    {
        $this->expectException(\FightTheIce\Exceptions\RuntimeException::class);
        throw new \FightTheIce\Exceptions\RuntimeException("FightTheIce\Exceptions\RuntimeException->Exception");
    }

    public function test_RuntimeException_RuntimeException()
    {
        $this->expectException(\RuntimeException::class);
        throw new \FightTheIce\Exceptions\RuntimeException("RuntimeException->Exception");
    }

    public function test_RuntimeException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\RuntimeException("Exception->Exception");
    }

    public function test_RuntimeException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\RuntimeException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_RuntimeException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\RuntimeException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_RuntimeException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\RuntimeException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\RuntimeException('Custom Message', 1);
    }

    public function test_RuntimeException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\RuntimeException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
