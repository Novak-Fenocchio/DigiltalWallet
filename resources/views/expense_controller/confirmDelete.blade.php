@extends('layouts.base')
@section('content')
    <section class="SectionConfirmDelet">
        <h3 class="lighter">are you sure to delete it?...</h3>

        <table class="table">
            <tr>
                <td>Name:</td>
                <td>Amount</td>    
            </tr>
            <tr>
                <td>{{$name}}</td>
                <td>{{$amount}}</td>
            </tr>
        </table>
       <div class="ConfirmDeleteButtons">
            <form action="/{{$controllerMine}}/{{$report->id}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn_deepblue">Delete</button>
                <a href="/{{$controllerMine}}/show" class="btn-lightgreen col-lg-6">Cancel</a>
            </form>
        </div>
    </section>
@endsection