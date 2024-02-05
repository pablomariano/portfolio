<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use PharIo\Manifest\Email;

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
    return view('welcome');

    // ========================================
    //    Select
    // ========================================
    // $users = DB::select("select * from users"); //DB FACADE
    // dd($users);
    // $user = DB::table('users')->where('id', 1)->first(); //QUERY BUILDER
    // $user = DB::table('users')->find(1);
    // $users = DB::table('users')->get();
    // $users = DB::table('users')->where('id', $user->id)->first();
    // dd($users);
    // $users = User::where('id', 1)->first(); //ELOQUENT
    // dd($users);
    // -- Eloquent --
    // $user = User::where('id', 6)->first();
    // #user = User::find(6);
    // dd($user);

    // ========================================
    //  Insert
    // ========================================
    // **** DB Facade ****
    // $user = DB::insert('insert into users(name, email, password) values (?,?,?)',[
    //     'Pablo',
    //     'pablo@correo.com',
    //     'clavess',
    // ]);
    // // *** Query Builder ***
    // $user = DB::table('users')->insert([
    //     'name'=> 'Andrés',
    //     'email'=> 'andres@correo.com',
    //     'password'=> 'clavex',
    // ]);
    // // *** Eloquent ***
    // $user = User::create([
    //     'name'=> 'Mariano',
    //     'email'=> 'Mariano4@correo.com',
    //     'password'=> 'pawword',
    // ]);
    // $user = User::find(6);
    // dd($user->name);
    
    // ========================================
    //    Update
    // ========================================
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

    // ========================================
    //    Delete
    // ========================================
    // $user = DB::delete("delete from users where id=3");    
    // $user = DB::table('users')->where('id', 5)->delete();
    // -- Eloquent --
    // $user = User::find(6)->delete();
    // $users = User::find(8)->delete();
    // $user = User::truncate();
    // dd($user);


    




        

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
