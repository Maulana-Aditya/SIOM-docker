<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Tampilkan daftar notifikasi (terbaru & sudah dibaca) untuk user.
     */
    public function index(Request $request)
    {
        $notifications = $request->user()
                                 ->notifications()
                                 ->paginate(20);

        return view('notifications.index', compact('notifications'));
    }

    /**
     * Tandai satu notifikasi sudah dibaca.
     */
    public function markAsRead($id, Request $request)
    {
        $notif = $request->user()
                         ->notifications()
                         ->findOrFail($id);

        $notif->markAsRead();

        return back();
    }
}
