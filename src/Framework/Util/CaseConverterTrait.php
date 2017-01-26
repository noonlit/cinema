<?php

namespace Framework\Util;

trait CaseConverterTrait
{

    /**
     * Converts a snake_case string to its camelCase equivalent.
     *
     * @param string $string
     *
     * @return string
     */
    public function snakeToCamelCase($string)
    {
        $pieces = preg_split('/([_])/', $string);
        $word = '';

        if (count($pieces) > 1) {
            foreach ($pieces as $key => $piece) {
                if ($key == 0) {
                    $word .= $piece;
                } else {
                    $word .= ucfirst($piece);
                }
            }
        } else {
            $word = reset($pieces);
        }

        return $word;
    }

    /**
     * Converts a snake_case string to its StudlyCaps equivalent.
     *
     * @param string $string
     *
     * @return string
     */
    public function snakeToStudlyCaps($string)
    {
        $pieces = preg_split('/([_])/', $string);
        $word = '';

        if (count($pieces) > 1) {
            foreach ($pieces as $piece) {
                $word .= ucfirst($piece);
            }
        } else {
            $word = ucfirst(reset($pieces));
        }

        return $word;
    }

    /**
     * Converts a camelCase string to its snake_case equivalent.
     *
     * @param string $string
     *
     * @return string
     */
    public function camelToSnakeCase($string)
    {
        $pieces = preg_split('/(?=[A-Z])/', $string);
        $word = '';

        if (count($pieces) > 1) {
            foreach ($pieces as $key => $piece) {
                if ($key == 0) {
                    $word .= $piece;
                } else {
                    $word .= '_'.strtolower($piece);
                }
            }
        } else {
            $word = reset($pieces);
        }

        return $word;
    }

}
