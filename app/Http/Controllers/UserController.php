<?php

namespace App\Http\Controllers;

use App\Models\Property_master;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add_wishlist($id)
    {
        $find_property = Property_master::find($id);
        if ($find_property) {
            $user_id = session()->get('user'); // get user id from the session
            if ($user_id) {
                //  If session has userid then....
                $new_item = new Wishlist();
                $new_item->property_id = $id;
                $new_item->user_id = $user_id;
                $new_item->save();
                return redirect()->route('wishlist');
            }
        }
    }

    public function wishlist()
    {
        $user_id = session()->get('user'); // get user id from the session
        $wishlist = Wishlist::join('property_masters', 'wishlists.property_id', '=', 'property_masters.id')->where('wishlists.user_id', '=', $user_id)->select('property_masters.*')->get();

        $data = compact('wishlist');
        return view('wishlist')->with($data);
    }

    public function remove_wishlist($id)
    {
        $property = Wishlist::find($id);
        if ($property) {
            $property->delete();
            return redirect()->route('wishlist');
        }
    }
}
