# Helpers

Helpers is a general purpose package with some useful helper functions.

# Usage

**debug**

`rawSql($builder)` : Return Raw SQL from Query Builder

`loadingTimeStart()`: Start counting loading time

`loadingTimeEnd($die = true)` : Save loading time

**strings**

`boolToString($value, $true_string = null, $false_string = null, $locale = null)` : Transform a value to a string.

`boolToColorizedString($value, $true_string = null, $false_string = null, $locale = null)` : Transform a value to a colorized string (BS4 style)

`formatPrice($price, $currency_sign = ' €')` : Turn a number into a currency formatted string

`formatPercent($percent, $precision = 2, $percent_sign = true)` : Turn a number into a percentage formatted string

`randomPassword($length, $caps = false)` : Generate a random password

**media**

`displayImage($path, $width = null, $height = null)` : Display and crop public image (using Croppa)

`rmdirRecursive($dir)` : Recursively remove directories and files

`stringToHexColor($string)` : Convert a string to a color in hexadecimal format

**numbers**

`randomBoolean($chance_of_true = 50)` : Return a boolean with a random factor

`addSign($value, $minus_only = false)`: Add a sign to a number

