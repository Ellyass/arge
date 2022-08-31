<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        View::share('notifications',$notifications);
        return view('backend.notification.notification');
    }
}
