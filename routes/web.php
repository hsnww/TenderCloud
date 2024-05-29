<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\TendersController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\CompaniesController as AdminCompaniesController;
use App\Http\Controllers\Admin\VendorsController as AdminVendorsController;
use App\Http\Controllers\Admin\TendersController as AdminTendersController;

// تسجيل الوسيط كـ Closure-based middleware
Route::aliasMiddleware('role', RoleMiddleware::class);

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/alltenders', [HomePageController::class, 'tenders'])->name('alltenders.index');
Route::get('alltenders/{tender}/show', [HomePageController::class, 'show'])->name('alltenders.show');


// مسار الإداريين
Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

// مسار أعضاء الشركات
Route::middleware(['auth', 'role:company_member'])->group(function () {
    Route::get('/companies', [CompaniesController::class, 'index'])->name('companies.index');
    Route::get('/companies/show', [CompaniesController::class, 'show'])->name('companies.show');
    Route::get('/companies/edit', [CompaniesController::class, 'edit'])->name('companies.edit');
    Route::put('/companies', [CompaniesController::class, 'update'])->name('companies.update');

    //myTenders
    Route::get('/tenders', [TendersController::class, 'index'])->name('tenders.index');
    Route::get('/tenders/disabled', [TendersController::class, 'showDisabled'])->name('tenders.disabled');
    Route::get('/tenders/create', [TendersController::class, 'create'])->name('tenders.create');
    Route::post('/tenders', [TendersController::class, 'store'])->name('tenders.store');
    Route::get('/tenders/{tender}/edit', [TendersController::class, 'edit'])->name('tenders.edit');
    Route::put('/tenders/{tender}', [TendersController::class, 'update'])->name('tenders.update');
    Route::post('/tenders/{tender}/request-delete', [TendersController::class, 'requestDelete'])->name('tenders.requestDelete');
    Route::post('/tenders/{tender}/restore', [TendersController::class, 'restore'])->name('tenders.restore');




});

// مسار أعضاء مزودي الخدمات
Route::middleware(['auth', 'role:vendor_member'])->group(function () {
    Route::get('/vendors', [VendorsController::class, 'index'])->name('vendors.index');
    Route::get('/vendors/show', [VendorsController::class, 'show'])->name('vendors.show');
    Route::get('/vendors/edit', [VendorsController::class, 'edit'])->name('vendors.edit');
    Route::put('/vendors', [VendorsController::class, 'update'])->name('vendors.update');

    //myBids
    Route::get('/bid-requests/create/{tender_id}', [HomePageController::class, 'createBidRequest'])->name('bid_requests.create');
    Route::post('/bid-requests', [HomePageController::class, 'storeBidRequest'])->name('bid_requests.store');


});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth', 'role:administrator'])->group(function() {
    Route::get('/users', [AdminUsersController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}/edit', [AdminUsersController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminUsersController::class, 'update'])->name('admin.users.update');
    Route::get('/users/create', [AdminUsersController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [AdminUsersController::class, 'store'])->name('admin.users.store');
    Route::delete('/users/{user}', [AdminUsersController::class, 'destroy'])->name('admin.users.destroy');
    // companies
    Route::get('/companies', [AdminCompaniesController::class, 'index'])->name('admin.companies.index');
    Route::get('/companies/{company}/edit', [AdminCompaniesController::class, 'edit'])->name('admin.companies.edit');
    Route::put('/companies/{company}', [AdminCompaniesController::class, 'update'])->name('admin.companies.update');
    Route::get('/companies/create', [AdminCompaniesController::class, 'create'])->name('admin.companies.create');
    Route::post('/companies', [AdminCompaniesController::class, 'store'])->name('admin.companies.store');
    Route::delete('/companies/{company}', [AdminCompaniesController::class, 'destroy'])->name('admin.companies.destroy');
    // vendors
    Route::get('/vendors', [AdminVendorsController::class, 'index'])->name('admin.vendors.index');
    Route::get('/vendors/{vendor}/edit', [AdminVendorsController::class, 'edit'])->name('admin.vendors.edit');
    Route::put('/vendors/{vendor}', [AdminVendorsController::class, 'update'])->name('admin.vendors.update');
    Route::get('/vendors/create', [AdminVendorsController::class, 'create'])->name('admin.vendors.create');
    Route::post('/vendors', [AdminVendorsController::class, 'store'])->name('admin.vendors.store');
    Route::delete('/vendors/{vendor}', [AdminVendorsController::class, 'destroy'])->name('admin.vendors.destroy');
    // Tenders
    Route::get('/tenders', [AdminTendersController::class, 'index'])->name('admin.tenders.index');
    Route::get('/tenders/create', [AdminTendersController::class, 'create'])->name('admin.tenders.create');
    Route::post('/tenders', [AdminTendersController::class, 'store'])->name('admin.tenders.store');
    Route::get('/tenders/{tender}/edit', [AdminTendersController::class, 'edit'])->name('admin.tenders.edit');
    Route::put('/tenders/{tender}', [AdminTendersController::class, 'update'])->name('admin.tenders.update');
    Route::delete('/tenders/{tender}', [AdminTendersController::class, 'destroy'])->name('admin.tenders.destroy');


});


require __DIR__.'/auth.php';
