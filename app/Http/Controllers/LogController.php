<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function saveLog($userId, $area, $description, $operation, $vinculo)
    {
        $log = new Log();
        $log->usuarioID = Auth::user()->id;
        $log->log_are = $area;
        $log->log_des = $description;
        $log->log_op = $operation;
        $log->log_vin = $vinculo;

        //função request()->ip() para obter o IP do cliente.
        $log->log_ip = request()->ip();
        

        $log->log_dat = now()->toDateString();
        $log->log_hor = now()->toTimeString();

        $log->save();
    }

    public function getLogs(){
        
        $logs = Log::with('user')->get();

        return view('logs', ['logs' => $logs]);
    }


}
