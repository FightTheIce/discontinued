<?php

use FightTheIce\Primitives\String_;
use PHPUnit\Framework\TestCase;

class String_Test extends TestCase
{
    public function test_constructor_no_args()
    {
        $str = new String_();
        $this->assertSame('', $str->__toString());
    }

    public function test_constructor_with_args()
    {
        $str = new String_('hello');
        $this->assertSame('hello', $str->__toString());

        $this->expectException(\TypeError::class);
        $str = new String_(new stdClass());
    }

    public function test_ltrim_with_no_args()
    {
        $value = '     hello world';
        $str1  = new String_($value);
        $str2  = $str1->ltrim();
        $this->assertSame(ltrim($value), $str2->__toString());
        $this->assertInstanceOf(String_::class, $str2);
        $this->assertNotSame($str1, $str2);
    }

    public function test_ltrim_with_character_mask()
    {
        $value = 'zzzHello World';
        $str1  = new String_($value);
        $str2  = $str1->ltrim('z');
        $this->assertSame(ltrim($value, 'z'), $str2->__toString());
        $this->assertInstanceOf(String_::class, $str2);
        $this->assertNotSame($str1, $str2);

        $this->expectException(\TypeError::class);
        $str2 = $str1->ltrim(new stdClass());
    }

    public function test_rtrim_with_no_args()
    {
        $value = 'Hello World     ';
        $str1  = new String_($value);
        $str2  = $str1->rtrim();
        $this->assertSame(rtrim($value), $str2->__toString());
        $this->assertInstanceOf(String_::class, $str2);
        $this->assertNotSame($str1, $str2);
    }

    public function test_rtrim_with_character_mask()
    {
        $value = 'Hello Worldzzzz';
        $str1  = new String_($value);
        $str2  = $str1->rtrim('z');
        $this->assertSame(rtrim($value, 'z'), $str2->__toString());
        $this->assertInstanceOf(String_::class, $str2);
        $this->assertNotSame($str1, $str2);

        $this->expectException(\TypeError::class);
        $str2 = $str1->rtrim(new stdClass());
    }

    public function test_trim_with_no_args()
    {
        $value = '      Hello World    ';
        $str1  = new String_($value);
        $str2  = $str1->trim();
        $this->assertSame(trim($value), $str2->__toString());
        $this->assertInstanceOf(String_::class, $str2);
        $this->assertNotSame($str1, $str2);
    }

    public function test_trim_with_character_mask()
    {
        $value = 'zzzzzzHello Worldzzzzz';
        $str1  = new String_($value);
        $str2  = $str1->trim('z');
        $this->assertSame(trim($value, 'z'), $str2->__toString());
        $this->assertInstanceOf(String_::class, $str2);
        $this->assertNotSame($str1, $str2);

        $this->expectException(\TypeError::class);
        $str2 = $str1->trim(new stdClass());
    }

    public function test_substr_no_args()
    {
        $this->expectException(\ArgumentCountError::class);
        $str1 = new String_('some value');
        $str2 = $str1->substr();
    }

    public function test_substr_with_start_without_length()
    {
        $value = 'hello world';
        $str1  = new String_($value);
        $str2  = $str1->substr(5);
        $this->assertSame(substr($value, 5), $str2->__toString());
        $this->assertInstanceOf(String_::class, $str2);
        $this->assertNotSame($str1, $str2);

        $this->expectException(\TypeError::class);
        $str2 = $str1->substr(new stdClass());
    }

    public function test_substr_with_start_and_length()
    {
        $value = 'hello world';
        $str1  = new String_($value);
        $str2  = $str1->substr(5, 2);
        $this->assertSame(substr($value, 5, 2), $str2->__toString());
        $this->assertInstanceOf(String_::class, $str2);
        $this->assertNotSame($str1, $str2);

        $this->expectException(\TypeError::class);
        $str2 = $str1->substr(1, new stdClass());
    }

    public function test_strtolower()
    {
        $value = 'HELLO WORLD';
        $str1  = new String_($value);
        $str2  = $str1->strtolower();
        $this->assertSame(strtolower($value), $str2->__toString());
        $this->assertInstanceOf(String_::class, $str2);
        $this->assertNotSame($str1, $str2);
    }

