<?php

namespace App;

use Webmozart\Assert\Assert;

class Email
{
    private string $email;
    private string $password;

    public function __construct()
    {
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function checkIfEmailIsValid(): void
    {
        Assert::email($this->email, "Invalid email address, got %s");
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function send($address, $message, $redirect, $tokens): string
    {
        echo sprintf("email: %s message: %s redirecting %s token %s", $address, $message, $redirect, $tokens["token"]);
        return $redirect;
    }
}
