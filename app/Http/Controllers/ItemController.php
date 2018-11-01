<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Services\ItemService;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        $items = $this->itemService->getItems();

        return response()->json(compact('items'), empty($items) ? 204 : 200);
    }

    public function store(Request $request)
    {
        $item = $this->itemService->create($request);

        return response()->json(compact('item'), ($item instanceof Item) ? 201 : 409);
    }

    public function update(Request $request, Item $item)
    {
        $item = $this->itemService->update($request, $item);

        return response()->json(compact('item'), ($item instanceof Item) ? 200 : 409);
    }

    public function destroy(Item $item)
    {
        try {
            $item = $this->itemService->destroy($item);

            return response()->json(compact('item'), 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 409);
        }
    }

    public function reorder(Request $request)
    {
        $this->itemService->reOrder($request);

        return response()->json([], 200);
    }
}