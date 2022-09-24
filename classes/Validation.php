<?php

class Validation
{
    private $passed = false,
        $errors = array();

    public function check($items = array())
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                switch ($rule) {
                    case 'required':
                        if (trim(Input::get($item)) == false && $rule_value == true) {
                            $this->addErrors("$item tidak boleh kosong");
                        }
                        break;
                    default:
                        break;
                }
            }
        }

        if (empty($this->errors)) {
            $this->passed = true;
        }

        return $this;
    }

    private function addErrors($error)
    {
        $this->errors[] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getPassed()
    {
        return $this->passed;
    }
}
