@extends('template.default')
@section('header', 'ตารางแม่สูตรคูณ')
@section('content')
<form action="/calculate" method="post">
    @csrf
    <?php //echo $_GET['mynumber']; ?>
    <input class="form-control" name="mynumber" type="number">
    <br>
    <button class="btn btn-success">บันทึก</button>
</form>
@endsection