<?php

namespace Wandu\Randomist;

/**
 * Generador de cadenas random.
 * 
 * Permite generar cadenas de caracteres aleatorios de longitud fija o variable.
 * Útil para generar claves, hashes o keys.
 * 
 * @version 1.0.0
 * @author Yoel Samurio <yoel@wandu.com.ar>
 * @author Alejandro D. Guevara <alejandro@wandu.com.ar>
 * @package Randomist
 * 
 */
class Randomist
{
    /**
     * Array de caracteres numéricos
     * 
     * @var array
     */
    protected $numbers = ['0','1','2','3','4','5','6','7','8','9'];
    
    /**
     * Array de caracteres en minúscula
     * 
     * @var array
     */
    protected $lowercase = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    /**
     * Array de caracteres especiales
     *
     * @var array
     */
    protected $special_chars = ['!', '#', '$', '%', '&', '*', '+',',', '-','.', '/', '^', '_', ':',';','=','?', '|', '~'];

    /**
     * Array de caracteres en mayúscula
     *
     * @var array
     */
    protected $uppercase = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    
    /**
     * Array de caracteres numéricos reconocibles facilmente y uri safe
     *
     * @var array
     */
    protected $safe_numbers = ['1', '2', '3', '4', '7', '8', '9'];

    /**
     * Array de caracteres en minúscula reconocibles facilmente y uri safe
     *
     * @var array
     */
    protected $safe_lowers = ['a', 'b', 'd', 'e', 'f', 'g', 'h', 'm', 'n', 'q', 'r', 't', 'y'];

    /**
     * Array de caracteres en mayúsculas reconocibles facilmente y uri safe
     *
     * @var array
     */
    protected $safe_uppers = ['A', 'B', 'D', 'E', 'F', 'G', 'H', 'L', 'M', 'N', 'Q', 'R', 'T', 'Y'];


    /**
     * Array de caracteres especiales reconocibles facilmente y uri safe
     *
     * @var array
     */
    protected $safe_special = ['-', '.', '_', '~', '(', ')', '*', '@', ',', ';'];

    /**
     * Determina si se utilizarán caracteres uri safe y facilmente reconocibles
     *
     * @var bool
     */
    protected $safe_characters = FALSE;

    /**
     * Contendrá los caracteres que finalmente tendrá la cadena final
     *
     * @var array
     */
    protected $all_characters = [];

    /**
     * Establece la longitud de la cadena final
     *
     * @var int
     */
    protected $str_random_length = 10;

    /**
     * Mínima cantidad de caracteres numéricos
     *
     * @var int
     */
    protected $min_number = 0;

    /**
     * Máxima cantidad de caracteres numéricos
     *
     * @var int
     */
    protected $max_number = 0;
    
    /**
     * Mínima cantidad de caracteres alfabéticos en mayúscula
     *
     * @var int
     */
    protected $min_uppers = 0;
    
    /**
     * Máxima cantidad de caracteres alfabéticos en mayúscula
     *
     * @var int
     */
    protected $max_uppers = 0;

    /**
     * Mínima cantidad de caracteres alfabéticos en minúsucula
     *
     * @var int
     */
    protected $min_lowers = 0;

    /**
     * Máxima cantidad de caracteres alfabéticos en minúsucula
     *
     * @var int
     */
    protected $max_lowers = 0;

    /**
     * Mínima cantidad de caracteres especiales
     *
     * @var int
     */
    protected $min_special = 0;

    /**
     * Máxima cantidad de caracteres especiales
     *
     * @var int
     */
    protected $max_special = 0;

    /**
     * Establecer el ancho de la cadena aleatoria
     *
     * @param int $min
     * @param int $max
     * @return Randomist
     */
    public function set_lenght(int $min, int $max = 0)
    {
        $this->str_random_length = ($max === 0) ? $min : rand($min,$max);
        return $this;
    }
    
    /**
     * Setear el mínimo y máximo de caracteres numéricos que tendrá la cadena final
     *
     * @param int $cant_number_min
     * @param int $cant_number_max
     * @return Randomist
     */
    public function include_number(int $cant_number_min = 1, int $cant_number_max = 0)
    {
        $this->min_number = $cant_number_min; 
        $this->max_number = $cant_number_max;
        return $this;
    }

