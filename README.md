# Randomist

Librería en php para generar cadenas de texto aleatorias basadas en un listado de caracteres predefinidos: numéricos, minúsculas, mayúsculas y caracteres alfanuméricos. También hay una opción para utilizar solo caracteres seguros para URI y que son facilmente distinguibles y reconocibles de entre otros caracteres para los usuarios (pensado para los más pequeños y personas con dificultades para la informática en general).

Como resultado de utilizar la librería podés obtener las siguientes cadenas aleatorias.

`
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
`

## Requerimientos

- PHP >= 5.6

## Instalación

```sh
composer require wandu-ar/randomist
```

## Uso

1. Añadir el siguiente código al comienzo de tu script.

```php
use Wandu\Utils\Randomist;
```

## Ejemplos

Para ver ejemplos y casos de uso, visitá el siguiente script [Ejemplos](../examples/index.php)

