<?php
class Password
{
    public $pass_len, $pass_include, $num = "0123456789", $lltr = "abcdefghijklmnopqrstuvwxyz",
        $symbol = "!@#$%^&*()_+=>?~";

    public function __construct($pass_len = 8, $pass_include = ['num', 'llter', 'ulter', 'symbol'])
    {
        $this->pass_len = $pass_len;
        $this->pass_include = $pass_include;
    }
    public function generate()
    {
        $chars = '';
        $result = '';
        if (in_array('num', $this->pass_include)) {
            $chars .= $this->num;
        }
        if (in_array('lltr', $this->pass_include)) {
            $chars .= $this->lltr;
        }
        if (in_array('ultr', $this->pass_include)) {
            $chars .= strtoupper($this->lltr);
        }
        if (in_array('symbol', $this->pass_include)) {
            $chars .= $this->symbol;
        }
        $chars = str_shuffle($chars);
        for ($i = 0; $i < $this->pass_len; $i++) {
            $result .= $chars[rand(0, (strlen($chars) - 1))];
        }
        return $result;
    }
}
class Password_Checker
{
    public $password = '';
    public function __construct($password)
    {
        $this->password = $password;
    }
    public function check()
    {
        $strength = 0;
        if (strlen($this->password) >= 8) {
            $strength += 30;
        } elseif (strlen($this->password) >= 6) {
            $strength += 20;
        }
        if (preg_match("/\d/", $this->password)) {
            $strength += 10;
        }
        if (preg_match("/[A-Z]/", $this->password)) {
            $strength += 20;
        }
        if (preg_match("/[a-z]/", $this->password)) {
            $strength += 20;
        }
        if (preg_match("/[^A-Za-z0-9]/", $this->password)) {
            $strength += 20;
        }
        echo "Password strength : $strength%";
    }
}
