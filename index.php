<?php

interface IInputManager {
    public function exists($vars);
    public function contains($vars, $value);
    public function validateByRegex($vars, $regex);
    public function validateFor($vars, $filter);
    public function validateForArray($array);
    public function sanitizeByRegex($vars, $regex);
    public function sanitizeFor($vars, $filter);
    public function sanitizeForArray($array);
}



function createInput() {
    return Validation::set('REQUEST')->validateFor();
    return Validation::set($validate)->validateFor();
}

class Validation {
    public static $types = ['REQUEST', 'GET', 'PUT', 'SERVER', 'POST'];
    
    public static function set($type) {
        try { 
            return self::make($type, $var);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
       
    public static function make($type, $var = "") {
        return $type === 'custom' ? new InputValidation($type) : new CustomValidation($var);
    }
}