<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\LetterRequest;
use App\Models\Notification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $letterTotal = LetterRequest::where('user_id', $user->id)->count();

        $letterWaiting = LetterRequest::where('user_id', $user->id)
            ->where('status', 'MENUNGGU VERIFIKASI')
            ->count();

        $letterProcess = LetterRequest::where('user_id', $user->id)
            ->where('status', 'DIPROSES')
            ->count();

        $letterCompleted = LetterRequest::where('user_id', $user->id)
            ->where('status', 'SELESAI')
            ->count();

        $complaintTotal = Complaint::where('user_id', $user->id)->count();

        $unreadNotifications = Notification::where('user_id', $user->id)
            ->where('is_read', false)
            ->count();

        $latestNotifications = Notification::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return response()->json([
            'message' => 'Data dashboard berhasil diambil.',
            'data' => [
                'letters' => [
                    'total' => $letterTotal,
                    'waiting' => $letterWaiting,
                    'process' => $letterProcess,
                    'completed' => $letterCompleted,
                ],
                'complaints' => [
                    'total' => $complaintTotal,
                ],
                'notifications' => [
                    'unread' => $unreadNotifications,
                    'latest' => $latestNotifications,
                ],
            ],
        ]);
    }
}