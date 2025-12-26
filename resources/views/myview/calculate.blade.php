@extends('template.default')

@section('title', 'my view')
@section('content')
<label>ชื่อ</label>
<input value="{{ $num }}" class="form-control" readonly>
@endsection