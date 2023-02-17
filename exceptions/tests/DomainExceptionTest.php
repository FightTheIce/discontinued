<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\DomainException
    [1] => DomainException
    [2] => LogicException
    [3] => Exception
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class DomainExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_DomainException_FightTheIce_Exceptions_DomainException()
    {
        $this->expectException(\FightTheIce\Exceptions\DomainException::class);
        throw new \FightTheIce\Exceptions\DomainException("FightTheIce\Exceptions\DomainException->Exception");
    }

    public function test_DomainException_DomainException()
    {
        $this->expectException(\DomainException::class);
        throw new \FightTheIce\Exceptions\DomainException("DomainException->Exception");
    }

    public function test_DomainException_LogicException()
    {
        $this->expectException(\LogicException::class);
        throw new \FightTheIce\Exceptions\DomainException("LogicException->Exception");
    }

    public function test_DomainException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\DomainException("Exception->Exception");
    }

    public function test_DomainException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\DomainException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_DomainException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\DomainException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_DomainException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\DomainException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\DomainException('Custom Message', 1);
    }

    public function test_DomainException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\DomainException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
