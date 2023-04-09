<?php

namespace App\Services;

use App\Events\ForgotPassword;
use App\Events\UserRegistered;
use App\Exceptions\EmailNotVerifiedException;
use App\Models\User;
use Illuminate\Support\Str;
use App\Exceptions\LoginInvalidException;
use App\Exceptions\ResetPasswordTokenInvalidException;
use App\Exceptions\UserHasBeenTakenException;
use App\Exceptions\VerifyEmailTokenInvalidException;
use App\Models\PasswordReset;

class AuthService
{
    public function login(string $email, string $password)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            throw new LoginInvalidException();
        }

        if (!$user->email_verified_at) {
            throw new EmailNotVerifiedException();
        }

        $login = [
            'email' => $email,
            'password' => $password
        ];

        if (!$token = auth()->attempt($login)) {
            throw new LoginInvalidException();
        }

        return [
            'access_token' => $token,
            'type_token' => 'Bearer'
        ];
    }

    public function register(
        string $type_person,
        string $full_name,
        string $cpf,
        string $birthday,
        string $cep,
        string $bairro,
        string $address,
        string $estado,
        int $number,
        string $ciudade,
        string $complemento,
        string $main_phone,
        string $alternative_phone,
        string $email,
        string $password
    ) {
        $user = User::where('email', $email)->exists();

        if (!empty($user)) {
            throw new UserHasBeenTakenException();
        }

        $userPassword = bcrypt($password ?? Str::random(10));

        $user = User::create([
            'confirmation_token' => Str::random(60),
            'typePerson' => $type_person,
            'fullName' => $full_name,
            'cpf' => $cpf,
            'birthday' => $birthday,
            'cep' => $cep,
            'bairro' => $bairro,
            'address' => $address,
            'estado' => $estado,
            'number' => $number,
            'ciudade' => $ciudade,
            'complemento' => $complemento,
            'mainPhone' => $main_phone,
            'alternativePhone' => $alternative_phone,
            'email' => $email,
            'password' => $userPassword,
        ]);

        event(new UserRegistered($user));
    }

    public function verifyEmail(string $token)
    {
        $user = User::where('confirmation_token', $token)->first();

        if (empty($user)) {
            throw new VerifyEmailTokenInvalidException();
        }

        $user->confirmation_token = null;
        $user->email_verified_at = now();
        $user->save();

        return $user;
    }

    public function forgotPassword(string $email)
    {
        $user = User::where('email', $email)->firstOrFail();
        $token = Str::random(60);

        PasswordReset::create([
            'email' => $user->email,
            'token' => $token
        ]);

        event(new ForgotPassword($user, $token));

    }

    public function resetPassword(string $email, string $password, string $token)
    {
        $passReset = PasswordReset::where('email', $email)->where('token', $token)->first();

        if (empty($passReset)) {
            throw new ResetPasswordTokenInvalidException();
        }

        $user = User::where('email', $email)->firstOrFail();
        $user->password = bcrypt($password);
        $user->save();

        PasswordReset::where('email', $email)->delete();
    }
}
