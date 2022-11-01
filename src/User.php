<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public Email $email;
    private UserDTO $userDetails;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->userDetails = new UserDTO();
        $this->email = new Email();
    }

    public function login(): bool
    {
        $user = $this
            ->where('email', $this->email->getEmail())
            ->get()
            ->first();

        return password_verify($this->email->getPassword(), $user->password);
    }

    public function register()
    {
        $this->email->checkIfEmailIsValid();
        self::create([
            'email' => $this->email->getEmail(),
            'password' => password_hash($this->email->getPassword(), PASSWORD_DEFAULT),
        ]);
    }

    public function restorePassword($email)
    {
        $this->email->checkIfEmailIsValid();
        $token = $this->createPasswordToken($this->email->getEmail());
        self::update([
            'reset_token' => $token,
        ]);

        $this->email->send(
            $email,
            'Password restore',
            'views/auth/restorePassword',
            ['token' => $token]
        );
    }

    public function getAddressString(): string
    {
        $address  = [
            $this->userDetails->getCity(),
            $this->userDetails->getStreet(),
            $this->userDetails->getHouse(),
            $this->userDetails->getApartment(),
        ];

        return implode(" ", $address);
    }

    public function getFullName(): string
    {
        return $this->userDetails->getSecondName() . ' ' . $this->userDetails->getFirstName();
    }


    private function createPasswordToken($email): string
    {
        return md5($email);
    }
}
