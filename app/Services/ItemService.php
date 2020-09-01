<?php 

namespace App\Services;

use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ItemService
{

	protected $item;

	/**
     * @param  Item  $item
     */
	public function __construct(Item $item)
    {
        $this->item = $item;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection
     */
	public function all()
	{
		$items = Item::orderBy('created_at', 'desc')->get();
		
		return $items;
	}
	
	/**
     * @param  array  $data
	 * @return Item
     */
	public function create($data)
	{
		$item = Item::create($data);
		
		return $item;
	}

	/**
     * @param  int  $id
	 * @return Item
     */
	public function show($id)
	{
		$item = Item::find($id)->load('histories');
		
		return $item;
	}

	/**
	 * @param  int  $id
     * @param  array  $data
	 * @param  int  $quantity
	 * @return Item
     */
	public function update($id, $data, $quantity = null)
	{
		$item = Item::find($id);

		$item->update($data);

		if (isset($quantity)) {
			if (request()->user()->hasRole(User::ROLE_DISTRIBUTOR)) {
				$item->reduceStocks($quantity);
			}
	
			if (request()->user()->hasRole(User::ROLE_SUPPLIER)) {
				$item->addStocks($quantity);
			}
		}
		
		return $item;
	}

	/**
     * @param  mix  $id
	 * @return void
     */
	public function delete($id)
	{
		$item = Item::find($id);

		$item->delete();
	}
}