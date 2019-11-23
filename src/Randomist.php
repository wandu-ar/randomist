<?php

namespace Wandu\Utils;

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
    protected $lowercases = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    /**
     * Array de caracteres en mayúscula
     *
     * @var array
     */
    protected $uppercases = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    /**
     * Array de caracteres especiales
     *
     * @var array
     */
    protected $special_chars = ['!', '#', '$', '%', '&', '*', '+',',', '-','.', '/', '^', '_', ':',';','=','?', '|', '~'];
    
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
    protected $safe_specials = ['-', '.', '_', '~', '(', ')', '*', '@', ',', ';'];

    /**
     * Determina si se utilizarán caracteres uri safe y facilmente reconocibles
     *
     * @var bool
     */
    protected $safe_characters = FALSE;

    /**
     * Establece la longitud mínima de la cadena final
     *
     * @var int
     */
    protected $str_random_length_min = 0;

    /**
     * Establece la longitud máxima de la cadena final
     *
     * @var int
     */
    protected $str_random_length_max = 0;

    /**
     * Mínima cantidad de caracteres numéricos
     *
     * @var int
     */
    protected $min_numbers = 0;

    /**
     * Máxima cantidad de caracteres numéricos
     *
     * @var int
     */
    protected $max_numbers = 0;
    
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
     * Mínima cantidad de caracteres especiales
     *
     * @var int
     */
    protected $min_specials = 0;

    /**
     * Máxima cantidad de caracteres especiales
     *
     * @var int
     */
    protected $max_specials = 0;

    /**
     * Máxima cantidad de fallas posibles en el test de la cadena random antes de lanzar excepcion.
     * 
     * @var int
     */
    private $max_fails = 1000;

    /**
     * Constructor
     * 
     * Resetea los valores.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Establecer el ancho de la cadena aleatoria
     *
     * @param int $min
     * @param int $max
     * @return Randomist
     */
    public function set_lenght(int $min, int $max = 0)
    {
        $this->str_random_length_min = $min;
        $this->str_random_length_max = ($max === 0) ? $min : $max;
        return $this;
    }
    
    /**
     * Setear el mínimo y máximo de caracteres numéricos que tendrá la cadena final
     *
     * @param int $count_number_min
     * @param int $count_number_max
     * @return Randomist
     */
    public function include_number(int $count_number_min = 1, int $count_number_max = 0)
    {
        $this->min_numbers = $count_number_min; 
        $this->max_numbers = $count_number_max;
        return $this;
    }

    /**
     * Setear el mínimo y máximo de caracteres alfabéticos en minúscula que tendrá la cadena final
     *
     * @param int $count_lowers_min
     * @param int $count_lowers_max
     * @return Randomist
     */
    public function include_lowercase($count_lowers_min = 1, int $count_lowers_max = 0)
    {
        $this->min_lowers = $count_lowers_min;
        $this->max_lowers = $count_lowers_max;
        return $this;
    }

    /**
     * Setear el mínimo y máximo de caracteres alfabéticos en mayuscúla que tendrá la cadena final
     *
     * @param int $count_uppers_min
     * @param int $count_uppers_max
     * @return Randomist
     */
    public function include_uppercase(int $count_uppers_min = 1, int $count_uppers_max = 0)
    {
        $this->min_uppers = $count_uppers_min;
        $this->max_uppers = $count_uppers_max;
        return $this;
    }

    /**
     * Setear el mínimo y máximo de caracteres especiales que tendrá la cadena final
     *
     * @param int $count_special_min
     * @param int $count_special_max
     * @return Randomist
     */
    public function include_special($count_special_min = 1, int $count_special_max = 0)
    {   
        $this->min_specials = $count_special_min;
        $this->max_specials = $count_special_max;
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

    public function reset()
    {
        $this->safe_characters = FALSE;
        $this->str_random_length_min = 0;
        $this->str_random_length_max = 0;
        $this->min_numbers = 0;
        $this->max_numbers = 0;
        $this->min_uppers = 0;
        $this->max_uppers = 0;
        $this->min_lowers = 0;
        $this->max_lowers = 0;
        $this->min_specials = 0;
        $this->max_specials = 0;

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
        $all_characters = [];
        
        if ($this->min_numbers > 0)
        {
            $all_characters = ( ! $this->safe_characters) ? 
                                        array_merge($all_characters, $this->numbers)
                                        : array_merge($all_characters, $this->safe_numbers);
        }

        if ($this->min_lowers > 0)
        {
            $all_characters = ( ! $this->safe_characters) ? 
                                        array_merge($all_characters, $this->lowercases)
                                        : array_merge($all_characters, $this->safe_lowers);
        }

        if ($this->min_uppers > 0)
        {
            $all_characters = ( ! $this->safe_characters) ? 
                                        array_merge($all_characters, $this->uppercases)
                                        : array_merge($all_characters, $this->safe_uppers);
        }

        if ($this->min_specials > 0)
        {
            $all_characters = ( ! $this->safe_characters) ? 
                                        array_merge($all_characters, $this->special_chars)
                                        : array_merge($all_characters, $this->safe_specials);
        }

        // prevent empty random string
        if ( ! count($all_characters))
        {
            throw new Exception("No chars included.");
            return FALSE;
        }

        // count and check min chars
        $min_chars = 0;
        $min_chars = $this->min_numbers + $this->min_lowers + $this->min_uppers + $this->min_specials;

        if ($this->str_random_length_min < $min_chars)
        {
            throw new Exception("Min chars error counter. Change lenght of the random string. Must be greather than min included chars.");
            return FALSE;
        }

        // count and check max chars
        $max_chars = 0;
        $max_chars = ($this->min_numbers > 0 && $this->max_numbers === 0) ? $this->str_random_length_min : $max_chars + $this->max_numbers;
        $max_chars = ($this->min_lowers > 0 && $this->max_lowers === 0) ? $this->str_random_length_min : $max_chars + $this->max_lowers;
        $max_chars = ($this->min_uppers > 0 && $this->max_uppers === 0) ? $this->str_random_length_min : $max_chars + $this->max_uppers;
        $max_chars = ($this->min_specials > 0 && $this->max_specials === 0) ? $this->str_random_length_min : $max_chars + $this->max_specials;

        if (0 < $max_chars && $max_chars < $this->str_random_length_min)
        {
            throw new Exception("Max chars error counter. Test never validate. Change max chars of include chars.");
            return FALSE;
        }
        
        $result = [];
        $fail_counter = 0;

        for ($j = 0; $j < $min ; $j++)
        {
            $flag = FALSE;

            while ( ! $flag)
            {
                $random_str = [];

                $positions = ($this->str_random_length_min < $this->str_random_length_max)
                            ? rand($this->str_random_length_min, $this->str_random_length_max)
                            : $this->str_random_length_min;

                $counter_number_pos = $this->min_numbers;
                while ($counter_number_pos > 0)
                {
                    $next_pos = rand(0, $positions - 1);
                    if ( ! isset($random_str[$next_pos]))
                    {
                        $random_str[$next_pos] = ( ! $this->safe_characters)
                                                    ? $this->numbers[rand(0, count($this->numbers) - 1)]
                                                    : $this->safe_numbers[rand(0, count($this->safe_numbers) - 1)];
                        
                        $counter_number_pos--;
                    }
                }

                $counter_lower_pos = $this->min_lowers;
                while ($counter_lower_pos > 0)
                {
                    $next_pos = rand(0, $positions - 1);
                    if ( ! isset($random_str[$next_pos]))
                    {
                        $random_str[$next_pos] = ( ! $this->safe_characters)
                                                    ? $this->lowercases[rand(0, count($this->lowercases) - 1)]
                                                    : $this->safe_lowers[rand(0, count($this->safe_lowers) - 1)];
                        
                        $counter_lower_pos--;
                    }
                }

                $counter_upper_pos = $this->min_uppers;
                while ($counter_upper_pos > 0)
                {
                    $next_pos = rand(0, $positions - 1);
                    if ( ! isset($random_str[$next_pos]))
                    {
                        $random_str[$next_pos] = ( ! $this->safe_characters)
                                                    ? $this->uppercases[rand(0, count($this->uppercases) - 1)]
                                                    : $this->safe_uppers[rand(0, count($this->safe_uppers) - 1)];
                        
                        $counter_upper_pos--;
                    }
                }

                $counter_special_pos = $this->min_specials;
                while ($counter_special_pos > 0)
                {
                    $next_pos = rand(0, $positions - 1);
                    if ( ! isset($random_str[$next_pos]))
                    {
                        $random_str[$next_pos] = ( ! $this->safe_characters)
                                                    ? $this->special_chars[rand(0, count($this->special_chars) - 1)]
                                                    : $this->safe_specials[rand(0, count($this->safe_specials) - 1)];
                        
                        $counter_special_pos--;
                    }
                }

                for ($next_pos = 0; $next_pos < $positions; $next_pos++)
                {
                    if ( ! isset($random_str[$next_pos]))
                    {
                        $random_str[$next_pos] = $all_characters[rand(0, count($all_characters) - 1)];
                    }
                }

                ksort($random_str);

                $random_str = implode('',$random_str);
                 
                $counter_lower = preg_match_all("/[a-z]/", $random_str);
                $counter_upper = preg_match_all("/[A-Z]/", $random_str);
                $counter_number = preg_match_all("/[\d]/", $random_str);

                $regEx = "/[\\".implode('\\', $this->special_chars)."]/";
                $counter_special = preg_match_all($regEx, $random_str);

                // echo "Testing: {$random_str}\n";

                if (($counter_number >= $this->min_numbers
                        && ($this->max_numbers === 0 
                            || ($this->max_numbers > 0 
                                && $counter_number <= $this->max_numbers)))

                    && ($counter_lower >= $this->min_lowers
                            && ($this->max_lowers === 0 
                                || ($this->max_lowers > 0 
                                    && $counter_lower <= $this->max_lowers)))

                    && ($counter_upper >= $this->min_uppers
                        && ($this->max_uppers === 0 
                            || ($this->max_uppers > 0 
                            && $counter_upper <= $this->max_uppers)))
                    
                    && ($counter_special >= $this->min_specials 
                        && ($this->max_specials === 0  
                            ||($this->max_specials > 0 && $counter_special <= $this->max_specials)))
                    
                )
                {
                    $flag = TRUE;
                    $result[] = $random_str;
                    //echo "Found: {$random_str}\n";
                }
                else
                {
                    // check fail counter
                    $fail_counter++;
                    
                    if ($fail_counter > $this->max_fails)
                    {
                        return FALSE;
                    }
                }

            }
        }

        return ($min === 1) ? $result[0] : $result; 
    } 
}