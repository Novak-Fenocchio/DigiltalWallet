<?php

namespace App\Http\Controllers;

use App\Models\ExpenseReports;
use App\Models\expenses;
use App\Models\incomes;
use App\Models\stock;

use Illuminate\Http\Request;

class ExpenseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'expense_controller.dashboard',
            [
                'expenseReports' => expenses::all(),
                'incomeReports' => incomes::all(),
                'stockReports' => stock::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new expenses();
        $report->expenseAmount = $request->get('expense_amount');
        $report->expenseName = $request->get('expense_title');
        $report->category = $request->get('category');
        $report->save();

        return redirect('ExpenseReport');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function editExpense($id)
    {
        $report = expenses::findOrFail($id);
        return view('expense_controller.edit', [
            'expense' => $report,
            'name' => $report->expenseName,
            'amount' => $report->expenseAmount,
            'type' => 'Expense',
            'controllerMine' => 'ExpenseReport'
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = expenses::findOrFail($id);
        $report->expenseName = $request->get('title');
        $report->expenseAmount = $request->get('amount');
        $report->save();
        return redirect('expensesResume/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function confirmDelete($id)
    {
        $report = expenses::findOrFail($id);

        return view(
            'expense_controller.confirmDelete',
            [
                'report' => $report,
                'name' => $report->expenseName,
                'amount' => $report->expenseAmount,
                'controllerMine' => 'expensesResume'
            ]
        );
    }
}
