<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Exports\DataExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Kreait\Firebase\Contract\Database;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Maatwebsite\Excel\Concerns\FromQuery;



class AnoterOperation extends Controller
{
    private $database;
    private $table;

    public function __construct(Database $databasecon)
    {
        $this->database = $databasecon;
        $this->table = "users";
    }
    /* *************************************************************************************** */
    /*                                   عملية تسجيل الدخول و الخروج                        */
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $users = $this->database->getReference($this->table)->getValue();
        $users_And_passwords = [];
        foreach ($users as $key => $row) {
            $users_And_passwords = array_merge($users_And_passwords, [$key => $row['a_username'] . '_-_' . $row['b_password']]);
        }
        $find = in_array($username . '_-_' . $password, $users_And_passwords);
        $key = array_search($username . '_-_' . $password, $users_And_passwords);
        if ($find) {
            $user = $this->database->getReference($this->table)->getChild($key)->getValue();
            Session::put('username', $user['a_username']);
            Session::put('password', $user['b_password']);
            Session::put('permission', $user['c_permission']);
            Session::put('key', $key);
            $expiresAt = new \DateTime('tomorrow');
            $imageReference = app('firebase.storage')->getBucket()->object("user-images/" . $key . "." . "jpg");
            if ($imageReference->exists()) {
                $image = $imageReference->signedUrl($expiresAt);
            } else {
                $image = null;
            }
            Session::put('image', $image);
            return redirect()->route('indexPage');
        } else {
            $states = true;
            return view('login', compact('states'));
        }
    }

    public function logout()
    {
        Session::forget('username');
        Session::forget('password');
        Session::forget('permission');
        Session::forget('key');
        Session::forget('image');
        return redirect()->route('loginPage');
    }
    /* *************************************************************************************** */


    /* *************************************************************************************** */
    /*                                 عمليات ادارة المستخدمين                               */
    public function indexUsers()
    {
        if (Session::get('permission') == 'owner') {
            $users = $this->database->getReference($this->table)->getValue();
            $i = 0;
            return view('users', compact('users', 'i'));
        } else {
            return redirect()->route('loginPage');
        }
    }

    public function storeUser(Request $request)
    {
        if (Session::get('permission') == 'owner') {
            $data = [
                'a_username' => $request->username,
                'b_password' => $request->password,
                'c_permission' =>  $request->permission,
                'd_date_add' => Carbon::now()->format('Y-m-d'),
                'e_time_add' => Carbon::now()->format('H:i:s'),
                'f_day_add' => Carbon::now()->dayName,
                'g_date_updated' => ""
            ];
            $this->database->getReference($this->table)->push($data);
            $users = $this->database->getReference($this->table)->getValue();
            $users_And_passwords = [];
            foreach ($users as $key => $row) {
                $users_And_passwords = array_merge($users_And_passwords, [$key => $row['a_username'] . '_-_' . $row['b_password']]);
            }

            $key = array_search($request->username . '_-_' . $request->password, $users_And_passwords);

            $firebase_storage_path = 'user-images/';
            $localfolder = public_path('default-image-profile/profile.jpg');
            $file      = $key . '.jpg';
            $uploadedfile = fopen($localfolder, 'r');
            app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);
            return redirect()->route('usersPage');
        } else {
            return redirect()->route('loginPage');
        }
    }
    public function updateUser(Request $request)
    {
        if (Session::get('permission') == 'owner') {
            $key = $request->key;
            $user = $this->database->getReference($this->table)->getChild($key)->getValue();
            $new_data = [
                'a_username' => $user['a_username'],
                'b_password' => $user['b_password'],
                'c_permission' =>  $request->permission,
                'd_date_add' => $user['d_date_add'],
                'e_time_add' => $user['e_time_add'],
                'f_day_add' => $user['f_day_add'],
                'g_date_updated' => Carbon::now()->format('Y-m-d H:i:s')
            ];
            $this->database->getReference($this->table . '/' . $key)->update($new_data);
            return redirect()->route('usersPage');
        } else {
            return redirect()->route('loginPage');
        }
    }

    public function destroyUser(Request $request)
    {
        if (Session::get('permission') == 'owner') {
            $key = $request->key;
            $this->database->getReference($this->table . '/' . $key)->remove($key);
            app('firebase.storage')->getBucket()->object("user-images/" . Session::get('key') . "." . "jpg")->delete();
            return redirect()->route('usersPage');
        } else {
            return redirect()->route('loginPage');
        }
    }
    /* *************************************************************************************** */

    /* *************************************************************************************** */
    /*                                 عمليات المستخدمين                               */
    public function changePassword(Request $request)
    {
        if (Session::get('username')) {
            $key = Session::get('key');
            $newPass = $request->new_pass;
            $user = $this->database->getReference($this->table)->getChild($key)->getValue();
            $new_data = [
                'a_username' => $user['a_username'],
                'b_password' => $newPass,
                'c_permission' =>  $user['c_permission'],
                'd_date_add' => $user['d_date_add'],
                'e_time_add' => $user['e_time_add'],
                'f_day_add' => $user['f_day_add'],
                'g_date_updated' => Carbon::now()->format('Y-m-d H:i:s'),
                'h_password_updated' => Carbon::now()->format('Y-m-d H:i:s')
            ];
            Session::put('password', $newPass);
            $this->database->getReference($this->table . '/' . $key)->update($new_data);
            return redirect()->route('profilePage')->with('status', 'donePass');
        } else {
            return redirect()->route('loginPage');
        }
    }

    public function changeImage(Request $request)
    {
        if (Session::get('username')) {
            $expiresAt = new \DateTime('tomorrow');
            $imageReference = app('firebase.storage')->getBucket()->object("user-images/" . Session::get('key') . "." . "jpg");
            if ($imageReference->exists()) {
                app('firebase.storage')->getBucket()->object("user-images/" . Session::get('key') . "." . "jpg")->delete();
            }
            $request->validate([
                'img' => 'required',
            ]);
            $image = $request->file('img');
            $firebase_storage_path = 'user-images/';
            $localfolder = public_path('firebase-temp-uploads') . '/';
            $extension = $image->getClientOriginalExtension();
            $file      = Session::get('key') . '.' . $extension;
            if ($image->move($localfolder, $file)) {
                $uploadedfile = fopen($localfolder . $file, 'r');
                app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);
                // unlink($localfolder . $file);
            }
            $expiresAt = new \DateTime('tomorrow');
            $imageReference = app('firebase.storage')->getBucket()->object("user-images/" . Session::get('key') . "." . "jpg");
            if ($imageReference->exists()) {
                $image = $imageReference->signedUrl($expiresAt);
            } else {
                $image = null;
            }
            Session::put('image', $image);
            return redirect()->route('profilePage')->with('status', 'doneImag');
        } else {
            return redirect()->route('loginPage');
        }
    }

    public function newNotification()
    {
    }

    public function indexNotification()
    {
    }

    public function export()
    {
        $export = new DataExport();
        $fileName = 'data.xlsx';
        return Excel::download($export, $fileName);
    }

    /* *************************************************************************************** */

    public function reportPage()
    {
        if (Session::get('username')) {
            return view('report');
        } else {
            return redirect()->route('loginPage');
        }
    }



    public function getData(Request $request)
    {
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');
        Session::put('date_from', $dateFrom);
        Session::put('date_to', $dateTo);

        $apiUrl = 'http://localhost/laravel-projects/MyAPIs/public/api/get_sensors_data';

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 3,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
            ],
        ]);

        $requestBody = [
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
        ];

        $jsonRequestBody = json_encode($requestBody);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonRequestBody);

        $apiResponse = curl_exec($curl);

        if (curl_errno($curl)) {
            $error = curl_error($curl);
            curl_close($curl);
            return response()->json(['error' => $error], 500);
        }

        // Close curl
        curl_close($curl);

        $responseData = json_decode($apiResponse, true);

        $i = 0;
        $p_result_out = $responseData;

        return view('report', compact('i', 'p_result_out'));
    }
}