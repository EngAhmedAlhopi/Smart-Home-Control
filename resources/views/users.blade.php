@extends('layouts.masterapex')

@section('title')
    المستخدمون
@endsection

@section('style')
    <style>
        .row2 {
            margin: 10px;
        }

        .btn2 {
            margin-top: 24px !important;
        }

        .inname {
            width: 250px !important;
            margin-right: 100px !important;
        }

        .table3 {
            width: 60% !important;

            margin: 10px auto !important;

        }
    </style>
@endsection

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card shopping-cart">
                <div class="card-header pb-2">
                    <h4 class="card-title mb-1">المستخدمون</h4>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form class="row2 row" method="POST" action="{{ route('storeUser') }}">
                                @csrf
                                <div class="col-md-3">
                                    <label for="validationCustom01" class="form-label">اسم المستخدم</label>
                                    <input type="text" class="form-control" id="validationCustom01" value=""
                                        name="username" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom01" class="form-label">كلمة المرور</label>
                                    <input type="text" class="form-control" id="validationCustom01" value=""
                                        name="password" required>
                                </div>
                                <div class="col-3">
                                    <label for="validationCustom01" class="form-label">الصلاحية</label>
                                    <select class="form-select form-control" id="validationTooltip04" required
                                        name="permission">
                                        <option value="write">محرر</option>
                                        <option value="read">مشاهد</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <input type="submit" class="btn btn-primary btn2" value="اضافة">
                                </div>
                            </form>
                            <table class="table text-center m-0 table3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>المستخدم</th>
                                        <th>كلمة المرور</th>
                                        <th>الصلاحية</th>
                                        <th>تعديل</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $row)
                                        @if ($row['a_username'] != 'admin')
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $row['a_username'] }}</td>
                                                <td>{{ $row['b_password'] }}</td>
                                                <td>
                                                    <form class="row2 row" method="POST" action="{{ route('editUser') }}">
                                                        @csrf
                                                        <input type="text" name="key" id="" hidden
                                                            value="{{ $key }}">
                                                        <select class="form-select form-control" id="validationTooltip04"
                                                            required name="permission">
                                                            @if ($row['c_permission'] == 'write')
                                                                <option value="write" selected>محرر</option>
                                                            @else
                                                                <option value="write">محرر</option>
                                                            @endif
                                                            @if ($row['c_permission'] == 'read')
                                                                <option value="read" selected>مشاهد</option>
                                                            @else
                                                                <option value="read">مشاهد</option>
                                                            @endif
                                                        </select>
                                                </td>
                                                <td>
                                                    <input type="submit" class="btn btn-primary" value="تعديل">
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="{{ route('deleteUser', $key) }}"><i class="ft-trash-2"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
