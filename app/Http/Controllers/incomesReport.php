<?php

namespace App\Http\Controllers;

use App\Models\ExpenseReports;
use App\Models\expenses;
use App\Models\incomes;
use App\Models\stock;

use Illuminate\Http\Request;

class incomesReport extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $report = new incomes();
        $report->incomeAmount = $request->get('income_amount');
        $report->incomeName = $request->get('income_title');
        $report->save();

        return redirect('ExpenseReport');
    }
    public function show()
    {
        return view('expense_controller.incomes', [
            'incomes' => incomes::all()
        ]);
    }
    public function confirmDelete($id)
    {
        $report = incomes::findOrFail($id);

        return view('expense_controller.confirmDelete', [
            'report' => $report,
            'name' => $report->incomeName,
            'amount' => $report->incomeAmount,
            'controller' => 'incomesReport'
        ]);
    }
    public function destroy($id)
    {
        $report = incomes::findOrFail($id);
        $report->delete();
        return redirect('/incomesReport/show');
    }
}
