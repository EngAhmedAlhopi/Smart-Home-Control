@extends('layouts.masterapex')

@section('title')
    انشاء تقرير
@endsection

@section('style')
    <style>
        .row2 {
            margin: 10px;
        }

        .lbl {
            font-size: larger;
            margin-left: 20px;
            height: 30px;

        }

        .in-date {
            width: 300px;
            height: 35px;
        }

        .btn {
            width: 200px;
        }
    </style>
@endsection

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card shopping-cart">
                <div class="card-header pb-2">
                    <h4 class="card-title mb-1">انشاء تقرير</h4>
                </div>

                <form class="row2 row" method="POST">
                    @csrf
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label lbl">من تاريخ</label>
                        <input type="date" class="in-date" id="validationCustom01" value="" name="date_from"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label lbl">الى تاريخ</label>
                        <input type="date" class="in-date" id="validationCustom01" value="" name="date_to"
                            required>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary" onclick="getDataTable()">بحث</button>
                        {{--  <input type="submit" class="btn btn-primary" value="بحث" onclick="getDataTable()">  --}}
                    </div>
                </form>
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-center m-0">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="{{ route('export') }}" class="btn btn-success">تصدير اكسل</a>
                                        </td>
                                    </tr>
                                </thead>
                                <tr>
                                    <th>#</th>
                                    <th>درجة الحرارة</th>
                                    <th>نسبة الرطوبة</th>
                                    <th>المسافة</th>
                                    <th>نسبة الغاز</th>
                                    <th>نسبة الكربون</th>
                                    <th>الحريق</th>
                                    <th>شدة الاضاءة</th>
                                    <th>التاريخ</th>
                                </tr>

                                <tbody>
                                    @if (isset($i) && isset($p_result_out))
                                        @foreach ($p_result_out as $row)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $row['TEMPERATURE'] }}</td>
                                                <td>{{ $row['HUMIDITY'] }}</td>
                                                <td>{{ $row['ULTRASONIC'] }}</td>
                                                <td>{{ $row['MQ4'] }}</td>
                                                <td>{{ $row['MQ7'] }}</td>
                                                <td>{{ $row['FLAME'] }}</td>
                                                <td>{{ $row['LDR'] }}</td>
                                                <td>{{ $row['READING_TIME'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function getDataTable() {
            var formData = {
                date_from: $('input[name="date_from"]').val(),
                date_to: $('input[name="date_to"]').val()
            };
            {{--  var formData = {
                date_from: '2023-05-31',
                date_to: '2023-06-01'
            };  --}}
            $.ajax({
                url: "http://localhost/laravel-projects/Esp32/public/report",
                type: "POST",
                data: {
                    value: formData
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script>
@endsection
