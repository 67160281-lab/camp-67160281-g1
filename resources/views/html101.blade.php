@extends('template.default')
@section('title', 'Workshop Form')
@section('content')
    <h1>Workshop #HTML Form</h1>
    <form>
        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="fname">ชื่อ</label>
            </div>
            <div class="col-sm-9">
                <input type="text" id="fname" class="form-control">
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดระบุชื่อ</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="lname">สกุล</label>
            </div>
            <div class="col-sm-9">
                <input type="text" id="lname" class="form-control">
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดระบุสกุล</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="dob">วัน/เดือน/ปีเกิด</label>
            </div>
            <div class="col-sm-9">
                <input type="date" id="dob" class="form-control">
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดระบุวันเกิด</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="age">อายุ</label>
            </div>
            <div class="col-sm-9">
                <input type="number" id="age" class="form-control">
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
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">ชาย</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
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
                <input type="file" id="file" class="form-control">
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดเลือกไฟล์รูปภาพ</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="address">ที่อยู่</label>
            </div>
            <div class="col-sm-9">
                <textarea id="address" class="form-control" rows="4"></textarea>
                <div class="valid-feedback">ถูกต้อง</div>
                <div class="invalid-feedback">โปรดระบุที่อยู่</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="color">สีที่ชอบ</label>
            </div>
            <div class="col-sm-9">
                <select id="color" class="form-select">
                    <option value="" selected disabled>-- กรุณาเลือกสี --</option>
                    <option value="red">สีแดง</option>
                    <option value="blue">สีน้ำเงิน</option>
                    <option value="green">สีเขียว</option>
                    <option value="purple">สีม่วง</option>
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
                    <input class="form-check-input" type="radio" name="music" id="music1" value="for_life">
                    <label class="form-check-label" for="music1">เพื่อชีวิต</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="music" id="music2" value="country">
                    <label class="form-check-label" for="music2">ลูกทุ่ง</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="music" id="music3" value="other">
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
            
            // 1. สร้างฟังก์ชันย่อยสำหรับเช็คช่องทั่วไป (Text, Number, Date, Select, Textarea)
            const validateField = (id) => {
                let el = document.getElementById(id);
                if (el.value.trim() == "") {
                    el.classList.remove("is-valid");
                    el.classList.add("is-invalid");
                    return false; // ไม่ผ่าน
                } else {
                    el.classList.remove("is-invalid");
                    el.classList.add("is-valid");
                    return true; // ผ่าน
                }
            }

            // เรียกใช้ฟังก์ชันกับ ID ต่างๆ
            validateField('fname');
            validateField('lname');
            validateField('dob');
            validateField('age');
            validateField('file');
            validateField('address');
            validateField('color');

            // 2. การเช็ค Checkbox (ยินยอม)
            let consent = document.getElementById('consent');
            if (!consent.checked) {
                consent.classList.add("is-invalid");
            } else {
                consent.classList.remove("is-invalid");
                consent.classList.add("is-valid");
            }

            // 3. การเช็ค Radio Button (เพศ)
            let genderRadios = document.getElementsByName('gender');
            let genderSelected = false;
            // วนลูปดูว่ามีอันไหนถูกเลือกไหม
            for (let radio of genderRadios) {
                if (radio.checked) {
                    genderSelected = true;
                    break;
                }
            }
            // จัดการแสดงผล Error ของ Radio (ต้องทำ Custom นิดหน่อยเพราะ Bootstrap ไม่ Auto ให้ Radio Group)
            let genderFeedback = document.getElementById('gender-feedback');
            if(!genderSelected){
                genderFeedback.classList.remove('d-none'); // แสดงข้อความ error
            } else {
                genderFeedback.classList.add('d-none'); // ซ่อนข้อความ error
            }

             // 4. การเช็ค Radio Button (เพลง)
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
            } else {
                musicFeedback.classList.add('d-none');
            }
        }
        
        // ส่วนอื่นๆ ที่ไม่ได้ใช้ในการตรวจสอบ form คงไว้เหมือนเดิม หรือลบออกก็ได้ถ้าไม่ได้ใช้
        let myfunc = (callback) => {
            callback("in Callback")
        }
        callMe = (param) => {
            console.log(param);
        }
        myfunc(callMe)

        let myvar1 = 1
        let myvar2 = "1"
        myvar2 = parseInt(myvar2)
        console.log(myvar1 + myvar2 + "\n\n\n\ntest")
        console.log(1 === '1');
    </script>
@endpush