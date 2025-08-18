<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ConnectionController extends Controller
{
    public function store(User $user)
    {
        Auth::user()->following()->attach($user->id);

        return back()->with('success', 'Agora você está seguindo ' . $user->name);
    }

    public function destroy(User $user)
    {
        Auth::user()->following()->detach($user->id);

        return back()->with('success', 'Você deixou de seguir ' . $user->name);
    }
}
