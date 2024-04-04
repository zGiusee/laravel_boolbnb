<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ViewController extends Controller
{
    public function store(Request $request)
    {
        // $views = View::all();
        $data = $request->all();

        $validator = Validator::make($data, [
            'ip' => 'required',
            'date' => 'required',
            'apartment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => false,
                'errors' => $validator->errors()
            ]);
        }

        // foreach ($views as $view) {
        //     if ($data['date'] == $view['date'] && $data['ip'] != $view['ip']) {

        //         $new_view = new View();
        //         $new_view->fill($data);
        //         $new_view->save();

        //     } else if ($data['date'] != $view['date'] && $data['ip'] == $view['ip']) {

        //         $new_view = new View();
        //         $new_view->fill($data);
        //         $new_view->save();

        //     } elseif ($data['date'] != $view['date'] && $data['ip'] != $view['ip']) {

        $new_view = new View();
        $new_view->fill($data);
        $new_view->save();
        //     }
        // }

        return response()->json([
            'succes' => true
        ]);
    }
}
