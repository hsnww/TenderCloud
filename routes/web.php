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
Route::get('/tenders', [HomePageController::class, 'tenders'])->name('tenders');
Route::get('tenders/{tender}/show', [HomePageController::class, 'show'])->name('tenders.show');

// مسار أعضاء الشركات
Route::prefix('companies')->middleware(['auth', 'role:company_member'])->name('companies.')->group(function() {
    Route::get('/', [CompaniesController::class, 'index'])->name('index');
    Route::get('/show', [CompaniesController::class, 'show'])->name('show');
    Route::get('/edit', [CompaniesController::class, 'edit'])->name('edit');
    Route::put('/', [CompaniesController::class, 'update'])->name('update');
    Route::get('/tenders', [CompaniesController::class, 'showCompanyTenders'])->name('tenders');

    //myTenders
    Route::get('/tenders/disabled', [TendersController::class, 'showDisabled'])->name('tenders.disabled');
    Route::get('/tenders/create', [TendersController::class, 'create'])->name('tenders.create');
    Route::post('/tenders', [TendersController::class, 'store'])->name('tenders.store');
    Route::get('/tenders/{tender}/edit', [TendersController::class, 'edit'])->name('tenders.edit');
    Route::put('/tenders/{tender}', [TendersController::class, 'update'])->name('tenders.update');
    Route::post('/tenders/{tender}/request-delete', [TendersController::class, 'requestDelete'])->name('tenders.requestDelete');
    Route::post('/tenders/{tender}/restore', [TendersController::class, 'restore'])->name('tenders.restore');

    Route::get('/tenders', [CompaniesController::class, 'showCompanyTenders'])->name('tenders');
    Route::get('/bids', [CompaniesController::class, 'showAllBids'])->name('tenders.bids');
    Route::get('/tenders/{tender}/bid/{bidRequest}', [CompaniesController::class, 'showBidDetails'])->name('tenders.bid.details');

});

// مسار أعضاء مزودي الخدمات
Route::prefix('vendors')->middleware(['auth', 'role:vendor_member'])->name('vendors.')->group(function() {
    Route::get('/', [VendorsController::class, 'index'])->name('index');
    Route::get('/show', [VendorsController::class, 'show'])->name('show');
    Route::get('/edit', [VendorsController::class, 'edit'])->name('edit');
    Route::put('/', [VendorsController::class, 'update'])->name('update');
    Route::get('/{vendor}/tenders', [VendorsController::class, 'showMyTenders'])->name('my_tenders');

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

    Route::prefix('admin')->middleware(['auth', 'role:administrator'])->name('admin.')->group(function() {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [AdminUsersController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [AdminUsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUsersController::class, 'update'])->name('users.update');
    Route::get('/users/create', [AdminUsersController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUsersController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [AdminUsersController::class, 'destroy'])->name('users.destroy');
    // companies
    Route::get('/companies', [AdminCompaniesController::class, 'index'])->name('companies.index');
    Route::get('/companies/{company}/edit', [AdminCompaniesController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{company}', [AdminCompaniesController::class, 'update'])->name('companies.update');
    Route::get('/companies/create', [AdminCompaniesController::class, 'create'])->name('companies.create');
    Route::post('/companies', [AdminCompaniesController::class, 'store'])->name('companies.store');
    Route::delete('/companies/{company}', [AdminCompaniesController::class, 'destroy'])->name('companies.destroy');
    // vendors
    Route::get('/vendors', [AdminVendorsController::class, 'index'])->name('vendors.index');
    Route::get('/vendors/{vendor}/edit', [AdminVendorsController::class, 'edit'])->name('vendors.edit');
    Route::put('/vendors/{vendor}', [AdminVendorsController::class, 'update'])->name('vendors.update');
    Route::get('/vendors/create', [AdminVendorsController::class, 'create'])->name('vendors.create');
    Route::post('/vendors', [AdminVendorsController::class, 'store'])->name('vendors.store');
    Route::delete('/vendors/{vendor}', [AdminVendorsController::class, 'destroy'])->name('vendors.destroy');
    // Tenders
    Route::get('/tenders', [AdminTendersController::class, 'index'])->name('tenders.index');
    Route::get('/tenders/create', [AdminTendersController::class, 'create'])->name('tenders.create');
    Route::post('/tenders', [AdminTendersController::class, 'store'])->name('tenders.store');
    Route::get('/tenders/{tender}/edit', [AdminTendersController::class, 'edit'])->name('tenders.edit');
    Route::put('/tenders/{tender}', [AdminTendersController::class, 'update'])->name('tenders.update');
    Route::delete('/tenders/{tender}', [AdminTendersController::class, 'destroy'])->name('tenders.destroy');


});


require __DIR__.'/auth.php';
