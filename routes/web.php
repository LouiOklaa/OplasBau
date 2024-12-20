<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GeneralInformationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ServicesSectionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes(['register' => false ,'reset' => false ,'verify' => false ,'confirm' => false]);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', [HomeController::class, 'index']);
    Route::resource('galerie', GalleryController::class);
    Route::resource('dienstleistungen', ServicesController::class);
    Route::resource('kategorien', ServicesSectionsController::class);
    Route::resource('allgemeineinformationen', GeneralInformationController::class);
    Route::get('/alle_nachrichten', [MessagesController::class, 'index'])->name('show_all_messages');
    Route::get('/nachricht/{id}', [MessagesController::class, 'viewMessage'])->name('show_message');
    Route::post('/nachricht/{id}/reply', [MessagesController::class, 'replyMessage'])->name('admin_replyMessage');
    Route::get('/markiere_alles_als_gelesen', [MessagesController::class, 'markAllAsRead'])->name('markAllAsRead');
    Route::get('/rollen/hinzufügen', [RoleController::class, 'create'])->name('add_roles');
    Route::get('/rollen/anzeigen/{id}', [RoleController::class, 'show'])->name('show_roles');
    Route::get('/rollen/bearbeiten/{id}', [RoleController::class, 'edit'])->name('edit_roles');
    Route::resource('rollen',RoleController::class);
    Route::get('/benutzer/bearbeiten/{id}', [UserController::class, 'edit'])->name('edit_user');
    Route::get('/benutzer/profil/{id}', [UserController::class, 'profile'])->name('profile');
    Route::resource('benutzer',UserController::class);
    Route::get('/dokumentation', function () { return view('Documentation.documentation'); });

});

Route::get('/', [ViewController::class, 'index']);

Route::get('/alle_dienstleistungen', [ViewController::class, 'showServices'])->name('all_services');
Route::post('/alle_dienstleistungen/sortieren', [ViewController::class, 'sortAllServices'])->name('sort_all_services');
Route::get('/dienstleistung/{section_name}', [ViewController::class, 'showServices'])->name('show_services');
Route::post('/dienstleistung/sortieren', [ViewController::class, 'sortServices'])->name('sort_services');

Route::get('/alle_projekte', [ViewController::class, 'showProjects'])->name('all_projects');
Route::post('/alle_projekte/sortieren', [ViewController::class, 'sortAllProjects'])->name('sort_all_projects');
Route::get('/projekte/{section_name}', [ViewController::class, 'showProjects'])->name('show_projects');
Route::post('/projekte/sortieren', [ViewController::class, 'sortProjects'])->name('sort_projects');

Route::post('/anfrage/senden', [ContactController::class, 'send'])->name('send_email');
Route::get('/kontakt', function () {$information = \App\Models\GeneralInformation::first(); return view('emails.contact_us' , compact('information')); })->name('contact_us');

Route::get('/über_uns', function () { return view('About.about_us'); })->name('about_us');
Route::get('/datenschutz', function () {$information = \App\Models\GeneralInformation::first(); return view('Datenschutz.datenschutz' , compact('information')); })->name('data_protection');
Route::get('/impressum', function () {$information = \App\Models\GeneralInformation::first(); return view('Imprint.imprint' , compact('information')); })->name('imprint');

Route::get('/{page}', [AdminController::class, 'index']);
