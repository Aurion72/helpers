<?php namespace Aurion72\Helpers\Tests;

class HelpersNumbersTest extends HelpersTest
{
    public function test_random_boolean_have_correct_ods()
    {
        $return = false;
        for ($i = 0; $i < 10000; $i++) {
            if ($return = randomBoolean(0)) break;
        }
        $this->assertEquals($return, false, 'randomBoolean(0) should always, in any case, returns false');

        $data = [];
        for ($i = 0; $i < 1000000; $i++) {
            $data[] = randomBoolean(50);
        }
        $results = round((array_sum($data) / count($data)) * 100);

        $this->assertEquals(50, $results, 'randomBoolean(50) shoudl always returns an average of 50 % true for 1000000 iterations');

        $return = true;
        for ($i = 0; $i < 10000; $i++) {
            if ($return = randomBoolean(100)) break;
        }
        $this->assertEquals($return, true, 'randomBoolean(100) should always, in any case, returns true');
    }

    public function test_signs_are_correctly_added()
    {
        $this->assertEquals(addSign(130), '+ 130');
        $this->assertEquals(addSign(130.8), '+ 130.8');
        $this->assertEquals(addSign('130'), '+ 130');
        $this->assertEquals(addSign('+ 130'), '+ 130');
        $this->assertEquals(addSign('  + 130   '), '+ 130');
        $this->assertEquals(addSign(-130), '- 130');
        $this->assertEquals(addSign('-130'), '- 130');
        $this->assertEquals(addSign('- 130'), '- 130');
        $this->assertEquals(addSign(130,true), '130');
        $this->assertEquals(addSign(130.8,true), '130.8');
        $this->assertEquals(addSign('130',true), '130');
        $this->assertEquals(addSign('+ 130',true), '130');
        $this->assertEquals(addSign('  + 130   ',true), '130');
    }
}