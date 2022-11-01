<?php

declare(strict_types=1);

namespace App\UseCases\Admin\User\Register;

use App\Repositories\AdminRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreUseCase
{
    public function __construct(
        private readonly AdminRepository $adminRepository,
    ) {
    }

    public function __invoke($request): Authenticatable
    {
        /** @var Authenticatable $user */
        $user = $this->adminRepository->create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        /** @var Auth $auth */
        $auth = Auth::guard('admins');
        $auth->login($user);

        return $user;
    }
}
