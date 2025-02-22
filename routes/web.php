<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;

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
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('cron/run', [HomeController::class, 'cron_run'])->name('cron-run');
Route::get('exec/ping/{id}', [HomeController::class, 'exec_ping'])->name('exec-ping');
Route::get('exec/flap/{id}', [HomeController::class, 'exec_flap'])->name('exec-flap');

Route::get('/forget_password', [HomeController::class, 'forget_list'])->name('forget_password');
Route::post('/forget_password', [HomeController::class, 'forget_action'])->name('forget_password.action');
Route::get('/forget_password/{token}', [HomeController::class, 'showresetpasswordform'])->name('mailforget');
Route::post('/reset_password', [HomeController::class, 'updateresetpassword'])->name('new_password.action');

Route::get('testphone', [HomeController::class, 'testphone'])->name('testphone');

Route::get('/', function () {
    return (! Auth::check()) ? Redirect::to('login') : Redirect::to(getDashboardURL());
});

Route::prefix('admin')->middleware('auth','admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::get('/isp', [AdminController::class, 'list_isp'])->name('admin.isp.list');
    Route::post('/isp', [AdminController::class, 'create_isp'])->name('admin.isp.create');
    Route::put('/isp', [AdminController::class, 'update_isp'])->name('admin.isp.update');
    Route::delete('/isp/{id}', [AdminController::class, 'delete_isp'])->name('admin.isp.delete');

    Route::get('/isp/member/{id}', [AdminController::class, 'isp_member_list'])->name('admin.isp.member.list');
    Route::post('/isp/member', [AdminController::class, 'isp_member_create'])->name('admin.isp.member.create');
    Route::put('/isp/member', [AdminController::class, 'isp_member_update'])->name('admin.isp.member.update');
    Route::delete('/isp/member/{id}', [AdminController::class, 'isp_member_delete'])->name('admin.isp.member.delete');


    Route::get('/branch', [AdminController::class, 'list_branch'])->name('admin.branch.list');
    Route::post('/branch/create', [AdminController::class, 'create_branch'])->name('admin.branch.create');
    Route::put('/branch', [AdminController::class, 'update_branch'])->name('admin.branch.update');
    Route::delete('/branch/{id}', [AdminController::class, 'delete_branch'])->name('admin.branch.delete');
    Route::get('/branch/add', [AdminController::class, 'branch_add'])->name('admin.branch.add');
    Route::get('/branch/{id}', [AdminController::class, 'edit_branch'])->name('admin.branch.edit');

    Route::get('/export_branch', [AdminController::class, 'exportbranchData'])->name('export_branch');
    Route::post('/import_branch', [AdminController::class, 'importbranchData'])->name('import_branch');




    Route::get('/operator', [AdminController::class, 'list_operator'])->name('admin.operator.list');
    Route::post('/operator', [AdminController::class, 'create_operator'])->name('admin.operator.create');
    Route::put('/operator', [AdminController::class, 'update_operator'])->name('admin.operator.update');
    Route::delete('/operator/{id}', [AdminController::class, 'delete_operator'])->name('admin.operator.delete');

    Route::get('/operator/member/{id}', [AdminController::class, 'operator_member_list'])->name('admin.operator.member.list');
    Route::post('/operator/member', [AdminController::class, 'operator_member_create'])->name('admin.operator.member.create');
    Route::put('/operator/member', [AdminController::class, 'operator_member_update'])->name('admin.operator.member.update');
    Route::delete('/operator/member/{id}', [AdminController::class, 'operator_member_delete'])->name('admin.operator.member.delete');

    Route::get('/agent', [AdminController::class, 'list_agent'])->name('admin.agent.list');
    Route::post('/agent', [AdminController::class, 'create_agent'])->name('admin.agent.create');
    Route::put('/agent', [AdminController::class, 'update_agent'])->name('admin.agent.update');
    Route::delete('/agent/{id}', [AdminController::class, 'delete_agent'])->name('admin.agent.delete');

    Route::get('/agent/member/{id}', [AdminController::class, 'agent_member_list'])->name('admin.agent.member.list');
    Route::post('/agent/member', [AdminController::class, 'agent_member_create'])->name('admin.agent.member.create');
    Route::put('/agent/member', [AdminController::class, 'agent_member_update'])->name('admin.agent.member.update');
    Route::delete('/agent/member/{id}', [AdminController::class, 'agent_member_delete'])->name('admin.agent.member.delete');



    Route::get('/customer', [AdminController::class, 'list_customer'])->name('admin.customer.list');
    Route::post('/customer', [AdminController::class, 'create_customer'])->name('admin.customer.create');
    Route::put('/customer', [AdminController::class, 'update_customer'])->name('admin.customer.update');
    Route::delete('/customer/{id}', [AdminController::class, 'delete_customer'])->name('admin.customer.delete');

    Route::get('/customer/member/{id}', [AdminController::class, 'customer_member_list'])->name('admin.customer.member.list');
    Route::post('/customer/member', [AdminController::class, 'customer_member_create'])->name('admin.customer.member.create');
    Route::put('/customer/member', [AdminController::class, 'customer_member_update'])->name('admin.customer.member.update');
    Route::delete('/customer/member/{id}', [AdminController::class, 'customer_member_delete'])->name('admin.customer.member.delete');



    Route::get('/member', [AdminController::class, 'member_list'])->name('admin.member.list');
    Route::get('/member/edit/{id}', [AdminController::class, 'edit_member'])->name('admin.member.edit');

    Route::post('/member', [AdminController::class, 'member_create'])->name('admin.member.create');
    Route::put('/member/edit', [AdminController::class, 'member_update'])->name('admin.member.update');
    Route::delete('/member/{id}', [AdminController::class, 'member_delete'])->name('admin.member.delete');

    Route::get('/nms-dwonlinks', [AdminController::class, 'list_nms_dwonlinks'])->name('admin.nms.dwonlinks_list');
    Route::get('/nms', [AdminController::class, 'list_nms'])->name('admin.nms.list');
    Route::get('/nms/add', [AdminController::class, 'nms_add'])->name('admin.nms.add');
    Route::get('/nms/view/{id}', [AdminController::class, 'nms_view'])->name('admin.nms.view');
    Route::get('/nms/import', [AdminController::class, 'list_import'])->name('admin.nms.import');

    Route::post('/nms/import', [AdminController::class, 'nms_import_create'])->name('admin.nms.import.create');
    Route::post('/nms', [AdminController::class, 'nms_create'])->name('admin.nms.create');

    Route::get('/nms/{id}', [AdminController::class, 'edit_nms'])->name('admin.nms.edit');
    Route::put('/nms', [AdminController::class, 'nms_update'])->name('admin.nms.update');
    Route::delete('/nms/{id}', [AdminController::class, 'nms_delete'])->name('admin.nms.delete');
    Route::get('/nms/logs/{id}', [AdminController::class, 'nms_logs'])->name('admin.nms.logs');




    Route::get('/ajax_user/isp/{id}', [AdminController::class, 'ajaxUser_isp'])->name("admin.nms.ajax_isp");
    Route::get('/ajax_user/agent/{id}', [AdminController::class, 'ajaxUser_agent'])->name("admin.nms.ajax_agent");
    Route::get('/ajax_user/customer/{id}', [AdminController::class, 'ajaxUser_customer'])->name("admin.nms.ajax_customer");
    Route::get('/ajax_user/operator/{id}', [AdminController::class, 'ajaxUser_operator'])->name("admin.barnch.ajax_operator");
    Route::get('/ajax_user/branch_code/{id}', [AdminController::class, 'ajaxUser_branch_code'])->name("admin.barnch.ajax_branch_code");



    // -------------------------------Export report  ------------
Route::get('/export_nms', [AdminController::class, 'exportData'])->name('export_nms');
Route::post('/import_nms', [AdminController::class, 'importData'])->name('import_nms');


Route::get('/system_setting', [AdminController::class, 'setting'])->name('admin.system_setting.index');
Route::put('/system_setting', [AdminController::class, 'setting_add'])->name('admin.system_setting.create');

});


