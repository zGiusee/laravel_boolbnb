<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'max:50',
            'email' => 'required|max:255',
            'description' => 'required|max:300',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_message = new Message();
        $new_message->fill($data);
        $new_message->save();

        return response()->json([
            'succes' => true
        ]);
    }
}
