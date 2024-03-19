<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

Route::get('/', function () {
    // $hash = Hash::make("12345678");

    // dd(Crypt::encrypt('1234'));
    // dd(Crypt::decrypt('eyJpdiI6IjF4MG93ODM0Y25LaE5GZEU3NUY1Qnc9PSIsInZhbHVlIjoieTZaQTdPWmRPSVVsbEdRWENoVzFBUT09IiwibWFjIjoiODRhMmQyZWZjZWEzNTBmYThkZmNlMzkxYjlkZGI2MjEyY2Q4MGYyYzZiZGY0MTkwZWMwZTg5YzZkMTZkNWYxZCIsInRhZyI6IiJ9'));
   
    return view('welcome');
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
//SHOW
// Route::get('/db', function (){
//         $users = DB::select('select * from users');
 
//         foreach($users as $user){
//             echo "$user->id - $user->email<br>";
//         }
// });

//UPDATE
// Route::get('/update', function(){
//     DB::update('update users set name="udaydevnani" where id=2');
// });

//CREATE
// Route::get('/create', function(){
//     DB::unprepared('create table a (col varchar(1) null, col2 int not null);');
// });

//if query takes more than 50ms of time to execute than do this
// Route::get('/when', function(){
    // DB::whenQueryingForLongerThan(50, function () {
        // dd("hello");
    // });
// });

//Transaction
// Route::get('/transaction',function(){
// DB::transaction(function(){
//     DB::unprepared('create table newtable  (col varchar(1))');
//     DB::unprepared('insert into newtable values ("a")');
//     DB::update('update newtable set col="n" where col= "a"');
// });
// });