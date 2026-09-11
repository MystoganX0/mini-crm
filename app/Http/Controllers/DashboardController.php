<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $totalCompanies = Company::count();
        $totalEmployees = Employee::count();
        $avgEmployees = $totalCompanies > 0 ? round($totalEmployees / $totalCompanies, 1) : 0;

        $recentCompanies = Company::withCount('employees')
            ->latest()
            ->take(5)
            ->get();

        $topCompanies = Company::withCount('employees')
            ->orderByDesc('employees_count')
            ->take(5)
            ->get();

        $recentEmployees = Employee::with('company')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalCompanies',
            'totalEmployees',
            'avgEmployees',
            'recentCompanies',
            'topCompanies',
            'recentEmployees'
        ));
    }
}
