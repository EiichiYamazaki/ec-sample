<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\StoreRequest;
use App\Http\Requests\Item\UpdateRequest;
use App\UseCases\Item\CreateUseCase;
use App\UseCases\Item\EditUseCase;
use App\UseCases\Item\IndexUseCase;
use App\UseCases\Item\StoreUseCase;
use App\UseCases\Item\UpdateUseCase;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    /**
     * @param IndexUseCase $useCase
     * @return Application|Factory|View
     */
    public function index(IndexUseCase $useCase)
    {
        $items = $useCase();
        return view('admin.item.index', compact('items'));
    }

    /**
     * @param CreateUseCase $useCase
     * @return Application|Factory|View
     */
    public function create(CreateUseCase $useCase)
    {
        [$categories, $isPublishedList] = $useCase();
        return view('admin.item.create', compact('categories', 'isPublishedList'));
    }

    /**
     * @param StoreRequest $request
     * @param StoreUseCase $useCase
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request, StoreUseCase $useCase)
    {
        $useCase($request);
        return redirect()->route('admin.item.index');
    }

    public function edit($id, EditUseCase $useCase)
    {
        [$item, $categoryItems, $categories, $isPublishedList] = $useCase($id);
        return view('admin.item.edit', compact('item', 'categoryItems', 'categories', 'isPublishedList'));
    }

    public function update($id, UpdateRequest $request, UpdateUseCase $useCase)
    {
        $useCase($id, $request);
        return redirect()->route('admin.item.index');
    }

}
