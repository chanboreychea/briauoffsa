<?php

namespace App\Http\Controllers;

use App\Enum\Department;
use App\Enum\MeetingLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GuestController extends Controller
{
    public function index()
    {
        session()->flush();
        $departments = Department::DEPARTMENTS;
        $meetingLevel = MeetingLevel::MEETING_LEVEL;
        return view('guest.guestRequest', compact('meetingLevel', 'departments'));
    }

    public function getCode(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|max:100',
            'position' => 'bail|required|max:100',
            'phoneNumber' => [
                'bail',
                'required',
                'regex:/^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/',
                'max:20'
            ],
            'email' => 'bail|required|email|max:100',
            'meetingLevel' => 'bail|required|regex:/[1-9]{1}/',
        ]);

        session([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'phoneNumber' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'meetingLevel' => $request->input('meetingLevel'),
            'interOfficeOrDepartmental' => $request->input('interOfficeOrDepartmental'),
            'random' => mt_rand(100000, 999999),
            'created_at_random' => Carbon::now()->format('Y-m-d h:i:s a')
        ]);

        $randomNumber = session('random');

        return view('guest.confirmCode', compact('randomNumber'));
    }

    public function loginWithGenerateCode(Request $request)
    {
        $request->validate([
            'code' => 'bail|required|numeric'
        ], [
            'code.required' => 'សូមបញ្ចូលនូវលេខកូដ',
            'code.numeric' => 'សូមបញ្ចូលនូវលេខកូដជាលេខ',
        ]);

        $timeCreateCode = session('created_at_random');
        $addTwoSecondTotimeCreateCode = Carbon::parse($timeCreateCode)->addSecond(60)->format('Y-m-d h:i:s a');
        $now = Carbon::now()->format('Y-m-d h:i:s a');

        // dd($timeCreateCode . " - " . $addTwoSecondTotimeCreateCode);
        $code = $request->input('code');
        $confirmCode = session('random');

        if ($code == $confirmCode && $now <= $addTwoSecondTotimeCreateCode) {
            session(['is_user_logged_in' => true]);
            return redirect('/calendar')->with('message', 'សូមស្វាគមន៍មកកាន់ប្រព័ន្ធយើងខ្ញុំ');
            // dd([
            //     'name' => session('name'),
            //     'position' => session('position'),
            //     'phoneNumber' => session('phoneNumber'),
            //     'email' => session('email'),
            //     'meetingLevel' => session('meetingLevel'),
            //     'random' => session('random'),
            //     'created_at_random' => session('created_at_random')
            // ]);
        }
        return redirect('/guests')->with('message', 'សូមព្យាយាមម្ដងទៀត សូមអរគុណ។');
    }
}
