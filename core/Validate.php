<?php

namespace Engine\Validate;

use http\Encoding\Stream;

class Validate
{
  protected $minLength = 3;
  protected $upperCase = false;
  protected $lowerCase = false;
  protected $numbers = false;

  public function __construct()
  {
  }

  public function setMinLength(int $minLength)
  {
    $this->minLength = $minLength;
    return $this;
  }

  public function setUpperCase()
  {
    $this->upperCase = true;
    return $this;
  }

  public function setLowerCase()
  {
    $this->lowerCase = true;
    return $this;
  }

  public function setNumbers()
  {
    $this->numbers = true;
    return $this;
  }

  public function password(string $password)
  {
    $errors = [];
    if (strlen($password) < $this->minLength) {
      array_push($errors, "Пароль должен быть больше {$this->minLength}");
    }
    if ($this->upperCase) {
      if (!preg_match('#[A-Z]#', $password)) {
        array_push($errors, "Пароль должен иметь большие латинские буквы");
      }
    }
    if ($this->lowerCase) {
      if (!preg_match('#[a-z]#', $password)) {
        array_push($errors, "Пароль должен иметь мальенькие латинские буквы");
      }
    }
    if ($this->numbers) {
      if (!preg_match('#[0-9]#', $password)) {
        array_push($errors, "Пароль должен содержать цифры");
      }
    }

    return $errors;

  }

}