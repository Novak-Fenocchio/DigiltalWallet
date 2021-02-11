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
            'controllerMine' => 'incomesReport'
        ]);
    }
    public function destroy($id)
    {
        $report = incomes::findOrFail($id);
        $report->delete();
        return redirect('/incomesReport/show');
    }
    public function editIncome($id)
    {
        $report = incomes::findOrFail($id);
        return view('expense_controller.edit', [
            'expense' => $report,
            'name' => $report->incomeName,
            'amount' => $report->incomeAmount,
            'type' => 'Income',
            'controllerMine' => 'incomesReport'
        ]);
    }
    public function update(Request $request, $id)
    {
        $report = incomes::findOrFail($id);
        $report->incomeName = $request->get('title');
        $report->incomeAmount = $request->get('amount');
        $report->save();

        return redirect('incomesReport/show');
    }
}
