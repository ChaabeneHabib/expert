<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;
use Inertia\Inertia;

class CompetitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $competitions = (new Competition)->newQuery();

        if (request()->has('search')) {
            $competitions->where('name', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $competitions->orderBy($attribute, $sort_order);
        } else {
            $competitions->latest();
        }

        $competitions = $competitions->paginate(5)->onEachSide(2)->appends(request()->query());

        return Inertia::render('Admin/Competitions/Index', [
            'competitions' => $competitions,
            'filters' => request()->all('search')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Competitions/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Competition::create($request->all());

        return redirect()->route('competitions.index')
                        ->with('message', __('Competition created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $competitions = (new Competition)->newQuery()->find($id);
        return Inertia::render('Admin/Competitions/Show', [
            'competitions' => $competitions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $permission
     * @return \Inertia\Response
     */
    public function edit(Competition $competition)
    {
        return Inertia::render('Admin/Competitions/Edit', [
            'competition' => $competition,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();
        return redirect()->route('competitions.index')
                        ->with('message', __('Competition deleted successfully'));
    }
}
