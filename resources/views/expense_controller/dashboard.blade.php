@extends('layouts.base')

@section('content')
<div class="container_all">

    {{-- Calculate the money --}}
    <script>
      let expensesJS = [];
      let expensesAmountJS = [];
      let expenseNew = '';

      let incomesJS = [];
      let incomesAmountJS = [];
      let incomeNew = '';
      const reducer = (accumulator, currentValue) => accumulator + currentValue;
  </script>

@foreach ($expenseReports as $expense)

<script>
        expensesJS.push('{{$expense->expenseName}}');
        expenseNew = ('{{$expense->expenseAmount}}');
        expensesAmountJS.push(parseInt(expenseNew));
</script>
    
@endforeach

@foreach ($incomeReports as $income)
    <script>
        incomesJS.push('{{$income->incomeName}}');
        incomeNew = ('{{$income->incomeAmount}}');
        incomesAmountJS.push(parseInt(incomeNew));
    </script>
@endforeach

    
    <section class="sectionCard sectionCardsection_money" >

      <div class="amount_money_container">
        <h5>You have:</h5>
      
        <h4>Your money is</h4>
        <h1 class="amount_money">$<span id='balanceTotal' class='numscroller' data-min='1' data-max='' data-delay='5' data-increment='20'></span> </h1>

        {{-- Balance Total --}}
        <script>
          let incomesTotal = incomesAmountJS.reduce(reducer);
          let expensesTotal = expensesAmountJS.reduce(reducer);

          let balanceTotal = incomesTotal - expensesTotal;
          console.log(balanceTotal);
          document.getElementById('balanceTotal').setAttribute("data-max", "balanceTotal");
        </script>

          <div class="btnAction button_add_expense">
            <span id="addAction">+</span>
          </div>
      </div>
    </section>

    <section class=" sectionCardsection_add" id='section_add_reports'>
      <hr>
      <div class="">
        <h3>New expense</h3>
        <form action="/ExpenseReport" class="row form-relative" method="POST">
          @csrf

          <div class="input col-lg-5">
            <label for="expense_amount">Title Expense</label>
            <br>
            <input type="type" name="expense_title" autocomplete="off" maxlength="15" placeholder="Holydas in Camboya" required>
          </div>

          <div class="input col-lg-4">
            <label for="expense_amount">Amount</label>
            <br>
            <input type="type" name="expense_amount" autocomplete="off" placeholder="$" min="0" required>
          </div>
          
          <div class="selectCategoryContainer">
              <h4 class="bolder">Select a Category</h4>
              <div class="SelectACategorie ">
                <div class="category C Food" id="Food">Food</div>
                <div class="category C Tech" id="Tech">Tech</div>
                <div class="category C House" id="House">House</div>
                <div class="category C Treat" id="Treat">Treat</div>
                <div class="category C Work" id="Work">Work</div>
                <div class="category C Education" id="Education">Education</div>
              </div>
          </div>
          
          <div class="input col-lg-3 buttonSelectCategory">
            <div id="selectCategory" onclick="selectCategory()" class="btn-lightgreen">Category<i class="fas fa-caret-down"></i></div>
            <input type="hidden" name="category" id='category'>
          </div>

          <br>
          <div class="col-lg-12">
            <button type="submit" class="btn_deepblue btn_add_expense">Add Expense</button>
          </div>

        </form>
      </div>
    
    </section>

    <section class="sectionCard sectionCardsection_add section_add_incomes" id='section_add_incomes'>
      <div class="container_add_incomes">
        <h3>New income</h3>
        <form action="/incomesReport" class="row" method="POST">
          @csrf

          <div class="input col-lg-6">
            <label for="income_amount">Title income</label>
            <br>
            <input type="type" name="income_title" autocomplete="off" maxlength="15" placeholder="Wage" required>
          </div>

          <div class="input col-lg-6">
            <label for="income_amount">Amount</label>
            <br>
            <input type="type" name="income_amount" autocomplete="off" placeholder="$" min="0" required>
          </div>

          <br>
          <div class="col-lg-12">
            <button type="submit" class="btn_deepblue btn_add_expense">Add income</button>
          </div>

        </form>
      </div>
    
    </section>

    <section class="sectionCard section_money_info">
      <div class="row">

            
        <div class="col-money-info col-lg-6">
          <h3>Your incomes:</h3>
          <ol>
            <table class="table-expenses">
              @foreach ($incomeReports as $incomeReport)
              <tr class="expense">
                <td><li class="incomeName">{{$incomeReport->incomeName}}</li></td>
                <td class="incomeAmount">${{$incomeReport->incomeAmount}}</td>
              </tr> 
              @endforeach
              <tr>
                <td><hr></td>
              </tr>
              <tr class="expense">
                <td class="total">Total:</td>
                <td class="totalAmount">$<span id='incomesBalance'></span></td>
              </tr>
            </table>
          </ol>
          <a href="/incomesReport/show"><button class="btn-lightgreen btn-manage-stocks btnAdStock">Administrar gastos</button></a>
        </div>

        <div class="col-money-info col-lg-6">
          <h3>Your expenses:</h3>
          <ol class="forex">
            <table class="table-expenses">
              @foreach ($expenseReports as $expenseReport)
              <tr class="expenseInfo row">
                <td class="expenseName"><li>{{$expenseReport->expenseName}} </li> </td>
                <td class="expenseAmount">${{$expenseReport->expenseAmount}}</td>
              </tr>
              @endforeach
              <tr>
                <td><hr></td>
              </tr>
              <tr class="expenseInfo expenseTotal">
                <td class="total">Total:</td>
                <td class="totalAmount">$<span id='expensesBalance'></span></td>
              </tr>
            </table>
          </ol>
          <a href="/expensesResume/show"> <button class="btn_deepblue btnAdTable">Expense Report</button></a>
        </div>

        <div class="col-money-info col-lg-3">
            {{--    <h3>Your stocks:</h3>
                <ol class="forex">
                  <table class="expense">
                    @foreach ($stockReports as $stockReport)
                    <tr class="expenseInfo row">
                      <td class="stockName"><li>{{$stockReport->stock}} </li> </td>
                      <td class="stockStatusBad ">${{$stockReport->stockAmount}}</td>
                    </tr>
                    @endforeach
                  </table>
                </ol>
                <a href="/Stocks/show"><button class="btn-lightgreen btn-manage-stocks btnAdStock">Manage stocks</button></a>
           --}}
        </div>
    </div>
    </section>

</div>

  <div class="divFix optionsActions">
    <div class="center">
      <h4>Add...</h4>
    </div>
    <span class="optionAction incomeAction">$ Income</span>
    <hr>
    <span class="optionAction expenseAction">$ Expense</span> <br>
  </div>

  <div class="divFix">
    <button class="btn_deepblue btnFixed btnAction ">+</button>
  </div>

  {{-- Balance incomes/expenses --}}
  <script>
    console.log(balanceTotal);
    document.getElementById('expensesBalance').innerHTML = expensesTotal;
    document.getElementById('incomesBalance').innerHTML = incomesTotal;

  </script>
@endsection