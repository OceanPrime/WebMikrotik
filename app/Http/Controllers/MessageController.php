<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\MessageSent;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.messages.index', compact('messages'));
    }

    public function create()
    {
        return view('admin.messages.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_pesan' => 'required|string|max:255',
            'pesan' => 'required|string|max:255',
        ]);

        // Menyimpan data ke database
        Message::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('message.index')->with('success', 'Pesan berhasil dibuat.');
    }


    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.messages.edit', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_pesan' => 'required|string|max:255',
            'pesan' => 'required|string|max:255',
        ]);

        $message = Message::findOrFail($id);
        $message->update($request->all());

        return redirect()->route('message.index')->with('success', 'Pesan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('message.index')->with('success', 'Pesan berhasil dihapus.');
    }

    public function send($id)
    {
        $message = Message::findOrFail($id);
        $message->update(['is_sent' => true]);

        return redirect()->route('message.index')->with('success', 'Pesan berhasil dikirim.');
    }

    public function sendMessageToUser(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->update(['is_sent' => true]);

        // Mengirimkan event
        event(new MessageSent($message));

        // Pesan sukses untuk SweetAlert di frontend
        session()->flash('success', 'Pesan berhasil dikirim');
        return back();
    }

    public function apiIndex()
    {
        return response()->json(Message::all());
    }

    public function apiStore(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_pesan' => 'required|string|max:255',
            'pesan' => 'required|string|max:255',
        ]);

        // Menyimpan data ke database
        $message = Message::create($request->all());

        // Kirim event untuk Pusher
        event(new MessageSent($message));

        return response()->json($message, 201);
    }

}