Route::prefix('customer')->middleware('auth','customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer');

    Route::get('/nms', [CustomerController::class, 'list_nms'])->name('customer.nms.list');
    Route::get('/nms/view/{id}', [CustomerController::class, 'nms_view'])->name('customer.nms.view');
    Route::get('/nms/logs/{id}', [CustomerController::class, 'nms_logs'])->name('customer.nms.logs');

    Route::get('/member/edit/{id}', [CustomerController::class, 'edit_member'])->name('customer.member.edit');

    Route::put('/member/edit', [CustomerController::class, 'member_update'])->name('customer.member.update');

    Route::get('/nms/add', [CustomerController::class, 'nms_add'])->name('customer.nms.add');
    Route::post('/nms', [CustomerController::class, 'nms_create'])->name('customer.nms.create');

});

// Route::get('index', [DashboardsController::class, 'index']);
// Route::get('index2', [DashboardsController::class, 'index2']);
// Route::get('index3', [DashboardsController::class, 'index3']);
// Route::get('index4', [DashboardsController::class, 'index4']);
// Route::get('index5', [DashboardsController::class, 'index5']);


// Route::get('widgets', [WidgetsController::class, 'widgets']);


// Route::get('maps', [MapsController::class, 'maps']);
// Route::get('maps1', [MapsController::class, 'maps1']);
// Route::get('maps2', [MapsController::class, 'maps2']);


