<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Illuminate\Support\Facades\Session;

class Esp32Data extends Controller
{

    private $database;
    private $table;

    public function __construct(Database $databasecon)
    {
        $this->database = $databasecon;
        $this->table = "things_control";
    }

    public function index()
    {
        if (Session::get('username')) {
            $things_value = $this->database->getReference($this->table)->getValue();
            // dd(json_encode($things_value));
            return json_encode($things_value);
        } else {
            return redirect()->route('loginPage');
        }
    }

    public function room1_light_fn(Request $request)
    {
        if (Session::get('permission') == 'write' || Session::get('permission') == 'owner') {
            $value = $request->input('value');
            if ($value == "true")
                $value = true;
            else
                $value = false;
            $this->database->getReference($this->table)->update(['room1_light' => $value]);
        } else {
            return redirect()->route('loginPage');
        }
    }

    public function room1_motor_fn(Request $request)
    {
        if (Session::get('permission') == 'write' || Session::get('permission') == 'owner') {
            $value = $request->input('value');
            $this->database->getReference($this->table)->update(['room1_motor' => $value]);
        } else {
            return redirect()->route('loginPage');
        }
    }
}
