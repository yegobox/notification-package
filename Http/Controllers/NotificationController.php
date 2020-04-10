<?php

namespace Yegobox\Notification\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function landing () {
      return view('notification::index');
    }
}
