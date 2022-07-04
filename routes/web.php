<?php

use App\Http\Controllers\AccessMethodController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\HomeController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\userController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\exerciseController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\HealthcareController;
use App\Http\Controllers\ExerciseCategoryController;
use App\Http\Controllers\AssignExercise;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('app', function () {
    return redirect()->route('root');
});
Route::group(['middleware' => ['auth', 'hasPermission']], function () {
    Route::get('dashboard', function () {
        if (Auth::user()->info->role_id == '5') {
            return redirect()->route('member.dashboard');
        } else {
            return redirect()->route('admin.dashboard');
        }
    })->name('dashboard');
    Route::get('dashboard/admin', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('dashboard/member', [HomeController::class, 'MemberDashboard'])->name('member.dashboard');
    Route::resource('member', UserController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::resource('roles', roleController::class);
    Route::resource('roles/permission', permissionController::class);
    Route::resource('admin/exercise', ExerciseController::class);
    Route::resource('diet', DietController::class);
    Route::resource('healthcare', HealthcareController::class);
    Route::resource('user/fee', PaymentController::class);
    Route::resource('user/package', PackageController::class);
    Route::resource('post', PostController::class);
    Route::resource('video', VideoController::class);
    Route::resource('category/exercise/manage',ExerciseCategoryController::class);
    Route::resource('assign/exercise/control',AssignExercise::class);
    Route::resource('pages/product/category',\App\Http\Controllers\CategoryController::class);
    Route::resource('page/product/subcategory',\App\Http\Controllers\SubcategoryController::class);
    Route::resource('page/product',\App\Http\Controllers\ProductController::class);
    Route::resource('pages/enquiry/index',\App\Http\Controllers\EnquiryController::class);

    //  Routes For fee Menu created for specific Tasks.
    Route::get('package/fee/findUser', [PaymentController::class, 'NewCollection'])->name('new.collection');
    Route::get('admin/payment/requests', [PaymentController::class, 'CollectionRequests'])->name('collection.request');
    Route::get('admin/payment/history', [PaymentController::class, 'CollectionHistory'])->name('collection.history');
    Route::post('admin/payment/confirmation', [PaymentController::class, 'DisplayDetail'])->name('package.confirmation');
    Route::get('user/information/fetch', [userController::class, 'MemberFind'])->name('find.member');
    Route::post('pay/fee/cash', [PaymentController::class, 'PaymentHandler'])->name('pay.cash');
    Route::post('admin/add/existing/plan', [PaymentController::class, 'ExistingControl'])->name('member.existing');
    Route::post('pay/fee/cash/received', [PaymentController::class, 'AcceptPayment'])->name('cash.received');
    Route::get('admin/exercise/assign/user/{user}', [AssignExercise::class, 'assignTask'])->name('assign.task');
    Route::post('change/password',  [userController::class,'changePassword'])->name('change.password');
    Route::get('admin/member/{user}/attendance', [userController::class, 'AttendanceHistory'])->name('member.attendance');
    Route::get('admin/member/{user}/payment/history', [PaymentController::class, 'MemberPayHistory'])->name('member.pay.history');
    Route::get('admin/member/{user}/entry/ban', [AccessMethodController::class, 'BanMember'])->name('ban.member');
    Route::get('admin/member/{user}/entry/unban', [AccessMethodController::class, 'UnbanMember'])->name('unban.member');

    //    Route for Adding Access Methods in server.
    Route::get('admin/access/finger', [AccessMethodController::class, 'InitiateFingerAdding'])->name('initiate.finger');
    Route::post('admin/access/finger', [AccessMethodController::class, 'RemoveFromDB'])->name('initiate.remove');
    Route::get('admin/access/finger/{user}', [AccessMethodController::class, 'AddInDatabase'])->name('initiate.adding');
    Route::get('admin/access/rfid', [AccessMethodController::class, 'InitiateRFID'])->name('init.rfid');
    Route::post('admin/access/rfid', [AccessMethodController::class, 'RemoveRfIDFromDB'])->name('init.remove');
    Route::get('admin/access/rfid/{user}', [AccessMethodController::class, 'AddRFIDInDatabase'])->name('init.add');

    Route::post('admin/member/promote', [UserController::class, 'CreateTrainer'])->name('promote.member');
    Route::post('admin/member/demote', [UserController::class, 'DemoteMember'])->name('demote.trainer');

    //Routes for testing purposes....
    Route::get('admin/test/dashboard/{user}', [HomeController::class, 'ControlDashboard'])->name('control.dashboard');
    Route::get('member/profile/{id}', [userController::class, 'ProfileSHow'])->name('profile.view');
    Route::get('open/door/qr', [DoorController::class, 'GenerateQrCode'])->name('generate.qr');

    //Route for Managing Trainers.
    Route::get('admin/trainers', [DashboardController::class, 'AllTrainers'])->name('trainers.list');
    Route::get('admin/membership/expired', [DashboardController::class, 'MembershipExpiredUsers'])->name('membership.expired');
    Route::get('admin/analytics/{start}/{end}/view', [DashboardController::class, 'AnalyticsPage'])->name('analytics');
    Route::get('admin/attendance/today', [AttendanceController::class, 'PresentToday'])->name('present.today');
    Route::get('admin/new/members', [DashboardController::class, 'NewJoiningsList'])->name('new.joining');
    Route::any('admin/analytics', [DashboardController::class, 'GetDateAndSortURL'])->name('call.analytics');

    //Routes for DIET Management.
    Route::get('diet/assign/{id}', [DietController::class, 'AssignDiet'])->name('diet.user');
    Route::get('diet/assign/{member}/{diet}/allot', [DietController::class, 'InitAssign'])->name('init.assign');

    //Payment membership online
});

Auth::routes();

//Routes for Static Website!...

Route::get('/', function () {return view('layouts.website.template');})->name('home');
Route::get('stars', function () {return view('layouts.website.template');})->name('web.stars');
Route::get('layouts/website/aboutus', function () {return view('layouts.website.aboutus');})->name('aboutus');
Route::get('layouts/website/schedule', function () {return view('layouts.website.schedule');})->name('schedule');
Route::get('layouts/website/product', function () {return view('layouts.website.product');})->name('product');
Route::get('layouts/website/portfolio', function () {return view('layouts.website.portfolio');})->name('portfolio');
Route::get('contact', function () {return view('layouts.website.template');})->name('web.contact');
Route::get('reset/server/migrate/database', function () {\Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed');return redirect()->route('web.home')->with('success', 'Migrated Successfully');});

//Routes for Static Websites! End........!
Route::get('dashboard/test', function () {return view('pages.memDashboard');});
Route::get('get/pin/details', [userController::class, 'GetPinDetail'])->name('get.pin');
Route::get('privacy', [HomeController::class, 'GetPrivacyPage'])->name('privacy');
Route::get('payment/online', [PaymentController::class, 'OnlineDietPayment'])->name('online.payment');
Route::post('payment/online', [PaymentController::class, 'OnlinePaymentInitiate'])->name('online.payment.submit');

Route::get('app/landing', [AppController::class, 'AppLanding'])->name('app.landing');
Route::get('app/diet', [AppController::class, 'DietListing'])->name('app.diet');
Route::get('app/supplements', [AppController::class, 'SupplementsListing'])->name('app.supplements');
Route::post('app/store/{mode}', [AppController::class, 'DietHandler'])->name('store.app.data');
