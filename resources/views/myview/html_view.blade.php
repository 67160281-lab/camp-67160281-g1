@extends('template.default')

@section('content')
<label>ชื่อ</label>
<input value="{{ $fname }}" class="form-control" readonly>
<label>นามสกุล</label>
<input value="{{ $lname }}" class="form-control" readonly>
<label>วันเกิด</label>
<input value="{{ $dob }}" class="form-control" readonly>
<label>อายุ</label>
<input value="{{ $age }}" class="form-control" readonly>
<label>เพศ</label>
<input value="{{ $gender }}" class="form-control" readonly>
<label>ไฟล์</label>
<input value="{{ $file }}" class="form-control" readonly>
<label>ที่อยู่</label>
<textarea class="form-control" readonly>{{ $address }}</textarea>
<label>สีที่ชอบ</label>
<input value="{{ $color }}" class="form-control" readonly>
<label>เพลงที่ชอบ</label>
<input value="{{ $music }}" class="form-control" readonly>
@endsection