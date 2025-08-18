<?php
namespace App\Http\Controllers;

use App\Models\FundingStage;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DiscoverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only('sector_id', 'funding_stage_id', 'location');

        $users = User::query()
            ->whereHas('profile') // Apenas usuários com perfil criado
            ->with(['profile.sector', 'profile.fundingStage'])
            ->when($request->filled('sector_id'), function ($query) use ($request) {
                $query->whereHas('profile', function ($q) use ($request) {
                    $q->where('sector_id', $request->sector_id);
                });
            })
            ->when($request->filled('funding_stage_id'), function ($query) use ($request) {
                $query->whereHas('profile', function ($q) use ($request) {
                    $q->where('funding_stage_id', $request->funding_stage_id);
                });
            })
            ->when($request->filled('location'), function ($query) use ($request) {
                $location = $request->location;
                $query->whereHas('profile', function ($q) use ($location) {
                    $q->where('city', 'like', "%{$location}%")
                        ->orWhere('state', 'like', "%{$location}%")
                        ->orWhere('country', 'like', "%{$location}%");
                });
            })
            ->paginate(12)
            ->withQueryString();

        return Inertia::render('Discover/Index', [
            'users'         => $users,
            'sectors'       => Sector::query()->select('id', 'name')->get(),
            'fundingStages' => FundingStage::query()->select('id', 'name')->get(),
            'filters'       => $filters,
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
