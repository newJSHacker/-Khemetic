<?php

namespace App\Http\Controllers;

use App\grn_details;
use App\item_brands;
use App\item_categories;
use App\item_current_inventory;
use App\items;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function create(){
        $inventory=item_current_inventory::all();
        $cat=item_categories::all();
        $brands=item_brands::all();
        return view('current-inventory',compact('inventory','cat','brands'));
    }
    public function search($id,$c){

        $search=item_current_inventory::join('items as i', 'i.item_code', '=', 'item_current_inventories.item_code' )->Where('item_brand', 'like', '%' . $id . '%' )->Where('item_category', 'like', '%' . $c. '%')->get();
        return htmlspecialchars(json_encode($search), ENT_NOQUOTES);

    }
}
