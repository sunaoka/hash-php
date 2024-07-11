# Hash::merge() for PHP

Merge one or more associative arrays recursively

This function does not append numeric indexes like [array_merge_recursive()](https://php.net/array-merge-recursive) function.

## For example

### array_merge_recursive()

```php
$result = array_merge_recursive(['key' => 'old value'], ['key' => 'new value']);
print_r($result);
// => Array
// (
//     [key] => Array
//         (
//             [0] => old value
//             [1] => new value
//         )
//
// )
```

### but, Hash::merge()

```php
$result = Hash::merge(['key' => 'old value'], ['key' => 'new value']);
print_r($result);
// => Array
// (
//     [key] => new value
// )
```

## Installation

```bash
composer require sunaoka/hash-php
```

## Usage

```php
use Sunaoka\Hash\Hash;

Hash::merge(['key' => 'old value'], ['key' => 'new value']);

// => Array
// (
//     [key] => new value
// )
```

```php
use Sunaoka\Hash\Hash;

$array1 = ['a' => '1', 'b' => ['c' => '1', 'd' => '1', 'g' => ['h' => '1']]];
$array2 = ['a' => '2', 'b' => ['c' => '2', 'e' => '2', 'g' => ['h' => '2']]];
$array3 = ['a' => '3', 'b' => ['c' => '3', 'f' => '3', 'g' => ['h' => '3']]];

Hash::merge($array1, $array2, $array3);

// => Array
// (
//     [a] => 3
//     [b] => Array
//         (
//             [c] => 3
//             [d] => 1
//             [g] => Array
//                 (
//                     [h] => 3
//                 )
// 
//             [e] => 2
//             [f] => 3
//         )
// 
// )
```
