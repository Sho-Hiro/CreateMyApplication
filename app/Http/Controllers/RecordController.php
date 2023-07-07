<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\User;
use App\Models\PaymentCategory;
use App\Http\Requests\RecordMoneyRequest;

class RecordController extends Controller
{
    public function record_money(Record $record,PaymentCategory $paymentCategory )
    {
        $record->user_id = \Auth::id();
        return view('myApplication/record_money')->with(['records' => $record->get(), 'paymentCategories' => $paymentCategory->get()]);
    }
    public function record_money_store(RecordMoneyRequest $request,Record $record)
    { 
        $record->user_id = \Auth::id();
        $input = $request['record'];
        $post->fill($input)->save();
        // return redirect('/myApplication/record_money/{user}');
        return redirect('/myApplication/record_money');
    }
}
