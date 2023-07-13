<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CalendarController extends Controller
{
    public function index()
    {
        return Inertia::render('AdminApp/Calendar', [
            'presences' => Presence::all()
        ]);
    }

    public function calendarStore(Request $request)
    {
        $date = Carbon::now();
        $memberId = $request->input('member_id');
        $presenceDate = $date->format('d-m-Y');
        $presenceTime = $date->format('H:i:s');

        // Cek apakah waktu absen berada di luar rentang waktu antara jam 7 pagi sampai 9 malam
        if ($presenceTime < '07:00:00' || $presenceTime > '21:00:00') {
            return Redirect::route('presence')->with('error', 'Presence is only allowed between 7am and 9pm');
        }

        // Cek apakah member_id sudah ada pada rentang waktu antara jam 7 pagi sampai 9 malam
        $existingPresence = Presence::where('member_id', $memberId)
            ->whereBetween('presence_date_created', [
                $presenceDate . ' 07:00:00',
                $presenceDate . ' 21:00:00'
            ])
            ->first();

        if ($existingPresence) {
            // Member_id sudah ada pada rentang waktu antara jam 7 pagi sampai 9 malam, kembalikan error
            return Redirect::route('presence')->with('messages', 'Member already has presence between 7am and 9pm');
        }

        // Tambahkan entri baru pada tabel Presence
        $post = $request->all();
        $post['presence_date_created'] = $date->format('d-m-Y H:i:s');
        Presence::create($post);

        return Redirect::route('presence')->with('message', 'Presence successfully added');
    }
}