<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\FileSystem\FileNotFoundException
    [1] => FightTheIce\Exceptions\ErrorException
    [2] => ErrorException
    [3] => Exception
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class FileNotFoundExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_FileNotFoundException_FightTheIce_Exceptions_FileSystem_FileNotFoundException()
    {
        $this->expectException(\FightTheIce\Exceptions\FileSystem\FileNotFoundException::class);
        throw new \FightTheIce\Exceptions\FileSystem\FileNotFoundException("FightTheIce\Exceptions\FileSystem\FileNotFoundException->Exception");
    }

    public function test_FileNotFoundException_FightTheIce_Exceptions_ErrorException()
    {
        $this->expectException(\FightTheIce\Exceptions\ErrorException::class);
        throw new \FightTheIce\Exceptions\FileSystem\FileNotFoundException("FightTheIce\Exceptions\ErrorException->Exception");
    }

    public function test_FileNotFoundException_ErrorException()
    {
        $this->expectException(\ErrorException::class);
        throw new \FightTheIce\Exceptions\FileSystem\FileNotFoundException("ErrorException->Exception");
    }

    public function test_FileNotFoundException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\FileSystem\FileNotFoundException("Exception->Exception");
    }

    public function test_FileNotFoundException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\FileSystem\FileNotFoundException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_FileNotFoundException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\FileSystem\FileNotFoundException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_FileNotFoundException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\FileSystem\FileNotFoundException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\FileSystem\FileNotFoundException('Custom Message', 1);
    }

    public function test_FileNotFoundException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\FileSystem\FileNotFoundException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
