<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page with popular products
     */
    public function index(): View
    {
        $popularProducts = Product::orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $productTypes = ['Sieraden', 'Keramiek', 'Textiel', 'Kunst'];
        $materials = ['Alle', 'Zilver', 'Goud', 'Keramiek', 'Textiel', 'Hout'];
        $productionTimes = ['Alle', '1-7 dagen', '7-14 dagen', '14+ dagen'];

        return view('home', [
            'popularProducts' => $popularProducts,
            'productTypes' => $productTypes,
            'materials' => $materials,
            'productionTimes' => $productionTimes,
        ]);
    }
}
