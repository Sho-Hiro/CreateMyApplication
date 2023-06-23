<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    public function record_money(Record $record)
    {
        return view('myApplication/record_money')->with(['records' => $record->get()]);  
    }
}
