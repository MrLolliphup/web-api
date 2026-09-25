<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Models\User;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
            $service = Service::all();
            return response()->json($service);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
                $service = Service::create([
                        ...$request->validated(),
                        'user_id' => $request->user()->id,
                ]);

        return response()->json($service, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
        return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
            $service->update($request->validated());

        return response()->json($service->fresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
         $service->delete();

        return response()->json([
            'message' => 'Service deleted successfully',
        ], 204);
    }



    public function getUserServices($userId)
    {
        $services = Service::where('user_id', $userId)->get();
        
        return response()->json($services);
    }
    public function getUserService (User $user, Service $service){
        abort_unless($service->user_id === $user->id, 404);

        return response()->json($service, 200);

    }
}
