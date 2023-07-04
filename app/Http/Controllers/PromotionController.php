<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PromotionController extends Controller
{
    public function index()
    {
        $promotion = Promotion::all();
        return Inertia::render('AdminApp/Promotion', [
            'promotions' => $promotion,
        ]);
    }

    public function promotionStore(Request $request)
    {
        $request->validate([
            'promotion_name' => 'required|unique:promotion',
            'promotion_code' => 'required',
            'promotion_code' => 'unique:promotion',
        ], [
            'promotion_name.required' => 'Promotion name field is required.',
            'promotion_name.unique' => 'Promotion name has already been taken.',
            'promotion_code.required' => 'Promotion code field is required.',
            'promotion_code.unique' => 'Promotion code has already been taken.',
        ]);

        $date = Carbon::now();

        $post = $request->all();
        $post['promotion_date_created'] = $date->format('d-m-Y H:i:s');
        $post['promotion_updated'] = null;
        Promotion::create($post);

        return Redirect::route('promotion')->with('message', 'Promotion successfully added');
    }

    public function promotionShow($promotion_id)
    {
        $promotions = Promotion::find($promotion_id);
        return Inertia::render('AdminApp/PromotionEdit', [
            'promotions' => $promotions
        ]);
    }

    public function promotionUpdate(Request $request, string $promotion_id)
    {
        $promotionId = $request->promotion_id;
        $request->validate([
            'promotion_name' => 'required|unique:promotion,promotion_name,' . $promotionId . ',promotion_id',
            'promotion_discount' => 'required',
            'promotion_code' => 'required|unique:promotion,promotion_code,' . $promotionId . ',promotion_id',
        ], [
            'promotion_name.required' => 'Promotion name field is required.',
            'promotion_name.unique' => 'Promotion name has already been taken.',
            'promotion_discount.required' => 'Promotion price field is required.',
            'promotion_code.required' => 'Promotion code field is required.',
            'promotion_code.unique' => 'Promotion code has already been taken.',
        ]);

        $date = Carbon::now();

        Promotion::where('promotion_id', $promotion_id)
            ->update([
                'promotion_name' => $request->promotion_name,
                'promotion_discount' => $request->promotion_discount,
                'promotion_code' => $request->promotion_code,
                'promotion_updated' => $date->format('d-m-Y H:i:s')
            ]);

        return Redirect::route('promotion')->with('message', 'Promotion successfully updated');
    }

    public function promotionDelete(string $promotion_id)
    {
        Promotion::where('promotion_id', $promotion_id)->delete();

        return redirect()->route('promotion')->with('message', 'Promotion successfully deleted');
    }
}
