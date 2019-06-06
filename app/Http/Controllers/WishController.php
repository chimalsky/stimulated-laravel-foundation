<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Wish::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userQuery = $request->query('user');
        $user = $userQuery ? User::findOrFail($userQuery) : null;

        $fulfilledQuery = $request->query('fulfilled');

        $wishes = new Wish;

        if ($user) {
            $wishes = $user->wishes();
        } 

        if ($fulfilledQuery) {
            $wishes = $wishes->fulfilled();
        } else {
            $wishes = $wishes->unfulfilled();
        }

        $wishes = $wishes->latest('created_at')->get();

        return view('wish.index', compact('user', 'wishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wish.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|nullable'
        ]);

        $params = $request->all();
        $params['user_id'] = Auth::id();

        $wish = Wish::create($params);
        return redirect()->route('wish.show', $wish);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function show(Wish $wish)
    {
        return view('wish.show', compact('wish')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function edit(Wish $wish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wish $wish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wish $wish)
    {
        $wish->delete();

        return redirect()->route('wish.index');
    }
}
