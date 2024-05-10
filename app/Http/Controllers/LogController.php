<?php

namespace App\Http\Controllers;

use App\Models\log;
use App\Http\Requests\StorelogRequest;
use App\Http\Requests\UpdatelogRequest;
use Validator;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = log::with('Device')->get();
        return response()->json(
            [
                "message" => "Fetch Log Data Success",
                "data" => $data
            ],
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelogRequest $request)
    {
        $rule = [
            'device_id' => 'required|max:4',
            'current_value'=>'required|max:4'
        ];
        $message = [
            'device_id.required' => 'nilai device_id required',
            'device_id.max' => 'maksimal cuma 4 digit',
            'current_value.required'=>'silahkan isi current value nya',
            'current_value.max'=>'melebihi batas maksimal 4 digit'
        ];
        $validator = Validator::make($request->all(), $rule, $message);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(["messages" => $messages], 500);
        }
        $value = $request->device_id;
        $log = log::create(["device_id" => $value, 'current_value'=>$request->current_value]);

        return response()->json(
            [
                "message" => "Log successfully created",
                "data" => $log
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = log::where('id', '=', $id)->get();
        return response()->json(
            [
                "message" => "Fetch Log Data by id Success",
                "data" => $data
            ],
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelogRequest $request, string $id)
    {
        $rule = [
            'device_id' => 'required|max:4',
            'current_value'=>'required|max:4'
        ];
        $message = [
            'device_id.required' => 'nilai device_id required',
            'device_id.max' => 'maksimal cuma 4 digit',
            'current_value.required'=>'silahkan isi current value nya',
            'current_value.max'=>'melebihi batas maksimal 4 digit'
        ];
        $validator = Validator::make($request->all(), $rule, $message);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(["messages" => $messages], 500);
        }
        $data = log::find($id)->update(["device_id" => $request->device_id, 'current_value'=>$request->current_value]);
        return response()->json(
            [
                "message" => "device successfully updated"
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = log::destroy($id);
        return response()->json(
            [
                "message" => "Log Successfully deleted"
            ],
            200
        );
    }
}
