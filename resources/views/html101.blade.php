@extends('template.default')
@section('title', 'Workshop Form')
@section('header', 'Workshop #HTML - Form')
@section('content')
    <form action="/" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="fname">ชื่อ</label>
            </div>
            <div class="col-sm-9">
                <input type="text" id="fname" name="fname" class="form-control">
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดระบุชื่อ</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="lname">สกุล</label>
            </div>
            <div class="col-sm-9">
                <input type="text" id="lname" name="lname" class="form-control">
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดระบุสกุล</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="dob">วัน/เดือน/ปีเกิด</label>
            </div>
            <div class="col-sm-9">
                <input type="date" id="dob" name="dob" class="form-control">
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดระบุวันเกิด</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="age">อายุ</label>
            </div>
            <div class="col-sm-9">
                <input type="number" id="age" name='age' class="form-control">
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดระบุอายุ</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label>เพศ</label>
            </div>
            <div class="col-sm-9">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="ชาย">
                    <label class="form-check-label" for="male">ชาย</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="หญิง">
                    <label class="form-check-label" for="female">หญิง</label>
                </div>
                <div id="gender-feedback" class="text-danger d-none" style="font-size: 0.875em;">
                    โปรดเลือกเพศ
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="file">รูป</label>
            </div>
            <div class="col-sm-9">
                <input type="file" id="file" name="file" class="form-control">
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดเลือกไฟล์รูปภาพ</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="address">ที่อยู่</label>
            </div>
            <div class="col-sm-9">
                <textarea id="address" name="address" class="form-control" rows="4"></textarea>
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดระบุที่อยู่</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="color">สีที่ชอบ</label>
            </div>
            <div class="col-sm-9">
                <select id="color" name="color" class="form-select">
                    <option value="" selected disabled>-- กรุณาเลือกสี --</option>
                    <option value="สีแดง">สีแดง</option>
                    <option value="สีน้ำเงิน">สีน้ำเงิน</option>
                    <option value="สีเขียว">สีเขียว</option>
                    <option value="สีม่วง">สีม่วง</option>
                </select>
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดเลือกสีที่ชอบ</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label>แนวเพลงที่ชอบ</label>
            </div>
            <div class="col-sm-9">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="music" id="music1" value="เพื่อชีวิต">
                    <label class="form-check-label" for="music1">เพื่อชีวิต</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="music" id="music2" value="ลูกทุ่ง">
                    <label class="form-check-label" for="music2">ลูกทุ่ง</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="music" id="music3" value="อื่นๆ">
                    <label class="form-check-label" for="music3">อื่นๆ</label>
                </div>
                 <div id="music-feedback" class="text-danger d-none" style="font-size: 0.875em;">
                    โปรดเลือกแนวเพลง
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="consent">
                    <label class="form-check-label fw-bold" for="consent">
                        ยินยอมให้เก็บข้อมูล
                    </label>
                    <div class="invalid-feedback">
                        คุณต้องยอมรับข้อตกลงก่อน
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <button class="btn btn-light" type="reset">Reset</button>
            </div>
            <div class="col">
                <button class="btn btn-success" onclick="ClickMe()" type="button">Submit</button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
   <script>
    let ClickMe = function () {
        // ตัวแปรเช็คว่าผ่านทั้งหมดไหม (ตั้งค่าเริ่มต้นเป็น true)
        let isValid = true; 

        // 1. เช็คช่องทั่วไป (เก็บผลลัพธ์ลงตัวแปร isValid)
        const validateField = (id) => {
            let el = document.getElementById(id);
            if (el.value.trim() == "") {
                el.classList.remove("is-valid");
                el.classList.add("is-invalid");
                return false; 
            } else {
                el.classList.remove("is-invalid");
                el.classList.add("is-valid");
                return true; 
            }
        }

        // ต้องเอาผลลัพธ์มา AND กัน เพื่อดูว่ามีอันไหนเป็นเท็จไหม
        // หมายเหตุ: การเขียนแบบนี้จะทำให้ validate ทำงานทุกช่อง แม้ช่องก่อนหน้าจะผิด (ซึ่งดีแล้วจะได้แดงให้ครบ)
        isValid = validateField('fname') && isValid;
        isValid = validateField('lname') && isValid;
        isValid = validateField('dob') && isValid;
        isValid = validateField('age') && isValid;
        isValid = validateField('file') && isValid;
        isValid = validateField('address') && isValid;
        isValid = validateField('color') && isValid;

        // 2. เช็ค Checkbox
        let consent = document.getElementById('consent');
        if (!consent.checked) {
            consent.classList.add("is-invalid");
            isValid = false; // ปรับเป็นไม่ผ่าน
        } else {
            consent.classList.remove("is-invalid");
            consent.classList.add("is-valid");
        }

        // 3. เช็ค Radio Gender
        let genderRadios = document.getElementsByName('gender');
        let genderSelected = false;
        for (let radio of genderRadios) {
            if (radio.checked) {
                genderSelected = true;
                break;
            }
        }
        let genderFeedback = document.getElementById('gender-feedback');
        if(!genderSelected){
            genderFeedback.classList.remove('d-none');
            isValid = false; // ปรับเป็นไม่ผ่าน
        } else {
            genderFeedback.classList.add('d-none');
        }

        // 4. เช็ค Radio Music
        let musicRadios = document.getElementsByName('music');
        let musicSelected = false;
        for (let radio of musicRadios) {
            if (radio.checked) {
                musicSelected = true;
                break;
            }
        }
        let musicFeedback = document.getElementById('music-feedback');
        if(!musicSelected){
            musicFeedback.classList.remove('d-none');
            isValid = false; // ปรับเป็นไม่ผ่าน
        } else {
            musicFeedback.classList.add('d-none');
        }

        // --- จุดสำคัญที่สุด: ถ้าผ่านหมด ให้ส่งฟอร์ม ---
        if (isValid) {
            // สั่ง Submit Form
            document.querySelector('form').submit();
        }
    }
</script>
@endpush