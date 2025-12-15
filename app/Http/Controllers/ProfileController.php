<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id = null)
    {
        if (!$id) {
            $id = optional(User::first())->id ?? 1;
        }
        
        $user = User::find($id);
        
        if (!$user) {
            $user = (object) [
                'id' => $id,
                'name' => 'Usuario Demo',
                'email' => 'demo@inventario.com',
                'created_at' => now(),
            ];
        }
        
        return view('profile.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);
        
        $user->update($request->only(['name', 'email']));
        
        return redirect()->route('profile.show', $user->id)
            ->with('success', 'Perfil actualizado correctamente.');
    }

    public function dashboard()
    {
        $categoriesCount = Category::count();
        $productsCount = Product::count();
        
        return view('dashboard', compact('categoriesCount', 'productsCount'));
    }
}