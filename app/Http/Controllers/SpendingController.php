<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SpendingController extends Controller
{
    public function index()
    {
        $spending = Spending::all();
        return Inertia::render('AdminApp/Spending', [
            'spendings' => $spending,
        ]);
    }

    public function spendingStore(Request $request)
    {
        $request->validate([
            'spending_name' => 'required',
            'spending_total' => 'required',
            'spending_description' => 'required',
        ]);

        $date = Carbon::now();

        // tabel user
        $post = $request->all();
        $post['spending_date_created'] = $date->format('d-m-Y H:i:s');
        $post['spending_updated'] = null;
        Spending::create($post);

        return Redirect::route('spending')->with('message', 'Spending successfully added');
    }

    public function spendingShow($spending_id)
    {
        $spendings = Spending::find($spending_id);
        return Inertia::render('AdminApp/SpendingEdit', [
            'spendings' => $spendings
        ]);
    }

    public function spendingUpdate(Request $request, string $spending_id)
    {
        $spendingId = $request->spending_id;
        $request->validate([
            'spending_name' => 'required|unique:spending,spending_name,' . $spendingId . ',spending_id',
            'spending_total' => 'required',
            'spending_description' => 'required',
        ]);

        $date = Carbon::now();

        Spending::where('spending_id', $spending_id)
            ->update([
                'spending_name' => $request->spending_name,
                'spending_total' => $request->spending_total,
                'spending_updated' => $date->format('d-m-Y H:i:s')
            ]);

        return Redirect::route('spending')->with('message', 'Spending successfully updated');
    }

    public function spendingDelete(string $spending_id)
    {
        Spending::where('spending_id', $spending_id)->delete();

        return redirect()->route('spending')->with('message', 'Spending successfully deleted');
    }
}
