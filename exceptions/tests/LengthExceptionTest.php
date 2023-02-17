<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\LengthException
    [1] => LengthException
    [2] => LogicException
    [3] => Exception
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class LengthExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_LengthException_FightTheIce_Exceptions_LengthException()
    {
        $this->expectException(\FightTheIce\Exceptions\LengthException::class);
        throw new \FightTheIce\Exceptions\LengthException("FightTheIce\Exceptions\LengthException->Exception");
    }

    public function test_LengthException_LengthException()
    {
        $this->expectException(\LengthException::class);
        throw new \FightTheIce\Exceptions\LengthException("LengthException->Exception");
    }

    public function test_LengthException_LogicException()
    {
        $this->expectException(\LogicException::class);
        throw new \FightTheIce\Exceptions\LengthException("LogicException->Exception");
    }

    public function test_LengthException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\LengthException("Exception->Exception");
    }

    public function test_LengthException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\LengthException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_LengthException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\LengthException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_LengthException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\LengthException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\LengthException('Custom Message', 1);
    }

    public function test_LengthException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\LengthException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
