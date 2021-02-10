    
@extends('layouts.base')

@section('content')
<div class="container_all">

    <section>
     
        {{-- Array stocks --}}
        <script>
            let stocksJS = [];
            let stocksAmountJS = [];
        </script>
        @foreach ($stocks as $stock)
            <script>
            stocksJS.push('{{$stock->stock}} ');
            stocksAmountJS.push('{{$stock->stockAmount}}');
            </script>
        @endforeach
        <script src="https://kit.fontawesome.com/bd9aaa656f.js " crossorigin="anonymous "></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src='js/index.js'></script>

        <h3>Your stocks:</h3>
        <div class="row">

        <div class="col-stock-info col-lg-5">
            <ul class="list_stocks">
                <table class="table-expenses table-stocks">
                    <tr class="trmain">
                        <td>Stock:</td>
                        <td>Amount:</td>
                    </tr>
                    <tr>
                       <td><hr></td>
                       <td><hr></td>
                       <td><hr></td>
                       <td><hr></td>
                    </tr>
                    @foreach ($stocks as $stock)
                    <li><tr>
                        <td>{{$stock->stock}}</td>
                        <td>${{$stock->stockAmount}}</td>
                        <td><a href="/stockDelete/{{$stock->id}}/" class="delete_expense">Delete</a></td>
                        <td><a href="" class="delete_expense">Edit</a></td>
                    </tr></li>
                    @endforeach
                </table> <br>
            </ul>
        </div>

        <div class="ChartStock">

            <h3 class="yourStock">Your distribution:</h3>

            <canvas id="MyChart"></canvas>
            <canvas id="MyChartBar"></canvas>

            <button class="btn_deepblue btnChangeFormat">Change format</button>
            {{-- Chart --}}
            <div class="">
                    
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>    
                    
                    {{-- Chart circle --}}
                    <script>
                        let myChart = document.getElementById('MyChart').getContext('2d');
                                          
                        var chart = new Chart(MyChart, {
                            type: 'pie',
                            data: {
                                labels:stocksJS,
                                datasets: [{
                                    label:'Amount',
                                    data: stocksAmountJS,
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
                        labels:stocksJS,
                        datasets: [{
                            label:'Amount',
                            data: stocksAmountJS,
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

            {{-- Widget forex --}}
            <div class="col-lg-7 criptoChanges">
                <iframe src="https://es.widgets.investing.com/top-cryptocurrencies?theme=darkTheme&roundedCorners=true&cols=symbol,priceUsd,priceBtc,chg24" width="100%" height="100%" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe><div class="poweredBy" style="font-family: Arial, Helvetica, sans-serif;">Cortesía de <a href="https://es.investing.com?utm_source=WMT&amp;utm_medium=referral&amp;utm_campaign=TOP_CRYPTOCURRENCIES&amp;utm_content=Footer%20Link" target="_blank" rel="nofollow">Investing.com</a></div>        
            </div>
            
            <div class="ForEx ">
                <iframe  height="440px" src="https://www.dolarsi.com/func/moduloArriba-n.html" frameborder="0" scrolling="0" allowfullscreen=""></iframe>
            </div>  
            
       </div>

    </section>
    <section class="section_btn_return">
        <a href="/"><button class="btn_deepblue btnReturn">Dashboard</button></a>
    </section>
</div>
    
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