 @extends('template.default')
 @section('title', 'Workshop From')
 @section('content')
     <h1>Workshop #HTML Form</h1>
     <form>
         <div class="row">
             <div class="col-sm-3">
                 <label for="fname">ชื่อ</label>
             </div>
             <div class="col-sm-9">
                 <input type="text" id="fname" class="form-control">
                 <div class="valid-feedback">
                    ถูกต้อง
                 </div>
                 <div class="invalid-feedback">
                    โปรดระบุขื่อนะ
                 </div>
             </div>
         </div>

         <div class="row">
             <div class="col-sm-3">
                 <label for="lname">สกุล</label>
             </div>
             <div class="col-sm-9">
                 <input type="text" id="lname" class="form-control">
             </div>
         </div>

         <div class="row">
             <div class="col-sm-3">
                 <label for="dob">วัน/เดือน/ปีเกิด</label>
             </div>
             <div class="col-sm-9">
                 <input type="date" id="dob" class="form-control">
             </div>
         </div>

         <div class="row">
             <div class="col-sm-3">
                 <label for="age">อายุ</label>
             </div>
             <div class="col-sm-9">
                 <input type="number" id="age" class="form-control">
             </div>
         </div>

         <div class="row">
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
             </div>
         </div>

         <div class="row">
             <div class="col-sm-3">
                 <label for="file">รูป</label>
             </div>
             <div class="col-sm-9">
                 <input type="file" id="file" class="form-control">
             </div>
         </div>

         <div class="row">
             <div class="col-sm-3">
                 <label for="address">ที่อยู่</label>
             </div>
             <div class="col-sm-9">
                 <textarea id="address" class="form-control" rows="4"></textarea>
             </div>
         </div>

         <div class="row">
             <div class="col-sm-3">
                 <label for="color">สีที่ชอบ</label>
             </div>
             <div class="col-sm-9">
                 <select id="color" class="form-select">
                     <option value="red">สีแดง</option>
                     <option value="blue">สีน้ำเงิน</option>
                     <option value="green">สีเขียว</option>
                     <option value="purple">สีม่วง</option>
                 </select>
             </div>
         </div>
         <div class="row">
             <div class="col-sm-3">
                 <label>แนวเพลงที่ชอบ</label>
             </div>
             <div class="col-sm-9">
                 <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="music" id="music1">
                     <label class="form-check-label" for="music1">เพื่อชีวิต</label>
                 </div>
                 <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="music" id="music2">
                     <label class="form-check-label" for="music2">ลูกทุ่ง</label>
                 </div>
                 <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="music" id="music3">
                     <label class="form-check-label" for="music3">อื่นๆ</label>
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
        let ClickMe = function (){
            let fname = document.getElementById('fname')
            // // fname.value = "from ClickMe"
            // // console.log(fname.value)

            if(fname.value == ""){
                fname.classList.remove("is-valid")
                fname.classList.add("is-invalid")
            }else {
                fname.classList.remove("is-invalid")
                fname.classList.add("is-valid")
            }


        }

        let myfunc = (callback) =>{
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
