@extends('layouts.base')
@section('content')
        {{-- Scripts charts --}}
        <script>
            let incomesJS = [];
            let incomesAmountJS = [];
            let incomeNew = '';
            const reducer = (accumulator, currentValue) => accumulator + currentValue;
        </script>

        @foreach ($incomes as $income)
            <script>
                incomesJS.push('{{$income->incomeName}}');
                incomeNew = ('{{$income->incomeAmount}}');
                incomesAmountJS.push(parseInt(incomeNew));
            </script>
        @endforeach
        
        <script>
            console.log(incomesAmountJS.reduce(reducer));
        </script>

        <script src="https://kit.fontawesome.com/bd9aaa656f.js " crossorigin="anonymous "></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src='js/index.js'></script>
    
        <section class="">
            <div class="row">
                <div class="col-stock-info col-lg-5">
                    <ul class="list_stocks">
                        <table class="table-expenses table-stocks">
                            <tr class="trmain">
                                <td>Income:</td>
                                <td>Amount:</td>
                            </tr>
                            <tr>
                            <td><hr></td>
                            <td><hr></td>
                            <td><hr></td>
                            <td><hr></td>
                            </tr>
                            @foreach ($incomes as $income)
                            <li><tr>
                                <td>{{$income->incomeName}}</td>
                                <td>${{$income->incomeAmount}}</td>
                                <td><a href="" class="delete_expense">Edit</a></td>
                                <td><a href="/incomesReport/{{$income->id}}/confirmDelete">delete</a></td>
                            </tr></li>
                            @endforeach
                        </table> <br>
                    </ul>
                </div>
        
                <div class="ChartExpense col-lg-6">
                   
                    <h3 class="titleChart">Your distribution</h3>
                    <canvas id='MyChart'></canvas>
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
                                                labels:incomesJS,
                                                datasets: [{
                                                    label:'Amount',
                                                    data: incomesAmountJS,
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
                                            labels:incomesJS,
                                            datasets: [{
                                                label:'Amount',
                                                data: incomesAmountJS,
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