// Route::get('cards', [ComponentsController::class, 'cards']);
// Route::get('calendar', [ComponentsController::class, 'calendar']);
// Route::get('calendar2', [ComponentsController::class, 'calendar2']);
// Route::get('chat', [ComponentsController::class, 'chat']);
// Route::get('notify', [ComponentsController::class, 'notify']);
// Route::get('sweetalert', [ComponentsController::class, 'sweetalert']);
// Route::get('rangeslider', [ComponentsController::class, 'rangeslider']);
// Route::get('scroll', [ComponentsController::class, 'scroll']);
// Route::get('loaders', [ComponentsController::class, 'loaders']);
// Route::get('counters', [ComponentsController::class, 'counters']);
// Route::get('rating', [ComponentsController::class, 'rating']);
// Route::get('timeline', [ComponentsController::class, 'timeline']);
// Route::get('treeview', [ComponentsController::class, 'treeview']);


// Route::get('alerts', [ElementsController::class, 'alerts']);
// Route::get('buttons', [ElementsController::class, 'buttons']);
// Route::get('colors', [ElementsController::class, 'colors']);
// Route::get('avatarsquare', [ElementsController::class, 'avatarsquare']);
// Route::get('avatar-round', [ElementsController::class, 'avatar_round']);
// Route::get('avatar-radius', [ElementsController::class, 'avatar_radius']);
// Route::get('dropdown', [ElementsController::class, 'dropdown']);
// Route::get('list', [ElementsController::class, 'list']);
// Route::get('tags', [ElementsController::class, 'tags']);
// Route::get('toast', [ElementsController::class, 'toast']);
// Route::get('pagination', [ElementsController::class, 'pagination']);
// Route::get('navigation', [ElementsController::class, 'navigation']);
// Route::get('typography', [ElementsController::class, 'typography']);
// Route::get('breadcrumbs', [ElementsController::class, 'breadcrumbs']);
// Route::get('badge', [ElementsController::class, 'badge']);
// Route::get('panels', [ElementsController::class, 'panels']);
// Route::get('thumbnails', [ElementsController::class, 'thumbnails']);


// Route::get('mediaobject', [AdvanceduiController::class, 'mediaobject']);
// Route::get('accordion', [AdvanceduiController::class, 'accordion']);
// Route::get('tabs', [AdvanceduiController::class, 'tabs']);
// Route::get('chart', [AdvanceduiController::class, 'chart']);
// Route::get('modal', [AdvanceduiController::class, 'modal']);
// Route::get('tooltipandpopover', [AdvanceduiController::class, 'tooltipandpopover']);
// Route::get('progress', [AdvanceduiController::class, 'progress']);
// Route::get('carousel', [AdvanceduiController::class, 'carousel']);
// Route::get('footers', [AdvanceduiController::class, 'footers']);
// Route::get('users-list', [AdvanceduiController::class, 'users_list']);
// Route::get('search', [AdvanceduiController::class, 'search']);
// Route::get('crypto-currencies', [AdvanceduiController::class, 'crypto_currencies']);


