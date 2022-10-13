<?php

namespace App\Http\Controllers;

use App\Jobs\SendSmsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SendSmsRequestController extends Controller
{
    public function store (Request $request) {

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:225',
                'body' => 'required',
            ]
        );

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        $validatedData = $validator->validated();

        SendSmsRequest::dispatch($validatedData);
        return response()->json(['message' => 'post has been sent']);
    }
}
