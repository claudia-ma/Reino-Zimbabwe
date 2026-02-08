<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Public\CachorrosPublicController;
use App\Http\Controllers\Public\TestimoniosPublicController;
use App\Http\Controllers\Public\ContactoController;

use App\Http\Controllers\Admin\CachorroController;
use App\Http\Controllers\Admin\CamadaController;
use App\Http\Controllers\Admin\TestimonioController;
use App\Http\Controllers\Admin\MensajeController;

/*
|--------------------------------------------------------------------------
| Páginas públicas (cliente)
|--------------------------------------------------------------------------
*/
Route::view('/', 'public.home')->name('home');
Route::view('/etica-y-crianza', 'public.etica')->name('etica');
Route::view('/nuestra-familia', 'public.familia')->name('familia');

Route::get('/cachorros-destacados', [CachorrosPublicController::class, 'index'])
    ->name('cachorros.destacados');

Route::get('/testimonios', [TestimoniosPublicController::class, 'index'])
    ->name('testimonios');

// CONTACTO (GET + POST)
Route::get('/contacto', fn () => view('public.contacto'))->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');


/*
|--------------------------------------------------------------------------
| Zona privada (auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Perfil (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin (protegido)
    Route::prefix('admin')
        ->name('admin.')
        ->middleware(['is_admin'])
        ->group(function () {

            Route::resource('cachorros', CachorroController::class)->names('cachorros');
            Route::resource('camadas', CamadaController::class)->names('camadas');
            Route::resource('testimonios', TestimonioController::class)->names('testimonios');

            // Toggle publicado / oculto
            Route::patch('testimonios/{testimonio}/toggle', [TestimonioController::class, 'toggle'])
                ->name('testimonios.toggle');

            Route::resource('mensajes', MensajeController::class)
                ->only(['index','show','destroy'])
                ->names('mensajes');
        });
});

require __DIR__.'/auth.php';