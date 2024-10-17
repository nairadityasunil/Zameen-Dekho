<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property_master;

class PropertyController extends Controller
{
    public function new_property()
    {
        // Return form for new property
        return view('new_property');
    }

    public function save_new_property(Request $request)
    {


        $new_property = new Property_master(); // Object of model
        // Taking inputs
        $new_property->owner = $request->owner;
        $new_property->owner_contact = $request->owner_contact;
        $new_property->address = $request->address;
        $new_property->image_url = $request->image_url;
        $new_property->description = $request->description;
        $new_property->amount = $request->amount;
        $new_property->action = $request->action;
        $new_property->save(); // Inserting into the database

        return redirect()->route('all_properties');
    }

    // Funtion to fetch details of all properties
    public function all_properties()
    {
        // Fetching data from the database and returning to the view
        return view('property_master')->with(['all_properties' => Property_master::all()]);
    }

    // function to return the update form
    public function update_form($id)
    {
        // Finding details of the particular id and returning it to the view with details
        return view('update_property')->with(['details' => Property_master::find($id)]);
    }

    // Function to save update on proterty details
    public function save_property_update(Request $request, $id)
    {

        $update_property = Property_master::find($id); // finding the property details

        // Performing update on database entry
        $update_property->update([
            'owner' => $request->owner,
            'owner_contact' => $request->owner_contact,
            'address' => $request->address,
            'image_url' => $request->image_url,
            'description' => $request->description,
            'amount' => $request->amount,
            'action' => $request->action
        ]);

        return redirect()->route('all_properties');
    }

    public function delete_property($id)
    {
        $property_details = Property_master::find($id);
        if (!is_null($property_details)) {
            $property_details->delete(); // If entry found in the database then deleting it
        }
        return redirect()->route('all_properties');
    }

    // Search filter by name
    public function search_property(Request $request)
    {
        return view('property_master')->with(['all_properties' => Property_master::where('owner', '=', $request->owner)->get(),"owner" => $request->owner]);
    }
}
