<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);

                               // Card: Conexões (seguidores) - Simples contagem por enquanto
        $connectionsCount = 0; // Substituir pela lógica de seguidores quando implementada

        // Card: Posts
        $postsCount = $user->posts()->count();

        // Card: Engajamento (Total de curtidas nos posts do usuário)
        $engagementCount = Post::where('user_id', $user->id)
            ->withCount('likes')
            ->get()
            ->sum('likes_count');

                          // Card: Eventos (Participações) - Simples contagem por enquanto
        $eventsCount = 0; // Substituir pela lógica de participação quando implementada

        // Atividade Recente (Últimos 5 posts do usuário)
        $recentActivity = $user->posts()
            ->latest()
            ->take(5)
            ->get();

        return Inertia::render('Dashboard', [
            'stats'                => [
                'connections' => ['value' => $connectionsCount, 'change' => '+0%'], // Lógica de % a ser implementada
                'posts'       => ['value' => $postsCount, 'change' => '+0%'],
                'engagement'  => ['value' => $engagementCount, 'change' => '+0%'],
                'events'      => ['value' => $eventsCount, 'change' => '+0'],
            ],
            'recentActivity'       => $recentActivity,
            'suggestedConnections' => [], // Lógica de sugestões a ser implementada
        ]);

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
    public function store(Request $request)
    {
        //
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
