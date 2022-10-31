<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Providers\RouteServiceProvider;
use App\UseCases\Admin\User\Register\StoreUseCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('admin.auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(AdminRequest $request, StoreUseCase $useCase): RedirectResponse
    {
        $useCase($request);

        return redirect(RouteServiceProvider::HOME);
    }
}
