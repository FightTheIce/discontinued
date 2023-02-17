<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\Exception
    [1] => Exception
    [2] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class ExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_Exception_FightTheIce_Exceptions_Exception()
    {
        $this->expectException(\FightTheIce\Exceptions\Exception::class);
        throw new \FightTheIce\Exceptions\Exception("FightTheIce\Exceptions\Exception->Exception");
    }

    public function test_Exception_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\Exception("Exception->Exception");
    }

    public function test_Exception_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\Exception("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_Exception_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\Exception;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_Exception_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\Exception::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\Exception('Custom Message', 1);
    }

    public function test_Exception_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\Exception;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
