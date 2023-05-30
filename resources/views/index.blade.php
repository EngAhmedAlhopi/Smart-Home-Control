@extends('layouts.masterapex')

@section('title')
    لوحة التحكم
@endsection

@section('style')
    <style>
        h6 {
            padding-right: 15px !important;
            color: #665e5e !important;
        }

        .card {
            box-shadow: 2px 2px 2PX 2PX #4d4c4c !important;
        }

        .sub-card {
            height: 80% !important;
            padding: 15px;
            box-shadow: 2px 2px 2PX 2PX #c8c3c3 !important;
        }

        h3 {
            font-size: x-large !important;
        }

        .sub-card-title {
            width: 100%;
            text-align: center;
        }

        .sub-card-body {
            width: 100%;
            align-items: center;
            text-align: center;
        }

        .value-style {
            margin-top: 0;
            font-size: 2em;
            font-weight: bold;
        }

        .box {
            height: 100px;
            width: 60%;
            border: solid 1px rgb(255, 255, 255);
            margin: 0 auto;
            border-radius: 10%;
        }

        .box-text {
            font-size: larger;
            color: black;
            height: 30px;
            width: 100%;
            margin-top: 35%;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 10;
            height: 10;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        select {
            width: 100%;
            font-size: large;
            background-color: #ece8e8;
            padding: 3px 10px;
            border-radius: 5%;
        }

        .card-title {
            text-align: center !important;
            height: 50px;
        }

        .read-style {
            margin: 0 auto !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div @if (Session::get('permission') == 'read') class="col-6 read-style" @else  class="col-6" @endif>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        الحساسات
                    </h3>
                </div>
                <div class="card-body">
                    <!------------------------------------------------------------------------------------------------------>
                    <div>
                        <div class="row">
                            <div class="col-4">
                                <div class="card sub-card">
                                    <div class="sub-card-title">
                                        <h6 style="padding-right:0px !important; ">
                                            درجة الحرارة
                                        </h6>
                                    </div>
                                    <div class="sub-card-body">
                                        <span class="value-style"><span id="temperature"></span>°</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card sub-card">
                                    <div class="sub-card-title">
                                        <h6 style="padding-right:0px !important; ">
                                            نسبة الرطوبة
                                        </h6>
                                    </div>
                                    <div class="sub-card-body">
                                        <span class="value-style"><span id="humidity"></span>%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card sub-card">
                                    <div class="sub-card-title">
                                        <h6 style="padding-right:0px !important; ">
                                            نسبة تسرب الغاز
                                        </h6>
                                    </div>
                                    <div class="sub-card-body">
                                        <span class="value-style">1.3%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="card sub-card">
                                    <div class="sub-card-title">
                                        <h6 style="padding-right:0px !important; ">
                                            الحركة
                                        </h6>
                                    </div>
                                    <div class="sub-card-body">
                                        <div class="box" style="background-color: MediumSeaGreen">
                                            <div class="box-text">
                                                منعدمة
                                            </div>
                                        </div>

                                        {{-- <div class="box" style="background-color: rgb(227, 227, 66)">
                                        <div class="box-text">
                                            خفيفة
                                        </div>
                                    </div> --}}

                                        {{-- <div class="box" style="background-color: red">
                                        <div class="box-text">
                                            شديدة
                                        </div>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card sub-card">
                                    <div class="sub-card-title">
                                        <h6 style="padding-right:0px !important; ">
                                            الصوت
                                        </h6>
                                    </div>
                                    <div class="sub-card-body">
                                        {{-- <div class="box" style="background-color: MediumSeaGreen">
                                        <div class="box-text">
                                            هادئ
                                        </div>
                                    </div> --}}

                                        <div class="box" style="background-color: rgb(227, 227, 66)">
                                            <div class="box-text">
                                                خفيف
                                            </div>
                                        </div>

                                        {{-- <div class="box" style="background-color: red">
                                        <div class="box-text">
                                            ضوضاء
                                        </div>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card sub-card">
                                    <div class="sub-card-title">
                                        <h6 style="padding-right:0px !important; ">
                                            الحريق
                                        </h6>
                                    </div>
                                    <div class="sub-card-body">
                                        <div class="box" style="background-color: MediumSeaGreen">
                                            <div class="box-text">
                                                لا يوجد
                                            </div>
                                        </div>

                                        {{-- <div class="box" style="background-color: red">
                                        <div class="box-text">
                                            يوجد
                                        </div>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="card sub-card">
                                    <div class="sub-card-title">
                                        <h6 style="padding-right:0px !important; ">
                                            نسبة شدة الاضاءة
                                        </h6>
                                    </div>
                                    <div class="sub-card-body">
                                        <span class="value-style">90%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card sub-card">
                                    <div class="sub-card-title">
                                        <h6 style="padding-right:0px !important; ">
                                            جودة الهواء
                                        </h6>
                                    </div>
                                    <div class="sub-card-body">
                                        <span class="value-style">85%</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!------------------------------------------------------------------------------------------------------>
                    </div>
                </div>
            </div>
        </div>
        {{--  ------------------------------------------------------------------------------------------  --}}
        @if (Session::get('permission') == 'write' || Session::get('permission') == 'owner')
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            المشغلات
                        </h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="card sub-card">
                                        <div class="sub-card-title">
                                            <h6 style="padding-right:0px !important; ">
                                                الاضاءة
                                            </h6>
                                        </div>
                                        <div class="sub-card-body">
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card sub-card">
                                        <div class="sub-card-title">
                                            <h6 style="padding-right:0px !important; ">
                                                الاصوات
                                            </h6>
                                        </div>
                                        <div class="sub-card-body">
                                            <select name="sound" class="form-select form-control"
                                                id="validationTooltip04">
                                                <option value="1">انذار</option>
                                                <option value="2">اغنية</option>
                                                <option value="3">قران</option>
                                                <option value="4">غير</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card sub-card">
                                        <div class="sub-card-title">
                                            <h6 style="padding-right:0px !important; ">
                                                المروحة
                                            </h6>
                                        </div>
                                        <div class="sub-card-body">
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="card sub-card">
                                        <div class="sub-card-title">
                                            <h6 style="padding-right:0px !important; ">
                                                شدة الاضاءة
                                            </h6>
                                        </div>
                                        <div class="sub-card-body">
                                            <div class="slider-container">
                                                <div class="slider-value">
                                                    <span id="slider-value" class="value-style">50</span><span
                                                        class="value-style">%</span>
                                                </div>
                                                <input type="range" min="0" max="100" value="50"
                                                    class="range-slider" id="range-slider" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card sub-card">
                                        <div class="sub-card-title">
                                            <h6 style="padding-right:0px !important; ">
                                                الباب
                                            </h6>
                                        </div>
                                        <div class="sub-card-body">
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card sub-card">
                                        <div class="sub-card-title">
                                            <h6 style="padding-right:0px !important; ">
                                                سرعة المروحة
                                            </h6>
                                        </div>
                                        <div class="sub-card-body">
                                            <div class="slider-container">
                                                <div class="slider-value">
                                                    <span id="slider-value2" class="value-style">3</span>
                                                </div>
                                                <input type="range" min="0" max="5" value="3"
                                                    class="range-slider" id="range_slider2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endsection

    @section('script')
        <script>
            const room1_light = document.getElementById("room1_light");
            const range_slider2 = document.getElementById("range_slider2");



            function fetchData() {
                fetch('http://localhost/laravel-projects/Esp32/public/get_things_data')
                    .then(response => response.json())
                    .then(data => {
                        const temperature = data.temperature;
                        const humidity = data.humidity;
                        // update the content of the span element with the latest value
                        document.getElementById('temperature').textContent = temperature;
                        document.getElementById('humidity').textContent = humidity;
                        if (testlde) {
                            chtest.checked = true;
                        } else {
                            chtest.checked = false;
                        }
                    })
            }

            function room1_motor_fn() {
                let slival = document.getElementById("range-slider2");
                let value3 = slival.value;
                $.ajax({
                    url: "http://localhost/laravel-projects/Esp32/public/room1_motor",
                    type: "POST",
                    data: {
                        value: value3
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            function room1_light_fn() {
                var checkbox_value = $("#room1_light").is(":checked") ? true : false;
                $.ajax({
                    url: "http://localhost/laravel-projects/Esp32/public/room1_light",
                    type: "POST",
                    data: {
                        value: checkbox_value
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }




















































            document.onload = fetchData();
            // define a function to fetch data from API




            // call the fetchData function every second using setInterval
            setInterval(fetchData, 1000);


            const rangeSlider = document.getElementById("range_slider2");
            const sliderValue = document.getElementById("slider-value");
            const minValue = document.querySelector(".min-value");
            const maxValue = document.querySelector(".max-value");
            rangeSlider.oninput = function() {
                sliderValue.innerHTML = this.value;
            }
            window.onload = function() {
                sliderValue.innerHTML = rangeSlider.value;
                minValue.innerHTML = rangeSlider.min;
                maxValue.innerHTML = rangeSlider.max;

            }

            const rangeSlider2 = document.getElementById("range-slider2");
            const sliderValue2 = document.getElementById("slider-value2");
            const minValue2 = document.querySelector(".min-value");
            const maxValue2 = document.querySelector(".max-value");
            rangeSlider2.oninput = function() {
                sliderValue2.innerHTML = this.value;
            }
        </script>
    @endsection
