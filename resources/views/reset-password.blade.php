@extends('frontlayout')
@section('content')

<div class="container my-4">
    <h3 class="mb-3">Reset Password</h3>
    @if(Session::has('success'))
    <p class="text-success">{{session('success')}}</p>
    @endif
    <form method="post" action="{{url('reset-password')}}">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Password<span class="text-danger">*</span></th>
                <td><input required type="password" class="form-control" id="user-password"></td>
            </tr>
            <tr>
                <th>Confirm Password<span class="text-danger">*</span></th>
                <td><input required type="password" class="form-control" id="user-confirm-password"></td>
            </tr>
            <tr class="new-button">
                <td colspan="2"><input type="submit" class="btn btn-primary" id="new-button"/></td>
            </tr>
        </table>
    </form>
</div>

@endsection