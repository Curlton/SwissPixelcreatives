<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\User\Dashboard;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\Auth\Login as AdminLogin;
use App\Livewire\Admin\AddDataset; // 1. Import the new component
use App\Livewire\Admin\Withdraw\AllWithdraw;
use App\Livewire\Admin\Withdraw\PendingWithdraw;
use App\Livewire\Admin\Withdraw\ApprovedWithdraw;
use App\Livewire\Admin\Withdraw\CanceledWithdraw;
use App\Livewire\Admin\Deposit\AllDeposit;
use App\Livewire\Admin\Deposit\PendingDeposit;
use App\Livewire\Admin\Deposit\ApprovedDeposit;
use App\Livewire\Admin\Deposit\CanceledDeposit;
use App\Livewire\Admin\Payment\AddMethod; // <--- ADD THIS LINE
use App\Livewire\Admin\Payment\ManageMethods;
use Illuminate\Support\Facades\Session;
use App\Livewire\User\Profile;
use App\Livewire\User\Topup\Recharge; 
use App\Livewire\User\Topup\Payment;
use App\Livewire\User\Topup\Confirm;
use App\Livewire\User\Withdraw\Methods;
use App\Livewire\User\Withdraw\UsdtWithdraw;
use App\Livewire\User\DriveDataset;
use App\Http\Controllers\Admin\AuthController;
use App\Livewire\Admin\Users\UserDatasetManager;
use App\Livewire\Admin\Users\CustomDatasetPicker;
use App\Livewire\User\Events;
use App\Livewire\Admin\Users\ActiveUsers;
use App\Livewire\Admin\Users\BlockedUsers;
use App\Livewire\User\ServiceContact;
use App\Livewire\TermsAndConditions;
use App\Livewire\Faqs;
use App\Livewire\About;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', Home::class)->name('home');
Route::get('/terms', TermsAndConditions::class)->name('terms');
Route::get('/faqs', Faqs::class)->name('faqs');
Route::get('/about-us', About::class)->name('about');
Route::view('/services', 'livewire.services-grid')->name('services-grid');
Route::view('/projects', 'livewire.projects')->name('projects');
Route::view('/contact-us', 'livewire.contact')->name('contact');


Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'es', 'fr', 'ar', 'de', 'zh', 'it', 'ru'])) {
        Session::put('locale', $locale);
        session()->save();
    }
    return redirect()->back();
})->name('lang.switch');

// Helper redirect for the /admin URL
//Route::get('/admin', function () {
    //return redirect()->route('admin.login');
//});

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

// Standard User Guest Routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

// Admin Guest Route
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/admin/login', AdminLogin::class)->name('admin.login');
});

/*
|--------------------------------------------------------------------------
| User Routes (Guard: web)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/drive-dataset', DriveDataset::class)->name('user.drive');
    Route::get('/topup/recharge', Recharge::class)->name('user.recharge');
    Route::get('/topup/payment/{method}', Payment::class)
    ->name('user.topup.payment')
    ->where('method', '[A-Za-z0-9\s-]+');
    Route::get('/topup/confirm/{method}/{amount}', Confirm::class)->name('user.topup.confirm');

    // Withdraw Routes
    Route::get('/withdraw/methods', Methods::class)->name('user.withdraw.methods');
    Route::get('/withdraw/usdt', UsdtWithdraw::class)->name('user.withdraw.usdt');
    Route::get('/events', Events::class)->name('user.events');
    Route::get('/service', ServiceContact::class)->name('user.service');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Guard: admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    // Ensure this is inside your admin middleware group
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    // 2. Add the Add Dataset route here
    Route::get('/admin/datasets/add', AddDataset::class)->name('admin.datasets.add');

    //All withdraw requests 
    Route::get('/admin/withdraw/all', AllWithdraw::class)->name('admin.withdraw.all');
    //Pending withdraw requests
    Route::get('/admin/withdraw/pending', PendingWithdraw::class)->name('admin.withdraw.pending');
    Route::get('/admin/withdraw/approved', ApprovedWithdraw::class)->name('admin.withdraw.approved');
    Route::get('/admin/withdraw/canceled', CanceledWithdraw::class)->name('admin.withdraw.canceled');

    // Deposit Routes
    Route::get('/admin/deposit/all', AllDeposit::class)->name('admin.deposit.all');
    Route::get('/admin/deposit/pending', PendingDeposit::class)->name('admin.deposit.pending');
    Route::get('/admin/deposit/approved', ApprovedDeposit::class)->name('admin.deposit.approved');
    Route::get('/admin/deposit/canceled', CanceledDeposit::class)->name('admin.deposit.canceled');

    Route::get('/admin/users/all', \App\Livewire\Admin\Users\AllUsers::class)->name('admin.users.all');
    Route::get('/admin/users/edit/{user}', \App\Livewire\Admin\Users\EditUser::class)
        ->name('admin.users.edit');
    Route::get('/admin/users/active', ActiveUsers::class)->name('admin.users.active');
    Route::get('/admin/users/blocked', BlockedUsers::class)->name('admin.users.blocked');
    

    // Payment Method Routes
    Route::get('/admin/payment/add', AddMethod::class)->name('admin.payment.add');
    Route::get('/admin/payment/manage', ManageMethods::class)->name('admin.payment.manage');
    // User Dataset Manager Route
    Route::get('/admin/users/{user}/dataset', UserDatasetManager::class)
    ->name('admin.users.dataset')
    ->middleware(['auth:admin']);
    Route::get('/admin/users/{user}/dataset/create', CustomDatasetPicker::class)
    ->name('admin.users.dataset.create');
});
