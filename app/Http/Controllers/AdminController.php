<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
    public function CustomerIndex()
    {
        $customers=User::where('role','user')->get();
        return view('admin.customer.index',compact('customers'), [
            'title' => 'Customer Index'
        ]);
    }
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function updateToggleStatus(Request $request, $customerId)
    {
        // Retrieve the food item by ID from the database
        $customer = User::findOrFail($customerId);

        // Update the status field with the new value
        $customer->status = $request->state; // 'state' is 1 (checked) or 0 (unchecked)

        // Save the updated food item back to the database
        $customer->save();

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }
}
