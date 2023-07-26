<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware'=>['auth']],function(){
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    //******** utility part *******//
    Route::prefix(config('app.utility'))->group(function () {
        Route::resource('sector', 'App\Http\Controllers\SectorController');
        Route::resource('ministry', 'App\Http\Controllers\MinistryController');
        Route::resource('implementing-agency', 'App\Http\Controllers\ImplementingAgencyController');
        Route::resource('location', 'App\Http\Controllers\LocationController');
        Route::resource('approval', 'App\Http\Controllers\ApprovalController');
        Route::resource('private-partner', 'App\Http\Controllers\PrivatePartnerController');
        Route::resource('delivery-model', 'App\Http\Controllers\DeliveryModelController');
        Route::resource('revenue-model', 'App\Http\Controllers\ReveneueModelController');
        Route::resource('glossary', 'App\Http\Controllers\GlossaryController');
        Route::resource('faq', 'App\Http\Controllers\FAQController');

    });

    //******** project part *******//
    Route::prefix(config('app.project'))->group(function () {
        Route::resource('project', 'App\Http\Controllers\ProjectController');
        Route::post('get-implementing-agency', 'App\Http\Controllers\ProjectController@getImplementingAgency');
        Route::get('project-status', 'App\Http\Controllers\ProjectController@projectStatus')->name('project-status');
        Route::get('project-report', 'App\Http\Controllers\ProjectController@projectReport')->name('project-report');
        Route::get('project-profile/{id}', 'App\Http\Controllers\ProjectController@projectProfile')->name('project-profile');
    });

    //******** feasibility part *******//
    Route::prefix(config('app.feasibility'))->group(function () {
        Route::resource('feasibility-company', 'App\Http\Controllers\FeasibilityCompanyController');
        Route::resource('add-feasibility', 'App\Http\Controllers\AddFeasibilityController');
        Route::get('feasibility-amendment', 'App\Http\Controllers\AddFeasibilityController@feasibilityAmendment')->name('feasibility-amendment');
        Route::get('feasibility-report', 'App\Http\Controllers\AddFeasibilityController@feasibilityReport')->name('feasibility-report');
        Route::get('show-feasibility-document/{id}', 'App\Http\Controllers\AddFeasibilityController@showFeasibilityDocument')->name('show-feasibility-document');
    });

    //******** construction part *******//
    Route::prefix(config('app.construction'))->group(function () {
        Route::resource('construction-company', 'App\Http\Controllers\ConstructionCompanyController');
        Route::resource('add-agency', 'App\Http\Controllers\AddConsctructionAgencyController');
        Route::get('construction-agency-report', 'App\Http\Controllers\AddConsctructionAgencyController@constructionAgencyReport')->name('construction-agency-report');
        Route::get('construction-company-wise-report/{id}', 'App\Http\Controllers\AddConsctructionAgencyController@constructionCompanyWiseReport')->name('construction-company-wise-report');
    });

    //******** cost part *******//
    Route::prefix(config('app.cost'))->group(function () {
        Route::resource('capital-cost', 'App\Http\Controllers\CapitalCostController');
        Route::resource('add-capital-cost', 'App\Http\Controllers\AddCapitalCostController');
        Route::get('capital-cost-report', 'App\Http\Controllers\AddCapitalCostController@capitalCostReport')->name('capital-cost-report');
    });

    //******** phase part *******//
    Route::prefix(config('app.phase'))->group(function () {
        Route::resource('phase', 'App\Http\Controllers\PhaseController');
        Route::resource('sub-phase', 'App\Http\Controllers\SubPhaseController');
        Route::resource('document-title', 'App\Http\Controllers\DocumentTitleController');
        Route::resource('add-phase', 'App\Http\Controllers\AddPhaseController');
        Route::post('get-sub-phase', 'App\Http\Controllers\AddPhaseController@getSubPhase');
        Route::post('get-document-title', 'App\Http\Controllers\AddPhaseController@getDocumentTitle');
        Route::get('phase-amendment', 'App\Http\Controllers\AddPhaseController@phaseAmendment')->name('phase-amendment');
        Route::get('phase-report', 'App\Http\Controllers\AddPhaseController@phaseReport')->name('phase-report');
        Route::get('phase-document-report', 'App\Http\Controllers\PhaseController@phaseDocumentReport')->name('phase-document-report');
        Route::get('project-document-report/{id}', 'App\Http\Controllers\PhaseController@projcetDocumentReport')->name('project-document-report');
    });

    //******** phase part *******//
    Route::prefix(config('app.pfu'))->group(function () {
        Route::resource('country', 'App\Http\Controllers\CountryController');
        Route::resource('procurement-details', 'App\Http\Controllers\ProcurementDetailsController');
        Route::resource('g2g-document', 'App\Http\Controllers\G2GDocumentController');
    });
    
    //******** others document part *******//
    Route::prefix(config('app.others'))->group(function () {
        Route::resource('document-type', 'App\Http\Controllers\DocumentTypeController');
        Route::resource('add-others-document', 'App\Http\Controllers\AddOthersDocumentController');
        Route::get('others-document-report', 'App\Http\Controllers\AddOthersDocumentController@othersDocumentReport')->name('others-document-report');
    });

    //******** dashboard part *******//
    Route::prefix(config('app.dashboard'))->group(function () {
        Route::get('ministry-list', 'App\Http\Controllers\DashboardController@ministryList')->name('ministry-list');
        Route::get('implementing-agency-list/{id}', 'App\Http\Controllers\DashboardController@implementingAgencyList')->name('implementing-agency-list');
        Route::get('project-list/{id}', 'App\Http\Controllers\DashboardController@projectList')->name('project-list');
        Route::get('identitification-phase-project', 'App\Http\Controllers\DashboardController@identitificationPhaseProject')->name('identitification-phase-project');
        Route::get('development-phase-project', 'App\Http\Controllers\DashboardController@developmentPhaseProject')->name('development-phase-project');
        Route::get('procurement-phase-project', 'App\Http\Controllers\DashboardController@procurementPhaseProject')->name('procurement-phase-project');
        Route::get('award-phase-project', 'App\Http\Controllers\DashboardController@awardPhaseProject')->name('award-phase-project');
        Route::get('implementation-phase-project', 'App\Http\Controllers\DashboardController@implementationPhaseProject')->name('implementation-phase-project');
        Route::get('documents', 'App\Http\Controllers\DashboardController@document')->name('documents');
        Route::get('document-projects/{id}', 'App\Http\Controllers\DashboardController@documentProjects')->name('document-projects');
        Route::get('g2g-projects', 'App\Http\Controllers\DashboardController@g2gProjects')->name('g2g-projects');
    });

    //****** Accounts ***********//
    Route::prefix(config('app.account'))->group(function () {
        Route::resource('account-type', 'App\Http\Controllers\AccountTypeController');
        Route::resource('bank-account', 'App\Http\Controllers\BankAccountController');
        Route::get('bank-deposit/{id}', 'App\Http\Controllers\BankDepositController@bankDeposit');
        Route::resource('bank-deposit', 'App\Http\Controllers\BankDepositController');
        Route::get('amount-transfer/{id}', 'App\Http\Controllers\AmountTransferController@amountTransfer');
        Route::resource('amount-transfer', 'App\Http\Controllers\AmountTransferController');
        Route::get('amount-withdraw/{id}', 'App\Http\Controllers\AmountWithdrawController@amountWithdraw');
        Route::resource('amount-withdraw', 'App\Http\Controllers\AmountWithdrawController');
        Route::get('bank-report/{id}', 'App\Http\Controllers\BankAccountController@showBankReport');
        Route::get('bank-report/{id}', 'App\Http\Controllers\BankAccountController@showBankReportFilter')->name('bank-report.filter');
        Route::post('find-chequeno-with-chequebook-id', 'App\Http\Controllers\AmountWithdrawController@findChequeNoWithChequeBookId');
        Route::resource('cheque-book', 'App\Http\Controllers\ChequeBookController');
        Route::resource('cheque-no', 'App\Http\Controllers\ChequeNoController');
        Route::get('daily-transaction', 'App\Http\Controllers\DailyTransactionController@index')->name('daily-transaction');
        Route::get('daily-transaction', 'App\Http\Controllers\DailyTransactionController@filter')->name('daily-transaction-filter');

        
        Route::get('budget-report/{id}', 'App\Http\Controllers\BankAccountController@budgetReport')->name('budget-report');
        Route::post('budget-report/{id}', 'App\Http\Controllers\BankAccountController@budgetReportFilter')->name('budget-report-filter');

    });

       //******** Other Payment *******//
       Route::prefix(config('app.op'))->group(function () {
        Route::resource('payment-code', 'App\Http\Controllers\PaymentTypeController');
        Route::resource('payment-title', 'App\Http\Controllers\PaymentSubTypeController');
        Route::resource('payment-voucher', 'App\Http\Controllers\PaymentVoucherController');
        Route::get('payment-voucher-report', 'App\Http\Controllers\PaymentVoucherController@report')->name('payment-voucher-report');
        Route::post('find-payment-subtype-with-type-id', 'App\Http\Controllers\PaymentVoucherController@findPaymentSubTypeWithType');
    });

    //****** Budget part ***********//
    Route::prefix(config('app.budget'))->group(function () {
        Route::resource('budget', 'App\Http\Controllers\BudgetController');
        Route::resource('budget-payment', 'App\Http\Controllers\BudgetPaymentController');
        Route::get('payment-form/{id}', 'App\Http\Controllers\BudgetPaymentController@paymentForm')->name('payment-form');
        Route::get('budget-payment-report', 'App\Http\Controllers\BudgetPaymentController@budgetPaymentReport')->name('budget-payment-report');
        Route::get('budget-payment-amendment', 'App\Http\Controllers\BudgetPaymentController@budgetPaymentAmendment')->name('budget-payment-amendment');

        //--------------------- recovery ---------------------//
        Route::resource('add-extra-percent', 'App\Http\Controllers\AddExtraPercentController');
        Route::get('add-extra-percent-form/{id}', 'App\Http\Controllers\AddExtraPercentController@extraPercentForm')->name('add-extra-percent-form');

        Route::resource('recovery', 'App\Http\Controllers\BudgetRecoveryController');
        Route::get('recovery-form/{id}', 'App\Http\Controllers\BudgetRecoveryController@recoveryForm')->name('recovery-form');
        Route::get('recovery-report', 'App\Http\Controllers\BudgetRecoveryController@recoveryReport')->name('recovery-report');
        Route::get('recovery-amendment', 'App\Http\Controllers\BudgetRecoveryController@recoveryAmendment')->name('recovery-amendment');
    });
   

    //******** users part *******//
    Route::prefix(config('app.user'))->group(function () {
        Route::resource('department', 'App\Http\Controllers\DepartmentController');
        Route::resource('designation', 'App\Http\Controllers\DesignationController');
        Route::resource('user-list', 'App\Http\Controllers\UserController');
        Route::resource('user-role', 'App\Http\Controllers\RoleController');

    });
   

   

    // Setting part
    Route::put('save-site-setting/{id}', 'App\Http\Controllers\SettingController@saveSiteSetting')->name('save-site-setting');
    Route::put('save-currency-setting/{id}', 'App\Http\Controllers\SettingController@saveCurrencySetting')->name('save-currency-setting');
    Route::put('update-user-password/{id}', 'App\Http\Controllers\SettingController@updateUserPassword')->name('update-user-password');
    Route::put('update-site-theme/{id}', 'App\Http\Controllers\SettingController@saveSiteTheme')->name('update-site-theme');

    Route::get('settings', 'App\Http\Controllers\SettingController@index');
});

