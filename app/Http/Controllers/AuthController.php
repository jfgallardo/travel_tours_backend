<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthForgotPasswordRequest;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthVerifyEmailRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(AuthLoginRequest $request)
    {
        $input = $request->validated();
        $token = $this->authService->login($input['email'], $input['password']);

        return (new UserResource(auth()->user()))->additional($token);
    }

    public function register(AuthRegisterRequest $request)
    {
        $input = $request->validated();
        $user = $this->authService->register(
            $input['typePerson'],
            $input['fullName'],
            $input['cpf'],
            $input['birthday'],
            $input['cep'],
            $input['bairro'],
            $input['address'],
            $input['estado'],
            $input['number'] ?? '',
            $input['ciudade'],
            $input['complemento'] ?? '',
            $input['mainPhone'],
            $input['alternativePhone'] ?? '',
            $input['email'],
            $input['password']
        );

        return UserResource::collection($user);
    }

    public function verifyEmail(AuthVerifyEmailRequest $request)
    {
        $input = $request->validated();

        $user = $this->authService->verifyEmail($input['token']);

        return new UserResource($user);
    }

    public function forgotPassword(AuthForgotPasswordRequest $request)
    {
        $input = $request->validated();
        return $this->authService->forgotPassword($input['email']);
    }
}
