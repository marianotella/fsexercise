<?php
/**
 * Created by PhpStorm.
 * User: mtellaeche
 * Date: 29/10/18
 * Time: 12:21
 */

namespace App\Services;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ItemService
{
    /**
     * @return array
     */
    public function getItems()
    {
        return Item::all();
    }

    public function create(Request $request)
    {
        $attrs = $this->getCreateArray($request);

        return Item::create($attrs);
    }

    /**
     * @param Request $request
     * @param Item $item
     * @return Item
     */
    public function update(Request $request, Item $item)
    {
        $attrs = $this->getUpdateArray($request);
        $oldPicture = $item->picture;

        $updatedItem = $item->update($attrs);

        if ($updatedItem && isset($attrs['picture'])){
            $this->deletePictures($oldPicture);
        }

        return $item;
    }

    /**
     * @param Item $item
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Item $item)
    {
        $id = $item->_id;
        $picture = $item->picture;

        if($item->delete()){
            $this->deletePictures($picture);
            $this->reOrderItems($id, $item->order);
            return $id;
        }

        return false;
    }

    public function reOrder(Request $request)
    {
        $id = $request->get('id');
        $from = (int) $request->get('from') +1;
        $to = (int) $request->get('to') +1;

        $this->reOrderItems($id, $from, $to);
    }

    protected function reOrderItems(string $id, int $from, int $to = null)
    {
        if (is_null($to)){
            $itemsToOrder = Item::where('order', '>', $from)->get();

            $itemsToOrder->map(function($i){
                $i->order--;
                $i->save();
            });
        }else{
            $item = Item::find($id);

            if ($from < $to){
                $itemsToOrder = Item::whereBetween('order', [$from+1, $to])->where('_id', '!=', $id)->get();

                $itemsToOrder->map(function($i){
                    $i->order--;
                    $i->save();
                });
            }else{
                $itemsToOrder = Item::whereBetween('order', [$to, $from-1])->where('_id', '!=', $id)->get();

                $itemsToOrder->map(function($i){
                    $i->order++;
                    $i->save();
                });
            }

            $item->order = $to;
            $item->save();
        }
    }

    protected function getCreateArray(Request $request)
    {
        $rawAttrs = $request->all();

        if (isset($rawAttrs['picture'])){
            $attrs['picture'] = $this->savePicture($rawAttrs['picture']);
        }

        if (isset($rawAttrs['description'])){
            $attrs['description'] = $rawAttrs['description'];
        }

        $attrs['order'] = $this->setOrder();

        return $attrs;
    }

    protected function getUpdateArray(Request $request)
    {
        $rawAttrs = $request->all();

        if (isset($rawAttrs['picture'])){
            $attrs['picture'] = $this->savePicture($rawAttrs['picture']);
        }

        if (isset($rawAttrs['description'])){
            $attrs['description'] = $rawAttrs['description'];
        }

        return $attrs;
    }

    protected function savePicture(UploadedFile $picture)
    {
        $name = sha1(date('YmdHis') . str_random(30));
        $save_name = $name . '.' . $picture->getClientOriginalExtension();

        if($picture->move('pictures', $save_name)){
            return '/pictures/' . $save_name;
        }
    }

    protected function deletePictures(string $picture)
    {
        File::delete(public_path() . $picture);
    }

    protected function setOrder()
    {
        $lastOrder = $this->getLastOrder();

        return $lastOrder+1;
    }

    protected function getLastOrder()
    {
        $lastItem = Item::orderBy('order')->get()->last();

        if($lastItem instanceof Item){
            return $lastItem->order;
        }else{
            return 0;
        }
    }
}