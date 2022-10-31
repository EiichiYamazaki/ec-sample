<?php

declare(strict_types=1);

namespace App\UseCases\Front\User\Register;

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
        /** @var Authenticatable $admin */
        $admin = $this->adminRepository->create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($admin));

        /** @var Auth $auth */
        $auth = Auth::guard('admins');
        $auth->login($admin);

        return $admin;
    }
}
