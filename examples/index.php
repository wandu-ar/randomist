<?php

require '../src/Randomist.php';

use Wandu\Utils\Randomist;

$randomist = new Randomist();

echo "<pre>";

// Example 1: Secure password.

$secure_password =  $randomist
                        ->set_lenght(12)
                        ->include_number(3)
                        ->include_lowercase(3)
                        ->include_uppercase(3)
                        ->include_special(1, 1)
                        ->generate();

echo "1- Secure password: {$secure_password} \n\n";


// Example 2: Multiple simple passwords.
$multiple_passwords =  $randomist
                        ->reset()
                        ->set_lenght(8)
                        ->include_number(4)
                        ->include_lowercase(2)
                        ->include_uppercase(2)
                        ->generate(10);

echo "2- Multiple simple passwords:\n".implode("\n", $multiple_passwords)."\n\n";


// Example 3: Random hash.
$random_hash =  $randomist
                    ->reset()
                    ->set_lenght(50, 80)
                    ->include_number(1)
                    ->include_lowercase(1)
                    ->include_uppercase(1)
                    ->generate();

echo "3- Random hash: {$random_hash}\n\n";                    

// Example 4: Random hash URI safe. (For cookie)
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

// Example 5: Random string for simple captcha.
$captcha = $randomist
                ->reset()
                ->set_lenght(5)
                ->include_number(1)
                ->include_uppercase(1)
                ->generate();

echo "5- Random string for simple captcha: {$captcha}\n\n";

// Example 6: Verification code.
$code = $randomist
            ->reset()
            ->set_lenght(6)
            ->include_number(1)
            ->generate();

echo "6- Verification code: {$code}\n\n";
           
echo "</pre>";

