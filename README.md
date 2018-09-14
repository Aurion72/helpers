# Helpers

Helpers is a general purpose package with some useful helper functions.

# Usage

`rawSql($builder)` : Return Raw SQL from Query Builder

`boolToString($value, $true_string = null, $false_string = null, $locale = null)` : Transform a value to a string.

`boolToColorizedString($value, $true_string = null, $false_string = null, $locale = null)` : Transform a value to a colorized string

`loadingTimeStart()`: Start counting loading time

`loadingTimeEnd($die = true)` : Save loading time

`formatPrice($price, $currency_sign = ' €')` : Turn a number into a currency formatted string

`formatPercent($percent, $precision = 2, $percent_sign = true)` : Turn a number into a percentage formatted string

`makeFileName(Model $model, string $name_attribute = 'name')` : Make a filename from a Model instance

`displayImage($path, $width = null, $height = null)` : Display and crop public image (using Croppa)

`randomBoolean($chance_of_true = 50)` : Return a boolean with a random factor

`randomPassword($length, $caps = false)` : Generate a random password

`addSign($value, $minus_only = false)`: Add a sign to a number

`getAction($keep_namespace = false)` : Get the current action

`rmdirRecursive($dir)` : Recursively remove directories and files