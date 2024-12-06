<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
public function approveAdmin($id)
{
$admin = User::findOrFail($id);

if (!$admin->isVerified) {
return response()->json(['message' => 'Admin must be verified first.'], 400);
}

if ($admin->isApprovedAdmin) {
return response()->json(['message' => 'Admin is already approved.'], 400);
}

$admin->isApprovedAdmin = true;
$admin->save();

return redirect()->route('healthworker')->with('success', 'Admin approved successfully.');
}
}
