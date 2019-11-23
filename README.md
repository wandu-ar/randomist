# Randomist

PHP library for generate random string based on groups chars.

You can:
1. Combine the rando string with numbers, lowercase and uppercase alpha chars and special chars.
2. Set the minimimus and maximus of every group of chars.
3. Create single or batch strings.
4. Use only URI safe specials chars.
5. Use a safe chars: is an special group of chars that can be easily recognized by childs or persons with poor computer capabilities. Are chars that don't confused with other similars chars depending the used font family.
6. Create a random lenght for random strings.

For example:
```
H*4qjcf4p8HB 
EP26r49e
BKxTocZs9zcCcbitKFS2bCI6mwyBx1bTeMl1VOnBuS95Z03Xc4ZgRmssRqJC6Ittofo
1Fg@4B)*QRt@2e;B;ANArD(8Me@MQ
PG8LK
539108
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

$randomist = new Randomist();

```

2. Set preferences:

- Example 1: Secure password.
```php
$secure_password =  $randomist
                        ->set_lenght(12)
                        ->include_number(3)
                        ->include_lowercase(3)
                        ->include_uppercase(3)
                        ->include_special(1, 1)
                        ->generate();

echo "1- Secure password: {$secure_password} \n\n";
```
Show: `1- Secure password: H*4qjcf4p8HB`

- Example 2: Multiple simple passwords.
```php
$multiple_passwords =  $randomist
                        ->reset()
                        ->set_lenght(8)
                        ->include_number(4)
                        ->include_lowercase(2)
                        ->include_uppercase(2)
                        ->generate(10);

echo "2- Multiple simple passwords:\n".implode("\n", $multiple_passwords)."\n\n";
```
Show: 
```
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
```

- Example 3: Random string as hash, for a key.
```php
$random_hash =  $randomist
                    ->reset()
                    ->set_lenght(50, 80)
                    ->include_number(1)
                    ->include_lowercase(1)
                    ->include_uppercase(1)
                    ->generate();

echo "3- Random hash: {$random_hash}\n\n";  
```
Show: `3- Random hash: BKxTocZs9zcCcbitKFS2bCI6mwyBx1bTeMl1VOnBuS95Z03Xc4ZgRmssRqJC6Ittofo`

- Example 4: Random hash URI safe.
```php
$random_hash_uri_safe =  $randomist
                            ->reset()
                            ->set_lenght(30, 40)
                            ->only_safe()
                            ->include_number(1)
                            ->include_lowercase(1)
                            ->include_uppercase(1)
                            ->include_special(1)
                            ->generate();

echo "4- Random hash URI safe: {$random_hash_uri_safe}\n\n";
```
Show: `4- Random hash URI safe: .*~1;Fg@4B)*QRt@2e;B;ANArD(8Me@MQ`

- Example 5: Random string for simple captcha.
```php
$captcha = $randomist
                ->reset()
                ->set_lenght(5)
                ->include_number(1)
                ->include_uppercase(1)
                ->generate();

echo "5- Random string for simple captcha: {$captcha}\n\n";
```
Show: `5- Random string for simple captcha: PG8LK`

- Example 6: Verification code.
```php
$code = $randomist
            ->reset()
            ->set_lenght(6)
            ->include_number(1)
            ->generate();

echo "6- Verification code: {$code}\n\n";
```
Show: `6- Verification code: 539108`            

## More examples

To see examples, visit the following script: [Examples](../master/examples/index.php)

## Roadmap 

For the next version, predefined character groups can be modified because we will add an abstraction layer over them.