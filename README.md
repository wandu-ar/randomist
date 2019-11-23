# Randomist

PHP library for generate random string based on groups chars.

You can:
1. Combine the rando string with numbers, lowercase and uppercase alpha chars and special chars.
2. Set the minimimus and maximus of every group of chars.
3. Create single or batch strings.
4. Use only URI safe specials chars.
5. Use a safe chars: is an special group of chars that can be easily recognized by childs or persons with poor computer capabilities. Are chars that don't confused with other similars chars depending the used font family. 

Result example:

```
1- Secure password: H*4qjcf4p8HB 

2- Multiple simple passwords:
EP26r49e
y76Tv30B
91s9NBd4
3vKi04Y0
kU270Pk0
l2Om884W
99iD73Ab
2M3d4o1S
4Bx9iI21
97Fx8Ko7

3- Random hash: BKxTocZs9zcCcbitKFS2bCI6mwyBx1bTeMl1VOnBuS95Z03Xc4ZgRmssRqJC6Ittofo

4- Random hash URI safe: 1Fg@4B)*QRt@2e;B;ANArD(8Me@MQ

5- Random string for simple captcha: PG8LK

6- Verification code: 539108
```

## Requerimients

- PHP >= 5.6

## How to install

```sh
composer require wandu-ar/randomist
```

## Usage

1. Add the following code at the beginning of your script.

```php
use Wandu\Utils\Randomist;
```

## Examples

To see examples, visit the following script: [Examples](../master/examples/index.php)

## Roadmap 

For the next version, predefined character groups can be modified because we will add an abstraction layer over them.