<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\expenses;

class expensesResume extends Controller
{
    public function show()
    {
        return view(
            'expense_controller.expenses',
            [
                'expenses' => expenses::all()
            ]
        );
    }
    public function confirmDelete()
    {
        return view(
            'expense_controller.expenses',
            [
                'expenses' => expenses::all()
            ]
        );
    }
    public function destroy($id)
    {
        $report = expenses::findOrFail($id);
        $report->delete();

        return redirect('expensesResume/show');
    }
    public function editExpense($id)
    {
        return 'yeah';
    }
}
