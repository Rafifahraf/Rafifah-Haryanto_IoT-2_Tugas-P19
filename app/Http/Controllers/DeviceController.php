<?php

namespace App\Http\Controllers;

use App\Models\device;
use App\Http\Requests\StoredeviceRequest;
use App\Http\Requests\UpdatedeviceRequest;
use Validator;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = device::all();
        return response()->json(
            [
                "message" => "Fetch Device Data Success",
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
    public function store(StoredeviceRequest $request)
    {
        $rule = [
            'device_name' => 'required|max:200',
            'min_value'=>'required|max:4',
            'max_value'=>'required|max:4|gt:min_value'
        ];
        $message = [
            'device_name.required' => 'nilai device_name required',
            'device_name.max' => 'maksimal cuma 200 digit',
            'min_value.required'=>'silahkan isi min value nya',
            'min_value.max'=>'melebihi batas maksimal 4 digit',
            'max_value.required'=>'silahkan isi max value nya',
            'max_value.max'=>'melebihi batas maksimal 4 digit',
            'max_value.gt'=>'nilai min tidak melebihi nilai max'
        ];
        $validator = Validator::make($request->all(), $rule, $message);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(["messages" => $messages], 500);
        }
        $value = $request->device_name;
        $device = device::create([
            "device_name" => $value,
            'min_value'=>$request->min_value,
            'max_value' =>$request->max_value
    ]);

        return response()->json(
            [
                "message" => "device successfully created",
                "data" => $device
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = device::where('id', '=', $id)->get();
        return response()->json(
            [
                "message" => "Fetch device Data by id Success",
                "data" => $data
            ],
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedeviceRequest $request, string $id)
    {
        $rule = [
            'device_name' => 'required|max:200',
            'min_value'=>'required|max:4',
            'max_value'=>'required|max:4|gt:min_value'

        ];
        $message = [
            'device_name.required' => 'nilai device_name required',
            'device_name.max' => 'maksimal cuma 200 digit',
            'min_value.required'=>'silahkan isi min value nya',
            'min_value.max'=>'melebihi batas maksimal 4 digit',
            'max_value.required'=>'silahkan isi max value nya',
            'max_value.max'=>'melebihi batas maksimal 4 digit',
            'max_value.gt'=>'nilai min tidak melebihi nilai max'
        ];
        $validator = Validator::make($request->all(), $rule, $message);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(["messages" => $messages], 500);
        }
        $data = device::find($id)->update([
            "device_name" => $request->device_name,
            'min_value'=>$request->min_value,
            'max_value' =>$request->max_value
        ]);
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
        $data = device::destroy($id);
        return response()->json(
            [
                "message" => "device Successfully deleted"
            ],
            200
        );
    }
}
