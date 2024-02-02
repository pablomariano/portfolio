<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');

    //  -- SELECT --
    //  $users = DB::select("select * from users");
    //  dd($users);
    // $user = DB::table('users')->where('id', 1)->first();
    // $user = DB::table('users')->find(1);
    
    // $users = DB::table('users')->where('id', $user->id)->first();
    // dd($users);

    // $users = User::where('id', 1)->first();
    // dd($users);
    // -- Eloquent --
    // $user = User::where('id', 6)->first();
    // dd($user);

    //  -- INSERT --
    // create new user
    // $user = DB::insert('insert into users(name, email, password) values (?,?,?)',[
    //     'Andres',
    //     'pabloandresmariano8@gmail.com',
    //     'clave',
    // ]);
    // $user = User::create([
    //     'name'=> 'Wacolco',
    //     'email'=> 'wacoldo@massmail.com',
    //     'password'=> 'elpass',
    // ]);
    // dd($users);
    
    //  -- UPDATE --
    // $user = DB::update("update users set email='pablo@lol.com' where id=5");
    //     $user = DB::update("update users set email=? where id=?",[
    //         'loli@lolsi.com',
    //         5,
    //     ]);
    //  dd($user);
    // -- Query builder --
    // $user = DB::table('users')->where('id', 5)->update(['email' => 'pablo@lolo.com']);
    // dd($user);
    // -- Eloquent --
    // $user = User::where('id', 6)->update([
    //     'email' => 'chango@chan.com',
    // ]);
    // $user = User::find([1 , 8]);
    // dd($user);



    // -- DELETE --
    // $user = DB::delete("delete from users where id=3");
    // $user = DB::table('users')->where('id', 5)->delete();
    // dd($user);
    // -- Eloquent --
    // $user = User::find(6)->delete();
    // $users = User::find(8)->delete();
    // $users = DB::select("select * from users");
    // dd($users);



        

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
