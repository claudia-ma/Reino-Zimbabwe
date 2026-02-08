<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Testimonio;

class TestimoniosPublicController extends Controller
{
    public function index()
    {
        $testimonios = Testimonio::where('publicado', true)
            ->orderByDesc('created_at')
            ->paginate(9);

        return view('public.testimonios', compact('testimonios'));
    }
}