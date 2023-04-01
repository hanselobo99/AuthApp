<?php

class Validator
{
    public function __construct()
    {
    }

    public function notNull($key, $value): string|bool
    {
        if (strlen($value) == 0) {
            return "The $key is empty";
        }
        return false;
    }

    public function isEmail($key, $value): string|bool
    {
        if (preg_match_all("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $value)) {
            return false;
        }
        return "Enter a valid $key";
    }

    public function minLength($key, $value, $min): string|bool
    {
        if (strlen($value) < $min) {
            return "$key needs to be greater than $min";
        }
        return false;
    }

    public function compare($key, $value, $key2, $value2): string|bool
    {
        if ($value != $value2) {
            return "$key does not match $key2";
        }
        return false;
    }


    public function maxLength($key, $value, $max): string|bool
    {
        if (strlen($value) > $max) {
            return "$key needs to be lesser than $max";
        }
        return false;
    }
}