<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function manageReports()
    {
        return view('admin.reports.view-report');
    }

    public function searchByDateReport(Request $request)
    {
//        return $request->all();
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
//        return $formatDate;
        $orders = Order::where('order_date', $formatDate)->latest()->get();
        return view('admin.reports.view-date-search', compact('orders', 'formatDate'));
    }

    public function searchByMonthReport(Request $request)
    {
        $month = $request->month;
        $year = $request->year_name;
        $orders = Order::where('order_month', $request->month)
            ->where('order_year', $request->year_name)->latest()->get();
        return view('admin.reports.view-month-search', compact('orders', 'month', 'year'));
    }

    public function searchByYearReport(Request $request)
    {
        $year = $request->year;
        $orders = Order::where('order_year', $request->year)->latest()->get();
        return view('admin.reports.view-year-search', compact('orders', 'year'));

    }
}
