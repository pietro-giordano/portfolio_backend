<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Exception;
use Illuminate\Http\Request;

class MessageController extends Controller
{
      /**
       * Display a listing of the resource.
       */
      public function index()
      {
            //
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
      public function store(StoreMessageRequest $request)
      {
            try {
                  $data = $request->validated();
                  $newMessage = Message::create($data);

                  return response()->json([
                        'success' => true,
                        'code' => 200,
                        'message' => 'Ok',
                        'data' => $newMessage
                  ]);
            } catch (Exception $e) {
                  return response()->json([
                        'success' => false,
                        'code' => $e->getCode(),
                        'message' => $e->getMessage()
                  ]);
            }
      }

      /**
       * Display the specified resource.
       */
      public function show(string $id)
      {
            //
      }

      /**
       * Show the form for editing the specified resource.
       */
      public function edit(string $id)
      {
            //
      }

      /**
       * Update the specified resource in storage.
       */
      public function update(Request $request, string $id)
      {
            //
      }

      /**
       * Remove the specified resource from storage.
       */
      public function destroy(string $id)
      {
            //
      }
}