// Route::get('login', [PagesController::class, 'login']);
// Route::get('register', [PagesController::class, 'register']);
// Route::get('forgot-password', [PagesController::class, 'forgot_password']);
// Route::get('lockscreen', [PagesController::class, 'lockscreen']);
// Route::get('error400', [PagesController::class, 'error400']);
// Route::get('error401', [PagesController::class, 'error401']);
// Route::get('error403', [PagesController::class, 'error403']);
// Route::get('error404', [PagesController::class, 'error404']);
// Route::get('error500', [PagesController::class, 'error500']);
// Route::get('error503', [PagesController::class, 'error503']);
// Route::get('file-manager', [PagesController::class, 'file_manager']);
// Route::get('filemanager-list', [PagesController::class, 'filemanager_list']);
// Route::get('filemanager-details', [PagesController::class, 'filemanager_details']);
// Route::get('file-attachments', [PagesController::class, 'file_attachments']);
// Route::get('shop', [PagesController::class, 'shop']);
// Route::get('shop-description', [PagesController::class, 'shop_description']);
// Route::get('cart', [PagesController::class, 'cart']);
// Route::get('add-product', [PagesController::class, 'add_product']);
// Route::get('wishlist', [PagesController::class, 'wishlist']);
// Route::get('checkout', [PagesController::class, 'checkout']);
// Route::get('blog', [PagesController::class, 'blog']);
// Route::get('blog-details', [PagesController::class, 'blog_details']);
// Route::get('blog-post', [PagesController::class, 'blog_post']);
// Route::get('profile', [PagesController::class, 'profile']);
// Route::get('editprofile', [PagesController::class, 'editprofile']);
// Route::get('email', [PagesController::class, 'email']);
// Route::get('emailservices', [PagesController::class, 'emailservices']);
// Route::get('mail-read', [PagesController::class, 'mail_read']);
// Route::get('gallery', [PagesController::class, 'gallery']);
// Route::get('about', [PagesController::class, 'about']);
// Route::get('services', [PagesController::class, 'services']);
// Route::get('faq', [PagesController::class, 'faq']);
// Route::get('terms', [PagesController::class, 'terms']);
// Route::get('invoice', [PagesController::class, 'invoice']);
// Route::get('notify-list', [PagesController::class, 'notify_list']);
// Route::get('pricing', [PagesController::class, 'pricing']);
// Route::get('switcher', [PagesController::class, 'switcher']);
// Route::get('emptypage', [PagesController::class, 'emptypage']);
// Route::get('construction', [PagesController::class, 'construction']);


// Route::get('form-elements', [FormsController::class, 'form_elements']);
// Route::get('form-editor', [FormsController::class, 'form_editor']);
// Route::get('form-wizard', [FormsController::class, 'form_wizard']);
// Route::get('form-validation', [FormsController::class, 'form_validation']);
// Route::get('form-layouts', [FormsController::class, 'form_layouts']);


// Route::get('icons', [IconsController::class, 'icons']);
// Route::get('icons2', [IconsController::class, 'icons2']);
// Route::get('icons3', [IconsController::class, 'icons3']);
// Route::get('icons4', [IconsController::class, 'icons4']);
// Route::get('icons5', [IconsController::class, 'icons5']);
// Route::get('icons6', [IconsController::class, 'icons6']);
// Route::get('icons7', [IconsController::class, 'icons7']);
// Route::get('icons8', [IconsController::class, 'icons8']);
// Route::get('icons9', [IconsController::class, 'icons9']);
// Route::get('icons10', [IconsController::class, 'icons10']);
// Route::get('icons11', [IconsController::class, 'icons11']);


// Route::get('chart-chartist', [ChartsController::class, 'chart_chartist']);
// Route::get('chart-flot', [ChartsController::class, 'chart_flot']);
// Route::get('chart-echart', [ChartsController::class, 'chart_echart']);
// Route::get('chart-morris', [ChartsController::class, 'chart_morris']);
// Route::get('charts', [ChartsController::class, 'charts']);
// Route::get('chart-line', [ChartsController::class, 'chart_line']);
// Route::get('chart-donut', [ChartsController::class, 'chart_donut']);
// Route::get('chart-pie', [ChartsController::class, 'chart_pie']);


// Route::get('tables', [TablesController::class, 'tables']);
// Route::get('datatable', [TablesController::class, 'datatable']);
// Route::get('edit-table', [TablesController::class, 'edit_table']);
