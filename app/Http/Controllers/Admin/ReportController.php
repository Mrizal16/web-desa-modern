<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LetterRequest;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->getReportData($request);

        return view('admin.reports.index', $data);
    }

    public function print(Request $request)
    {
        $data = $this->getReportData($request);

        return view('admin.reports.print', $data);
    }

    private function getReportData(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $letterQuery = LetterRequest::query();
        $complaintQuery = Complaint::query();

        if ($startDate) {
            $letterQuery->whereDate('created_at', '>=', $startDate);
            $complaintQuery->whereDate('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $letterQuery->whereDate('created_at', '<=', $endDate);
            $complaintQuery->whereDate('created_at', '<=', $endDate);
        }

        $stats = [
            'total_letters' => (clone $letterQuery)->count(),

            'completed_letters' => (clone $letterQuery)
                ->where('status', 'SELESAI')
                ->count(),

            'rejected_letters' => (clone $letterQuery)
                ->where('status', 'DITOLAK')
                ->count(),

            'total_complaints' => (clone $complaintQuery)->count(),

            'completed_complaints' => (clone $complaintQuery)
                ->where('status', 'SELESAI')
                ->count(),

            'total_residents' => User::whereHas('resident')->count(),
        ];

        $latestLetters = (clone $letterQuery)
            ->with(['user', 'letterType'])
            ->latest()
            ->get();

        $latestComplaints = (clone $complaintQuery)
            ->with('user')
            ->latest()
            ->get();

        return compact(
            'stats',
            'latestLetters',
            'latestComplaints',
            'startDate',
            'endDate'
        );
    }
}