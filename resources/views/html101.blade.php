<!DOCTYPE html>
<html>
    <head>
        <title>Workshop #HTML - FORM</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: "Sarabun", sans-serif;
            }
            /* เพิ่มระยะห่างระหว่างบรรทัดเล็กน้อยเพื่อให้เหมือนภาพ */
            .row {
                margin-bottom: 10px;
                align-items: center; /* จัดให้อยู่กึ่งกลางแนวตั้ง */
            }
            label {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container mt-4" style="max-width: 600px;"> <form>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="fname">ชื่อ</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" id="fname" class="form-control">
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
                    <div class="col-6">
                        <button type="reset" class="btn btn-outline-dark w-100">Reset</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-success w-100">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </body>   
</html>