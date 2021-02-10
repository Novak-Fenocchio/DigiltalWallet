
let stateContainerAction = '2';
let stateAddIncome = '2';
let stateAddExpense = '2';

$('#section_add_reports').hide();
$('#section_add_incomes').hide();
$('.optionsActions').hide();
$('.selectAction').hide();

/* Control section add expense */
$('.btnAction').on('click', function(){
    if(stateContainerAction%2)
    {
        $('.optionsActions').hide();
        stateContainerAction++;
    }
    else
    {
        $('.optionsActions').show();
        stateContainerAction++;
    }
});

/* Control section add income */
$('.incomeAction').on('click', function(){
    if(stateAddIncome%2)
    {
        $('#section_add_incomes').hide();
        stateAddIncome++;
    }
    else
    {
        $('#section_add_incomes').show();
        stateAddIncome++;
    }
});

/* Control section add report */
$('.expenseAction').on('click', function(){
    if(stateAddExpense%2)
    {
        $('#section_add_reports').hide();
        stateAddExpense++;
    }
    else
    {
        $('#section_add_reports').show();
        stateAddExpense++;
    }
});

