<?php

namespace App\Http\Controllers;

use App\Models\PersonalTrainer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PersonalTrainerController extends Controller
{
    public function index()
    {
        $personalTrainer = PersonalTrainer::all();
        return Inertia::render('AdminApp/PersonalTrainer', [
            'personalTrainers' => $personalTrainer
        ]);
    }

    public function personalTrainerStore(Request $request)
    {
        $request->validate([
            'personal_trainer_session' => 'required',
            'personal_trainer_price' => 'required',
            'personal_trainer_duration' => 'required',
        ], [
            'personal_trainer_session.required' => 'Personal trainer name field is required.',
            'personal_trainer_price.required' => 'Personal trainer price field is required.',
            'personal_trainer_duration.required' => 'Personal trainer duration field is required.',
        ]);

        $date = Carbon::now();

        $post = $request->all();
        $post['personal_trainer_date_created'] = $date->format('d-m-Y H:i:s');
        $post['personal_trainer_updated'] = null;
        PersonalTrainer::create($post);

        return Redirect::route('personal-trainer')->with('message', 'Personal trainer successfully added');
    }

    public function personalTrainerShow($personal_trainer_id)
    {
        $persontalTrianers = PersonalTrainer::find($personal_trainer_id);
        return Inertia::render('AdminApp/PersonalTrainerEdit', [
            'personalTrainers' => $persontalTrianers
        ]);
    }

    public function personalTrainerUpdate(Request $request, string $personal_trainer_id)
    {
        $personalTrainerId = $request->personal_trainer_id;
        $request->validate([
            'personal_trainer_session' => 'required',
            'personal_trainer_price' => 'required',
            'personal_trainer_duration' => 'required',
        ], [
            'personal_trainer_session.required' => 'Personal trainer session field is required.',
            'personal_trainer_price.required' => 'Personal trainer price field is required.',
            'personal_trainer_duration.required' => 'Personal trainer duration field is required.',
        ]);

        $date = Carbon::now();

        PersonalTrainer::where('personal_trainer_id', $personal_trainer_id)
            ->update([
                'personal_trainer_session' => $request->personal_trainer_session,
                'personal_trainer_price' => $request->personal_trainer_price,
                'personal_trainer_duration' => $request->personal_trainer_duration,
                'personal_trainer_updated' => $date->format('d-m-Y H:i:s')
            ]);

        return Redirect::route('personal-trainer')->with('message', 'Personal trainer successfully updated');
    }

    public function personalTrainerDelete(string $personal_trainer_id)
    {
        PersonalTrainer::where('personal_trainer_id', $personal_trainer_id)->delete();

        return redirect()->route('personal-trainer')->with('message', 'Membership successfully deleted');
    }
}