    public function test_strtoupper()
    {
        $value = 'hello world';
        $str1  = new String_($value);
        $str2  = $str1->strtoupper();
        $this->assertSame(strtoupper($value), $str2->__toString());
        $this->assertInstanceOf(String_::class, $str2);
        $this->assertNotSame($str1, $str2);
    }

    public function test_isempty()
    {
        $value = '';
        $str1  = new String_($value);
        $this->assertSame(empty($value), $str1->isEmpty());
    }

    public function test__toString()
    {
        $value = 'Hello World';
        $str1  = new String_($value);
        $this->assertSame($value, $str1->__toString());
    }

    public function test_str_split_no_args()
    {
        $value = 'hello world';
        $str1  = new String_($value);
        $this->assertSame(str_split($value), $str1->str_split());
    }

    public function test_str_split_with_split_length()
    {
        $value = 'hello world';
        $str1  = new String_($value);
        $this->assertSame(str_split($value, 2), $str1->str_split(2));

        $this->expectException(\TypeError::class);
        $str2 = $str1->str_split(new stdClass);
    }

    public function test_str_split_with_1_length_empty_array()
    {
        $value = '';
        $str1  = new String_($value);
        $this->assertSame(array(), $str1->str_split());
    }

    public function test_offsetExists_false()
    {
        $str1 = new String_();
        $this->assertFalse($str1->offsetExists(0));
    }

    public function test_offsetExists_true()
    {
        $str1 = new String_('1');
        $this->assertTrue($str1->offsetExists(0));
    }

    public function test_offsetGet_exception()
    {
        $str1 = new String_();

        $this->expectException(\ErrorException::class);
        $str1->offsetGet(0);
    }

    public function test_offsetGet()
    {
        $str1 = new String_('1');
        $this->assertSame('1', $str1->offsetGet(0));
    }

    public function test_offsetSet_zero()
    {
        $str1    = new String_();
        $str1[0] = '1';
        $this->assertSame('1', $str1->__toString());
    }

    public function test_offsetSet_one_with_no_zero()
    {
        $str1 = new String_();
        $this->expectException(\ErrorException::class);
        $str1[1] = 'h';
    }

    public function test_offsetSet_zero_with_stringable()
    {
        $str1 = new String_();
        $var  = new class implements Stringable
        {
            public function __toString()
            {
                return '0';
            }
        };

        $str1[0] = $var;

        $this->assertSame('0', $str1->__toString());
    }

    public function test_offsetSet_zero_with_stdclass()
    {
        $str1 = new String_();
        $this->expectException(\ErrorException::class);
        $str1[0] = new stdClass;
    }

    public function test_offsetSet_zero_with_non_numeric_key()
    {
        $str1 = new String_();
        $this->expectException(\ErrorException::class);
        $str1['moo'] = '';
    }

    public function test_offsetSet_zero_with_float()
    {
        $str1 = new String_();
        $this->expectException(\ErrorException::class);
        $str1[1.5] = '';
    }

    public function test_offsetSet_overwrite_key_zero()
    {
        $str1    = new String_('0');
        $str1[0] = '1';
        $this->assertSame('1', $str1->__toString());
    }

    public function test_offsetSet_one_with_key_zero()
    {
        $str1    = new String_('0');
        $str1[1] = '1';
        $this->assertSame('01', $str1->__toString());
    }

    public function test_offsetSet_key_greater_than_oneplus()
    {
        $str1 = new String_('0');
        $this->expectException(\ErrorException::class);
        $str1[2] = '2';

    }

    public function test_offsetUnset_normal()
    {
        $str1 = new String_('0');
        $str1->offsetUnset(0);
        $this->assertSame('', $str1->__toString());
    }

    public function test_offsetUnset_notrealkey()
    {
        $str1 = new String_();
        $str1->offsetUnset(2);
        $this->assertSame('', $str1->__toString());
    }

    public function test_substr_failure()
    {
        $str1 = new String_();
        $this->expectException(\ErrorException::class);
        $str1->substr(500, 200);
    }
}
