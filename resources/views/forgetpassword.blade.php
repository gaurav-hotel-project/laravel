@extends('frontlayout')
@section('content')
<style>
    #new-button{
        justify-content: center;

    }

    </style>
<div class="container my-4">
    <h3 class="mb-3">Forgot Password</h3>
    @if(Session::has('success'))
    <p class="text-success">{{session('success')}}</p>
    @endif
    <form method="post" action="{{url('page/reset-password')}}">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Email<span class="text-danger">*</span></th>
                <td><input required type="email" class="form-control" id="user-email"></td>
            </tr>
            <tr class="new-button">
                <td colspan="2"><input type="submit" class="btn btn-primary" id="new-button"/></td>
            </tr>
        </table>
    </form>
</div>
@endsection