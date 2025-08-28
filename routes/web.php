<?php

use App\Livewire\Homepage;
use App\Livewire\Pomodoro\Counter;
use App\Livewire\Pomodoro\TaskButton;
use App\Livewire\PomodoroPage;
use App\Livewire\QuickEditTask;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Task\TasksList;
use App\Livewire\TrackerPage;
use Illuminate\Support\Facades\Route;

Route::get('/counter', Counter::class);
Route::get('/button', TaskButton::class);
Route::get('/tracker', TrackerPage::class);
Route::get('/tasks', TasksList::class);
Route::get('/edit', QuickEditTask::class);

Route::get('/pomodoro', PomodoroPage::class)->name('pomodoro.timer');
Route::get('/homepage', Homepage::class);

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
});

require __DIR__.'/auth.php';