    /**
     * Setear el mínimo y máximo de caracteres alfabéticos en mayuscúla que tendrá la cadena final
     *
     * @param int $cant_uppers_min
     * @param int $cant_uppers_max
     * @return Randomist
     */
    public function include_uppercase(int $cant_uppers_min = 1, int $cant_uppers_max = 0)
    {
        $this->min_uppers = $cant_uppers_min;
        $this->max_uppers = $cant_uppers_max;
        return $this;
    }

    /**
     * Setear el mínimo y máximo de caracteres alfabéticos en minúscula que tendrá la cadena final
     *
     * @param int $cant_lowers_min
     * @param int $cant_lowers_max
     * @return Randomist
     */
    public function include_lowercase($cant_lowers_min = 1, int $cant_lowers_max = 0)
    {
        $this->min_lowers = $cant_lowers_min;
        $this->max_lowers = $cant_lowers_max;
        return $this;
    }

    /**
     * Setear el mínimo y máximo de caracteres especiales que tendrá la cadena final
     *
     * @param int $cant_special_min
     * @param int $cant_special_max
     * @return Randomist
     */
    public function include_special($cant_special_min = 1, int $cant_special_max = 0)
    {   
        $this->min_special = $cant_special_min;
        $this->max_special = $cant_special_max;
        return $this;
    }
    
    /**
     * Setea el uso de caracteres URI SAFE y facilmente reconocibles
     *
     * @return Randomist
     */
    public function only_safe()
    {
        $this->safe_characters = TRUE;
        return $this;
    }

    /**
     * Genera la cadena final según la configuración del objeto 
     *
     * @param int $min
     * @return string|array Cadena(s) aleatorias
     */
    public function generate(int $min = 1)
    { 
        if ($this->min_lowers > 0)
        {
            $this->all_characters = ($this->safe_characters) ? 
                                        array_merge($this->all_characters, $this->safe_lowers)
                                        : array_merge($this->all_characters, $this->lowercase);
        }

        if ($this->min_number > 0)
        {
            $this->all_characters = ($this->safe_characters) ? 
                                        array_merge($this->all_characters, $this->safe_numbers)
                                        : array_merge($this->all_characters, $this->numbers);
        }

        if ($this->min_special > 0)
        {
            $this->all_characters = ($this->safe_characters) ? 
                                        array_merge($this->all_characters, $this->safe_special)
                                        : array_merge($this->all_characters, $this->special_chars);
        }

        if ($this->min_uppers > 0)
        {
            $this->all_characters = ($this->safe_characters) ? 
                                        array_merge($this->all_characters, $this->safe_uppers)
                                        : array_merge($this->all_characters, $this->uppercase);
        }    
        
        $result = [];

        for($j = 0; $j < $min ; $j++)
        {
            $flag = FALSE;

            while ( ! $flag)
            {
                $random_str = '';

                for ($i = 0; $i < $this->str_random_length; $i++)
                {
                    $chars = rand(0, count($this->all_characters)-1);
                    $random_str .= $this->all_characters[$chars];

                }
                 
                $counter_lower = preg_match_all("/[a-z]/", $random_str);
                $counter_upper = preg_match_all("/[A-Z]/", $random_str);
                $counter_number = preg_match_all("/[\d]/", $random_str);

                $regEx = "/[\\".implode('\\', $this->special_chars)."]/";
                $counter_special = preg_match_all($regEx, $random_str);

                if (($counter_lower >= $this->min_lowers
                        && ($this->max_lowers === 0 
                            || ($this->max_lowers > 0 
                                && $counter_lower <= $this->max_lowers)))

                    && ($counter_upper >= $this->min_uppers
                        && ($this->max_uppers ===0 
                            || ($this->max_uppers >0 
                            && $counter_upper <= $this->max_uppers)))

                    && ($counter_number >=$this->min_number 
                        && ($this->max_number ===0 
                            || ($this->max_number >0 
                                && $counter_number <= $this->max_number)))

                    && ($counter_special >= $this->min_special 
                        && ($this->max_special === 0  
                            ||($this->max_special > 0 && $counter_special <= $this->max_special)))
                )
                {
                    $flag = TRUE;
                    $result[] = $random_str;
                }
            }
        }

        return ($min === 1) ? $result[0] : $result; 
    } 
}