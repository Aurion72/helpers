<?php namespace Aurion72\Helpers\Tests;

class HelpersStringsTest extends HelpersTest
{
    public function test_boolean_is_correctly_converted_to_string()
    {
        $this->assertEquals(boolToString(true), __('misc.yes'));
        $this->assertEquals(boolToString(true, 'Yes'), 'Yes');
        $this->assertEquals(boolToString(false), __('misc.no'));
        $this->assertEquals(boolToString(false, null, 'No'), 'No');
        $this->assertEquals(boolToString(true, null, null, 'en'), __('misc.yes',[],'en'));
        $this->assertEquals(boolToString(false, null, null, 'en'), __('misc.no',[],'en'));
    }

    public function test_boolean_is_converted_to_colorized_string()
    {
        $this->assertEquals(
          boolToColorizedString(true),
          '<span class="text-success">'.__('misc.yes').'</span>'
        );

        $this->assertEquals(
          boolToColorizedString(false),
          '<span class="text-danger">'.__('misc.no').'</span>'
        );
    }

    public function test_price_is_correctly_formatted()
    {
        $this->assertEquals(formatPrice(130.8994, '$'), '130,90$');
        $this->assertEquals(formatPrice(130.8994), '130,90 €');
        $this->assertEquals(formatPrice(-130.8994), '-130,90 €');
        $this->assertEquals(formatPrice('-130.8994'), '-130,90 €');
        $this->assertEquals(formatPrice('+130.8994'), '130,90 €');
    }

    public function test_percent_is_correctly_formatted()
    {
        $this->assertEquals(formatPercent(130.8994), '130,90 %');
        $this->assertEquals(formatPercent(-130.8994), '-130,90 %');
        $this->assertEquals(formatPercent(-130.8994, 3), '-130,899 %');
        $this->assertEquals(formatPercent(130.8994, 3), '130,899 %');
        $this->assertEquals(formatPercent(130.8994, 2, false), '130,90');
    }

    public function test_random_password_has_desired_length()
    {
        $password = randomPassword(10);
        $this->assertEquals(10,strlen($password));

        $password = randomPassword(100);
        $this->assertEquals(100,strlen($password));

        $password = randomPassword(4);
        $this->assertEquals(4,strlen($password));
    }
}