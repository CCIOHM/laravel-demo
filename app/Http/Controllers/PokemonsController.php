<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonsController extends Controller
{
    public function index(Request $request)
    {
        /*
         * Exemple return json with users and theirs pokemons
         */

//        return response()->json([
//            'users' => User::with('pokemons:id,user_id,label')
//                ->get(['id', 'email']),
//        ]);


          /*
           * Eager Loading Example
           */

//        // X SQL request
//        $users = User::all(); // 1 SQL request
//        $users->get(0)->pokemons; // +1 SQL request
//        $users->get(1)->pokemons; // +1 SQL request
//        $users->get(2)->pokemons; // +1 SQL request
//        // 2 SQL request
//        $users = User::with(['pokemons'])->get(); // 2 SQL request
//        $users->get(0)->pokemons; // 0 SQL request
//        $users->get(1)->pokemons; // 0 SQL request
//        $users->get(2)->pokemons; // 0 SQL request


        /*
         * Query Builder Example
         */

//        $min_price = $request->min_price ?? 0;
//        $poks = Pokemon::where(function ($query) use ($min_price) {
//            $query->where(function ($query) use ($min_price) {
//                $query->where('price_ht', '>', $min_price)
//                    ->where('quantity', '>', 0);
//            })
//                ->orWhere('buying_price', '>', 10);
//        })
//            ->whereIn('user_id', [1, 2, 3])
//            ->orderBy('quantity', 'desc')
//            ->groupBy('label')
//            ->having('quantity', '>', 10)
//            ->take(10)
//            ->get(['label', 'price_ht', 'quantity']);


        $query = Pokemon::query();
        $searchTexts = $request->searchText;
        if ($searchTexts) {
            $searchTexts = explode(' ', $searchTexts);
            foreach ($searchTexts as $searchText) {
                if ($searchText) {
                    $query->where(function ($query) use ($searchText) {
                        foreach (['label', 'provider_name', 'provider_name'] as $col) {
                            $query->orWhere(
                                $col, 'like', '%'.$searchText.'%'
                            );
                        }
                    });
                }
            }
        }
        if (null !== $request->quantity) {
            $query->where('quantity', '>', $request->quantity);
        }

        return view('pokemons.index', [
            'pokemons' => $query->paginate(15),
        ]);
    }

    public function create()
    {
        return view('pokemons.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'label' =>          'required|min:10|max:128|regex:/[a-zA-Z0-9\s]+/',
            'provider_name' =>  'required|min:2|max:60',
            'price_ht' =>       'required|numeric|gt:0',
            'quantity' =>       'required|integer|gte:0',
            'provider_email' => 'nullable|email|max:128',
            'buying_price' =>   'nullable|numeric|gt:0',
            'picture' =>        'nullable|sometimes|image|mimes:jpg,jpeg,png|max:'.(5*1024),
            'description' =>    'nullable',
        ]);

        $pokemon = new Pokemon();
        $pokemon->user_id = 1;
        $pokemon->label = $inputs['label'];
        $pokemon->provider_name = $inputs['provider_name'];
        $pokemon->provider_email = $inputs['provider_email'] ?? null;
        $pokemon->price_ht = $inputs['price_ht'];
        $pokemon->buying_price = $inputs['buying_price'] ?? null;
        $pokemon->quantity = $inputs['quantity'];
        $pokemon->description = $inputs['description'] ?? null;

        $picture = $request->file('picture');
        if ($picture and $picture->isValid()) {
            $pictureName = \Str::random(32).'.'.$picture->getClientOriginalExtension();
            $picturePath = 'pokemons/'.$pictureName;
            Storage::putFileAs('pokemons', $picture->getPathname(), $picturePath);
            $pokemon->picture_path = $picturePath;
        }

        try {
            $pokemon->save();
        } catch (\Exception $e) {
            report($e);
            return back()->withErrors('An error occurred while saving the pokemon');
        }

        return back();
    }

    public function show(int $id)
    {
        return view('pokemons.show', [
            'pokemon' => Pokemon::find($id)
        ]);
    }

    public function edit(int $id)
    {
        return view('pokemons.edit', [
            'pokemon' => Pokemon::find($id),
        ]);
    }

    public function update(Request $request, int $id)
    {
        dd('Coming soon');
        return back();
    }

    public function delete(int $id)
    {
        Pokemon::destroy($id);

        return back()->with('message', trans('Pokemon deleted'));
    }
}
