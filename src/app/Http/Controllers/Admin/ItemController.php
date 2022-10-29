<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\UseCases\Item\CreateUseCase;
use App\UseCases\Item\EditUseCase;
use App\UseCases\Item\IndexUseCase;
use App\UseCases\Item\StoreUseCase;
use App\UseCases\Item\UpdateUseCase;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    /**
     * @param IndexUseCase $useCase
     * @return Application|Factory|View
     */
    public function index(IndexUseCase $useCase): View|Factory|Application
    {
        $items = $useCase();
        return view('admin.item.index', compact('items'));
    }

    /**
     * @param CreateUseCase $useCase
     * @return Application|Factory|View
     */
    public function create(CreateUseCase $useCase): View|Factory|Application
    {
        [$categories, $isPublishedList] = $useCase();
        return view('admin.item.create', compact('categories', 'isPublishedList'));
    }

    /**
     * @param ItemRequest $request
     * @param StoreUseCase $useCase
     * @return RedirectResponse
     */
    public function store(ItemRequest $request, StoreUseCase $useCase): RedirectResponse
    {
        $useCase($request);
        return redirect()->route('admin.item.index');
    }

    /**
     * @param $id
     * @param EditUseCase $useCase
     * @return Application|Factory|View
     */
    public function edit($id, EditUseCase $useCase): View|Factory|Application
    {
        [$item, $categoryItems, $categories, $isPublishedList] = $useCase($id);
        return view('admin.item.edit', compact('item', 'categoryItems', 'categories', 'isPublishedList'));
    }

    /**
     * @param $id
     * @param ItemRequest $request
     * @param UpdateUseCase $useCase
     * @return RedirectResponse
     */
    public function update($id, ItemRequest $request, UpdateUseCase $useCase): RedirectResponse
    {
        $useCase($id, $request);
        return redirect()->route('admin.item.index');
    }

}
