<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Providers\RouteServiceProvider;
use App\UseCases\Front\User\Register\StoreUseCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('front.auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(UserRequest $request, StoreUseCase $useCase): RedirectResponse
    {
        $useCase($request);

        return redirect(RouteServiceProvider::HOME);
    }
}
