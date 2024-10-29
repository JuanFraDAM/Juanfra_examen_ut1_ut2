<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class editmessage_controller extends Controller
{
    public function showMessage(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        return view("message", compact("message"));
    }
    public function editMessage(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $datosValidados = $request->validate([
            "text" => ["required"],
            "sub" => ["boolean"],
            "black" => ["boolean"]
        ], [
            "sub.boolean" => "Solo se amiten valores tipo 1 y 0",
            "black.boolean" => "Solo se admiten valores 0 y 1",
            "text.required" => "Se requiere contenido en el mensaje"
        ]);

        if (isset($datosValidados["sub"]) && isset($datosValidados["black"])) {
            $message->update($datosValidados);
        } elseif (isset($datosValidados["sub"])) {
            $data = [
                "text" => $datosValidados["text"],
                "sub" => $datosValidados["sub"],
                "black" => 0
            ];
            $message->update($data);
        } elseif (isset($datosValidados["black"])) {
            $data = [
                "text" => $datosValidados["text"],
                "black" => $datosValidados["black"],
                "sub" => 0
            ];
            $message->update($data);
        } else {
            $data = [
                "text" => $datosValidados["text"],
                "black" => 0,
                "sub" => 0
            ];
            $message->update($data);
        }
        $messages = Message::all();
        return view('messages', ['messages' => $messages]);
    }
}