//******** Website part *******//
Route::get('project-records/project-list', 'App\Http\Controllers\WebsiteController@projectList')->name('web-project-list');
Route::get('project-records/project-profile/{slug}', 'App\Http\Controllers\WebsiteController@projectProfile')->name('project-profiles');
Route::get('project-records/sectors', 'App\Http\Controllers\WebsiteController@sectorList')->name('sectors');
Route::get('project-records/sector/{slug}', 'App\Http\Controllers\WebsiteController@sectorWiseProjectList')->name('sector-porject-list');
Route::get('project-records/ministries', 'App\Http\Controllers\WebsiteController@ministryList')->name('ministries');
Route::get('project-records/ministry/{slug}', 'App\Http\Controllers\WebsiteController@contractingAuthority')->name('contracting-authority');
Route::get('project-records/contracting-authority/{slug}', 'App\Http\Controllers\WebsiteController@authorityWiseProjectList')->name('contracting-project-list');
Route::get('project-records/phase/{slug}', 'App\Http\Controllers\WebsiteController@phaseWiseProjectList')->name('phase');
Route::get('glossary', 'App\Http\Controllers\WebsiteController@glossary')->name('glossary');
Route::get('faq', 'App\Http\Controllers\WebsiteController@faq')->name('faq');

//Clear Cache facade value:
//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});
//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});
//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});
//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});
//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});
//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
    return '<h1>Storage Created</h1>';
});