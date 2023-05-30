<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة تسجيل الدخول</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            width: 400px;
        }

        form h1 {
            margin: 0;
            margin-bottom: 20px;
        }

        .input-field {
            margin-bottom: 20px;
            position: relative;
        }

        .input-field input {
            border: none;
            border-bottom: 1px solid #ccc;
            font-size: 16px;
            padding: 10px 0;
            width: 100%;
        }

        .input-field input:focus {
            outline: none;
        }

        .input-field label {
            color: #999;
            font-size: 16px;
            left: 0;
            position: absolute;
            top: 10px;
            transition: 0.2s ease-out;
        }

        .input-field input:focus+label {
            color: #00b4ff;
            font-size: 12px;
            top: -10px;
        }

        .checkbox-field {
            align-items: center;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            text-align: left;
        }

        .checkbox-field label {
            margin-left: 10px;
        }

        button[type="submit"] {
            background-color: #00b4ff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            transition: 0.2s ease-out;
        }

        button[type="submit"]:hover {
            background-color: #0088cc;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="{{ route('goIndexPage') }}" method="POST">
            @csrf
            <h1>تسجيل الدخول</h1>
            <div class="input-field">
                <input type="text" id="username" required name="username">
                <label for="username">اسم المستخدم</label>
            </div>
            <div class="input-field">
                <input type="password" id="password" required name="password">
                <label for="password">كلمة المرور</label>
            </div>
            <div class="checkbox-field">
                @if (isset($states))
                    <label for="remember" style="color: red;">اسم المستخدم او كلمة المرور غير صحيحة</label>
                @endif

            </div>
            <button type="submit">تسجيل الدخول</button>
        </form>
    </div>
</body>

</html>
