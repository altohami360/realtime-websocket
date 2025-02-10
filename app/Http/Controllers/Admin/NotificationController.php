<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return response()->json([
            'notifications' => auth()->guard('admin')->user()->notifications,
            'notifications_count' => auth()->guard('admin')->user()->notifications->count()
        ]);
    }

    public function destroy(Request $request)
    {
        auth()->guard('admin')->user()->notifications()->delete();

        return redirect()->back();
    }
}
