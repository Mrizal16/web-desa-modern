<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('warga.notifications.index', compact('notifications'));
    }

    public function read(Notification $notification)
    {
        if ($notification->user_id !== auth()->id()) {
            abort(403);
        }

        $notification->update([
            'is_read' => true,
        ]);

        if ($notification->link) {
            return redirect($notification->link);
        }

        return redirect()->route('warga.notifications.index');
    }

    public function readAll()
    {
        Notification::where('user_id', auth()->id())
            ->where('is_read', false)
            ->update([
                'is_read' => true,
            ]);

        return redirect()
            ->route('warga.notifications.index')
            ->with('success', 'Semua notifikasi sudah dibaca.');
    }
}