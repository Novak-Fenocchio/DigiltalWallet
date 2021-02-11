@extends('layouts.base')
@section('content')

    {{-- Scripts charts --}}
    <script>
        let expensesJS = [];
        let expensesAmountJS = [];
    </script>
    @foreach ($expenses as $expense)
        <script>
            expensesJS.push('{{$expense->expenseName}}');
            expensesAmountJS.push('{{$expense->expenseAmount}}');
        </script>
    @endforeach
    <script src="https://kit.fontawesome.com/bd9aaa656f.js " crossorigin="anonymous "></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src='js/index.js'></script>

    <section class="section-charts">
        <div class="row row-charts">
            <div class="col-stock-info col-chart col-lg-6">
                <ul class="list_stocks">
                    <table class="table-expenses table-stocks">
                        <tr class="trmain">
                            <td>Category:</td>
                            <td>Expense:</td>
                            <td>Amount:</td>
                            <td>Date:</td>
                        </tr>
                        <tr>
                        <td><hr></td>
                        <td><hr></td>
                        <td><hr></td>
                        <td><hr></td>
                        </tr>
                        @foreach ($expenses as $expense)
                        <li><tr>
                            <td><span class="category {{$expense->category}}">{{$expense->category}}</span></td>
                            <td>{{$expense->expenseName}}</td>
                            <td>${{$expense->expenseAmount}}</td>
                            <td>{{$expense->created_at->format('d-m')}}</td>
                            <td><a href="/ExpenseReport/{{$expense->id}}/editExpense" class="edit_expense">Edit</a></td>
                            <td><a href="/ExpenseReport/{{$expense->id}}/confirmDelete" class="delete_expense">delete</a></td>
                        </tr></li>
                        <tr class="whiteRow"></tr>
                        @endforeach
                    </table> <br>
                </ul>
            </div>
    
            <div class="ChartExpense col-lg-5">
                <h3 class="titleChart">Your distribution</h3>
                <canvas id='MyChart'></canvas>
                <canvas id='MyChartCategories'></canvas>
                <canvas id="MyChartBar"></canvas>

                <button class="btn_deepblue btnChangeFormat">Change format</button>

                {{-- Script chart --}}
                <div class="">
                 
                    {{-- Chart --}}
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>    
                    <script>
                        let myChart = document.getElementById('MyChart').getContext('2d');

                        var chart = new Chart(MyChart, {
                                    type: 'pie',
                                    data: {
                                        labels:expensesJS,
                                        datasets: [{
                                            label:'Amount',
                                            data: expensesAmountJS,
                                            backgroundColor: [
                                                '#7a8eff', 
                                                '#e2ff61', 
                                                '#5ffa83', 
                                                '#fa5f5f', 
                                                '#fad85f', 
                                                '#cfff82', 
                                            ],
                                            borderColor: 'black'
                                        }]
                                    },
                                    options: {
                                    legend: {
                                        labels: {
                                            // This more specific font property overrides the global property
                                            fontColor: 'white'
                                                }
                                            }
                                    }
                                });

                    </script>

                     {{-- Chart circle --}}
                    <script>
                            let MyChartBar = document.getElementById('MyChartBar').getContext('2d');
                                            
                            var chartBar = new Chart(MyChartBar, {
                                type: 'bar',
                                data: {
                                    labels:expensesJS,
                                    datasets: [{
                                        label:'Amount',
                                        data: expensesAmountJS,
                                        backgroundColor: [
                                            '#7a8eff', 
                                            '#e2ff61', 
                                            '#5ffa83', 
                                            '#fa5f5f', 
                                            '#fad85f', 
                                            '#cfff82', 
                                        ],
                                        borderColor: 'black'
                                    }]
                                },
                                options: {
                                legend: {
                                    labels: {
                                        // This more specific font property overrides the global property
                                        fontColor: 'white'
                                            }
                                        }
                                }
                            });
                    </script> 

                    {{-- Chart categories --}}
                    <script>
                        let MyChartCategories = document.getElementById('MyChartCategories').getContext('2d');

                        var chart = new Chart(MyChartCategories, {
                                    type: 'pie',
                                    data: {
                                        labels:expensesJS,
                                        datasets: [{
                                            label:'Amount',
                                            data: expensesAmountJS,
                                            backgroundColor: [
                                                '#7a8eff', 
                                                '#e2ff61', 
                                                '#5ffa83', 
                                                '#fa5f5f', 
                                                '#fad85f', 
                                                '#cfff82', 
                                            ],
                                            borderColor: 'black'
                                        }]
                                    },
                                    options: {
                                    legend: {
                                        labels: {
                                            // This more specific font property overrides the global property
                                            fontColor: 'white'
                                                }
                                            }
                                    }
                                });

                    </script>
                </div>
            </div>

        </div>
    </section>
    <section class="section_btn_return">
        <a href="/"><button class="btn_deepblue btnReturn">Dashboard</button></a>
    </section>
    <script>
        let stateFormate = '2';
        $('#MyChart').hide();
        $('#MyChartBar').hide();
       /* Change format chart */
        $('.btnChangeFormat').on('click', function(){
            if(stateFormate%2)
            {
                $('#MyChartBar').hide();
                $('#MyChart').show();
                stateFormate++;
            }
            else
            {
                $('#MyChartBar').show();
                $('#MyChart').hide();
                stateFormate++;
            }
        });
    </script>
    
@endsection