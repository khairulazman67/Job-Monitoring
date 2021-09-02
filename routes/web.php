<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\laborController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [loginController::class, 'index'])->name('login');

//admin
Route::group(['middleware'=>'admin'],function(){
    Route::get('/dasadmin', [adminController::class, 'index'])->name('dasadmin');
    Route::post('/dasadmin', [adminController::class, 'cekindex'])->name('cekdasadmin');
    //view data order
    Route::get('/dataorder', [adminController::class, 'dataOrder']);
    Route::post('/dataorder', [adminController::class, 'cekdataorder'])->name('dataorder');
    Route::get('/cekstok/{id_sector}', [adminController::class, 'cekSTO']);
    //insert Order
    Route::get('/insertorder', [adminController::class, 'formOrder'])->name('forminsertorder');
    Route::POST('/insertorder', [adminController::class, 'insertOrder'])->name('insertorder');
    //update Order
    Route::post('/dataorder/{data}', [adminController::class, 'formUpdateOrder']);
    Route::post('/updateorder', [adminController::class,'updateOrder']);
    // Route::get('/dataorderr', [adminController::class, 'dataOrder']);
    //Delete Order
    Route::delete('/dataorder/{data}', [adminController::class, 'deleteOrder']);

    //Crew

    //View Crew
    Route::get('/datacrew',[adminController::class,'dataCrew']);
    //insert Crew
    Route::get('/forminsert',[adminController::class, 'formInsertCrew']);
    Route::post('/insertcrew',[adminController::class, 'prosInsertCrew']);
    //Update Crew
    Route::post('/formupdatecrew/{data}',[adminController::class, 'formUpdateCrew']);
    Route::post('/updatecrew',[adminController::class, 'prosUpdateCrew']);
    //Delete Crew
    Route::delete('/datacrew/{data}',[adminController::class,'deleteCrew']);

    //Labor

    Route::get('/datalabor',[adminController::class,'dataLabor']);
    Route::get('formLabor', [adminController::class,'formLabor']);
    Route::post('insertLabor', [adminController::class,'insertLabor']);
    Route::post('/formupdateLabor/{data}', [adminController::class,'formupdateLabor']);

    Route::post('/prosupdateLabor', [adminController::class,'prosUpdateLabor']);
    Route::delete('/dataLabor/{data}', [adminController::class,'deleteLabor']);
    Route::delete('/formupdateLabor/{data}', [adminController::class,'formdeleteLabor']);

    Route::get('/formgantipassadmin',function(){
        return view('admin.gantiPass');
    })->name('gantipassadmin');
    Route::post('/gantipassadmin',[adminController::class,'gantiPass']);
});



Auth::routes();

//labor
Route::group(['middleware'=>'labor'],function(){
    Route::get('/daslabor', [laborController::class, 'index'])->name('daslabor');
    Route::post('/updatestatus', [laborController::class, 'updatestatus']);
    Route::get('/formgantipasslabor',function(){
        return view('labor.gantiPass');
    })->name('gantipasslabor');
    Route::post('/gantipasslabor',[adminController::class,'gantiPass']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
