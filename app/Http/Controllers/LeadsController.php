<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use DefStudio\Telegraph\Models\TelegraphChat;
use App\Mail\LeadEmail;
use Illuminate\Support\Facades\Mail;
class LeadsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        $data = $request->all();
        $lead = Lead::create($data);

        // $chat = TelegraphChat::where('chat_id', '509944784')->first();
        // $chat->message("Имя: {$lead->name}\nТелефон: {$lead->phone}\nПочта: {$lead->email}\nСообщение: {$lead->message}")->send();
        Mail::to('kashilya@yandex.ru')->send(new LeadEmail($lead->name, $lead->phone, $lead->message));
        
        return [];
    }
}
