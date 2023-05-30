@extends('layouts.masterapex')

@section('title')
    الملف الشخصي
@endsection

@section('style')
    <style>
        * {
            box-sizing: border-box;
        }

        {{--  body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
        }  --}} .container2 {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }

        .form2 {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: right;
            width: 1000px;
            display: flex;
            justify-content: space-around;
        }

        form h1 {
            margin: 0;
            margin-bottom: 20px;
        }

        .input-field2 {
            margin-bottom: 20px;
            position: relative;
        }

        .input-field2 input,
        .input-field2 input[type="file"] {
            border: none;
            border-bottom: 1px solid #ccc;
            font-size: 16px;
            padding: 10px 0;
            width: 70%;
        }

        .input-field2 input:focus,
        .input-field2 input[type="file"]:focus {
            outline: none;
        }

        .input-field2 label {
            color: #999;
            font-size: 16px;
            left: 130px;
            /* change from right to left */
            position: absolute;
            top: 10px;
            transition: 0.2s ease-out;
        }

        .input-field2 input:focus+label,
        .input-field2 input[type="file"]:focus+label {
            color: #00b4ff;
            font-size: 12px;
            top: -16px;
            /* change from -10px to -16px */
        }

        .test {
            width: 50%;
        }

        .img-profile2 {
            height: 80%;
            width: 80%;
            border-radius: 50%;
            margin: 0px auto;
            margin-right: 10%;
        }

        #msg {
            width: 100%;
        }

        #div-msg {
            width: 250px;
            background-color: rgb(209, 97, 97) !important;
            border: none !important;
        }
    </style>
@endsection


@section('content')
    @if (isset($status))
        @if ($status == 'donePass')
            <script>
                alert('تم تغيير كلمة المرور')
            </script>
        @else
            <script>
                alert('تم تغيير الصورة')
            </script>
        @endif
    @endif

    <div class="container2">
        <div class="form2 row">
            <div class="col-6 test">
                <form method="POST" action="{{ route('changPass') }}" enctype="multipart/form-data">
                    @csrf

                    <h1>الملف الشخصي للمستخدم</h1>
                    <div class="input-field2">
                        <input type="text" id="username" required disabled value="{{ Session::get('username') }}">
                        <label for="username">اسم المستخدم</label>
                    </div>
                    <input type="text" hidden value="{{ Session::get('password') }}" disabled id="oldPassIn">
                    <div class="input-field2">
                        <input type="password" name="old_pass" id="oldpass1">
                        <label for="oldpass1">كلمة المرور القديمة</label>
                    </div>
                    <div class="input-field2">
                        <input type="password" name="new_pass" id="newPass1In">
                        <label for="newPass1In">كلمة المرور الجديدة</label>
                    </div>
                    <div class="input-field2">
                        <input type="password" name="conf_pass" id="newPass2In">
                        <label for="newPass2In">تأكيد كلمة المرور</label>
                    </div>

                    <input type="submit" onclick="chickPasswords()" class="btn btn-primary" value="تغيير كلمة المرور"
                        id="send"><br><br>
                    <script>
                        function chickPasswords() {
                            var oldPassIn = document.getElementById("oldPassIn");
                            var oldpass1In = document.getElementById("oldpass1");
                            var newPass1In = document.getElementById("newPass1In");
                            var newPass2In = document.getElementById("newPass2In");
                            let oldpass = oldPassIn.value;
                            let oldpass1 = oldpass1In.value;
                            let pass1 = newPass1In.value;
                            let pass2 = newPass2In.value;
                            if (pass1 != pass2) {
                                var divMsg = document.getElementById("div-msg");
                                var msg = document.getElementById("msg");
                                divMsg.style.display = "block";
                                msg.textContent = "كلمات المرور غير متطابقة";
                                event.preventDefault();
                            } else {
                                if (oldpass != oldpass1) {
                                    var divMsg = document.getElementById("div-msg");
                                    var msg = document.getElementById("msg");
                                    divMsg.style.display = "block";
                                    msg.textContent = "كلمة المرور القديمة غير صحيحة";
                                    event.preventDefault();
                                }
                            }
                        }
                    </script>
                    <div class="alert alert-danger" id="div-msg" style="display: none">
                        <div id="msg">
                        </div>
                    </div>
                </form>


            </div>
            <div class="col-6 test">
                <img src="{{ asset(Session::get('image')) }}" alt="" class="img-profile2">
                <br>
                <br>
                <form method="POST" action="{{ route('changeImage') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-field2">
                        <input type="file" id="image" accept="image/*" name="img">
                        <label for="image">اختر صورة</label>
                        <button type="submit" class="btn btn-primary">تغيير الصورة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
