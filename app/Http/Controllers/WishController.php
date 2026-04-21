<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function index()
    {
        $wish = Wish::latest()->first();
        return view('about', compact('wish'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'nullable|string|max:100',
            'hobby'           => 'nullable|string|max:200',
            'favorite_food'   => 'nullable|string|max:100',
            'favorite_color'  => 'nullable|string|max:100',
            'favorite_place'  => 'nullable|string|max:100',
            'favorite_friend' => 'nullable|string|max:100',
            'favorite_partner'=> 'nullable|string|max:100',
            'favorite_book'   => 'nullable|string|max:100',
            'message'         => 'nullable|string',
        ]);

        // Ambil record yang sudah ada (berdasarkan IP atau record pertama)
        $existing = Wish::where('ip_address', $request->ip())->first()
                    ?? Wish::latest()->first();

        $fields = [
            'name', 'hobby', 'favorite_food', 'favorite_color',
            'favorite_place', 'favorite_friend', 'favorite_partner',
            'favorite_book', 'message',
        ];

        if ($existing) {
            // Update hanya field yang tidak kosong
            $updates = [];
            foreach ($fields as $field) {
                if ($request->filled($field)) {
                    $updates[$field] = $request->$field;
                }
            }
            if (!empty($updates)) {
                $updates['ip_address'] = $request->ip();
                $existing->update($updates);
            }
        } else {
            // Buat baru
            $data = ['ip_address' => $request->ip()];
            foreach ($fields as $field) {
                $data[$field] = $request->filled($field) ? $request->$field : null;
            }
            Wish::create($data);
        }

        return redirect()->route('about')->with('success', 'Tersimpan! ✨');
    }
}