<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Fanhai\Models\Employee;
use Fanhai\Services\Sms\Interfaces\SmsServiceInterface;

class SmsController extends Controller
{
    public function __construct(SmsServiceInterface $smsService)
    {
       $this->smsService = $smsService;
    }

    public function send(Request $request)
    {   
        $employee_id = $request->get('employee_id');
        $message = $request->get('message');

        $employee = Employee::findOrFail($employee_id);
      
        // Log::channel('debug')->info($employee->mobile);

        $this->smsService->sendSms($employee->mobile, $message);

        return response()->json([
            'status' => 'Sms Send',
        ]);
    }
}
