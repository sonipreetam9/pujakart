<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OembrandsController;
use App\Http\Controllers\Admin\SupercategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BuyerController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\SliderController;

use App\Http\Controllers\Admin\PincodeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Admin\OfferimageController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\BookcategoryController;

//new
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShippingchargesController;
use App\Http\Controllers\Admin\SocialmediaController;

//Help
use App\Http\Controllers\Admin\HelpController;

//Notification
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ReviewController;

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

Route::get('pay',[OrderController::class,'paypayment']);
Route::any('handleResponse',[OrderController::class,'handleResponseData']);
// Route::any('cancelResponse',[OrderController::class,'cancelResponseData']);

//==website payment test==//
Route::get('webpay',[OrderController::class,'initiatePayment']);


Route::get('/login',[LoginController::class,'adminlogin']);
Route::post('adminauth',[LoginController::class,'authadmin'])->name('adminvalidation');
Route::get('/unauthorized_access',[LoginController::class,'unauthorized']);
Route::get('logout_admin',[LoginController::class,'logout_admin']);
Route::get('delete-account',[LoginController::class,'deleteAccount'])->name('deleteAccount');
Route::get('delete-user-account',[LoginController::class,'deleteMyAccount']);    
    
Route::group(['middleware'=>['IsAdmin']],function(){
    
    //-- middleware start --//
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('homelayout',[DashboardController::class,'home_layout']);
    Route::post('homelayout/save',[DashboardController::class,'save']);
    // Route::post('homelayout/savesec',[DashboardController::class,'savesection2']); 

    //-- Oem brands
    Route::get('oembrands',[OembrandsController::class,'index'])->name('oembrands');
    Route::get('oembrands/create_oembrands',[OembrandsController::class,'create_oembrands'])->name('createoembrands');
    Route::post('oembrands/save',[OembrandsController::class,'save']);
    Route::get('oembrands/edit/{id}',[OembrandsController::class,'edit']);
    Route::post('oembrands/update/{id}',[OembrandsController::class,'update']);
    Route::get('oembrands/delete/{id}',[OembrandsController::class,'delete']);

    //-- Oem origins
    Route::get('oemorigins',[OemoriginsController::class,'index'])->name('oemorigins');
    Route::get('oemorigins/create_origins',[OemoriginsController::class,'create_origins'])->name('createorigins');
    Route::post('oemorigins/originsave',[OemoriginsController::class,'save']);
    Route::get('oemorigins/edit/{id}',[OemoriginsController::class,'edit']);
    Route::post('oemorigins/originupdate/{id}',[OemoriginsController::class,'update']);
    Route::get('oemorigins/delete/{id}',[OemoriginsController::class,'delete']); 

    //-- Super category
    Route::get('supercategory',[SupercategoryController::class,'index'])->name('supercategory');
    Route::get('supercategory/create_super_category',[SupercategoryController::class,'create_super_category'])->name('createsupcategory');
    Route::post('supercategory/supcategorysave',[SupercategoryController::class,'save']);
    Route::get('supercategory/edit/{id}',[SupercategoryController::class,'edit']);
    Route::post('supercategory/catupdate/{id}',[SupercategoryController::class,'update']);
    Route::get('supercategory/delete/{id}',[SupercategoryController::class,'delete']);

    //-- Category
    Route::get('category',[CategoryController::class,'index'])->name('category');
    Route::get('maincategory',[CategoryController::class,'main_category']);
    Route::get('category/childcategory/{id}',[CategoryController::class,'child_category']);
    Route::get('category/createchildcategory/{id}',[CategoryController::class,'createchild']);
    Route::post('category/childcategorysave',[CategoryController::class,'childcatsave']);
    Route::get('category/childedit/{id}',[CategoryController::class,'child_edit']);
    Route::post('category/childcategorysave/{id}',[CategoryController::class,'child_update']);
    
    
    Route::get('category/create_category',[CategoryController::class,'create_category'])->name('createcategory');
    Route::post('category/categorysave',[CategoryController::class,'save']);
    Route::get('category/edit/{id}',[CategoryController::class,'edit']);
    Route::post('category/catupdate/{id}',[CategoryController::class,'update']);
    Route::get('category/delete/{id}',[CategoryController::class,'delete']);
    
    Route::get('category/view-parent-category',[CategoryController::class,'viewparent']);
    Route::get('category/view-child-category',[CategoryController::class,'viewchild']);
    Route::get('category/statushide',[CategoryController::class,'hideunhide']);
    Route::post('category/cat_order',[CategoryController::class,'positionchangeCat']);

    //-- Sub Category
    Route::get('subcategory',[SubcategoryController::class,'index'])->name('subcategory');
    Route::get('subcategory/create_subcategory',[SubcategoryController::class,'create_subcategory'])->name('createsubcategory');
    Route::post('subcategory/fetchCat',[SubcategoryController::class,'fetchCat']);
    Route::post('subcategory/scategory',[SubcategoryController::class,'save']);
    Route::get('subcategory/edit/{id}',[SubcategoryController::class,'edit']);
    Route::post('subcategory/subcatupdate/{id}',[SubcategoryController::class,'update']);
    Route::get('subcategory/delete/{id}',[SubcategoryController::class,'delete']);
    
    //-- Users
    Route::get('users',[UserController::class,'index'])->name('users');
    Route::get('users/delete/{id}',[UserController::class,'delete']);
    Route::get('users/detail/{id}',[UserController::class,'details']); 
    Route::get('users/useredit/{id}',[UserController::class,'edit']);
    Route::post('users/userupdate/{id}',[UserController::class,'update']);
    
    //-- Buyer 
    Route::get('buyer',[BuyerController::class,'index'])->name('buyer');
    Route::get('buyer/byueredit/{id}',[SubcategoryController::class,'edit']);
    
    //-- Seller
    Route::get('seller',[SellerController::class,'index'])->name('seller');
    Route::get('seller/selleredit/{id}',[SubcategoryController::class,'edit']);

    //-- Slider Start
    Route::get('slider',[SliderController::class,'index'])->name('slider');
    Route::get('slider/create_slider',[SliderController::class,'create_slider'])->name('createslider');
    Route::post('slider/addslider',[SliderController::class,'save']);
    Route::get('slider/edit/{id}',[SliderController::class,'edit']);
    Route::post('slider/sliderupdate/{id}',[SliderController::class,'update']);
    Route::get('slider/delete/{id}',[SliderController::class,'delete']); 

    //-- Product
    Route::get('product',[ProductController::class,'index'])->name('product');
    Route::get('product/create_product',[ProductController::class,'create_product'])->name('createproduct');
    Route::post('product/productsave',[ProductController::class,'save']);
    Route::get('product/edit/{id}',[ProductController::class,'edit']);
    Route::post('product/productupdate/{id}',[ProductController::class,'update']);
    Route::get('product/delete/{id}',[ProductController::class,'delete']);  
    Route::get('product/stockdelete/{id}',[ProductController::class,'productstockdelete']); 
    
    Route::get('product/product_order',[ProductController::class,'pro_order']);
    Route::post('product/changeposition',[ProductController::class,'change_pos']);
    Route::match(array('GET','POST'),'product/searchcategory',[ProductController::class,'searchcate']);

    //-- Pincode
    Route::get('pincode',[PincodeController::class,'index'])->name('pincode');
    Route::get('pincode/create_pincode',[PincodeController::class,'create_pincode'])->name('createpincode');
    Route::post('pincode/pincodesave',[PincodeController::class,'save']);
    Route::post('pincode/fetchPincode',[PincodeController::class,'fetchPincode']);
    Route::get('pincode/edit/{id}',[PincodeController::class,'edit']);
    Route::post('pincode/pincodeupdate/{id}',[PincodeController::class,'update']);
    Route::get('pincode/delete/{id}',[PincodeController::class,'delete']);

    //-- Promocode
    Route::get('promocode',[PromocodeController::class,'index'])->name('promocode');
    Route::get('promocode/create_promocode',[PromocodeController::class,'create_promocode'])->name('createpromocode');
    Route::post('promocode/promosave',[PromocodeController::class,'save']);
    Route::get('promocode/edit/{id}',[PromocodeController::class,'edit']);
    Route::post('promocode/promoupdate/{id}',[PromocodeController::class,'update']);
    Route::get('promocode/delete/{id}',[PromocodeController::class,'delete']);

    //-- Offerimage
    Route::get('offerimages',[OfferimageController::class,'index'])->name('offerimages');
    Route::get('offerimage/create_offerimage',[OfferimageController::class,'create_offerimage'])->name('createofferimage');
    Route::post('offerimage/offerimagesave',[OfferimageController::class,'save']);
    Route::get('offerimage/edit/{id}',[OfferimageController::class,'edit']);
    Route::post('offerimage/offerimageupdate/{id}',[OfferimageController::class,'update']);
    Route::get('offerimage/delete/{id}',[OfferimageController::class,'delete']);

    //-- Unit
    Route::get('unit',[UnitController::class,'index'])->name('unit');
    Route::get('unit/create_unit',[UnitController::class,'create_unit'])->name('createunit');
    Route::post('unit/unitsave',[UnitController::class,'save']);
    Route::get('unit/edit/{id}',[UnitController::class,'edit']);
    Route::post('unit/unitupdate/{id}',[UnitController::class,'update']);
    Route::get('unit/delete/{id}',[UnitController::class,'delete']);

    //-- Books Route
    Route::get('books',[BooksController::class,'index'])->name('books');
    Route::get('books/create_books',[BooksController::class,'create_books'])->name('createbooks');
    Route::post('books/booksave',[BooksController::class,'save']);
    Route::get('books/edit/{id}',[BooksController::class,'edit']);
    Route::post('books/catupdate/{id}',[BooksController::class,'update']);
    Route::get('books/delete/{id}',[BooksController::class,'delete']);
    
    //-- Help Enquire Route
    Route::get('helpEnquiry',[HelpController::class,'index'])->name('help');
    Route::get('help/delete/{id}',[HelpController::class,'delete']);

    //-- Books Category Route
    Route::get('bookcategory',[BookcategoryController::class,'index'])->name('bookcategory');
    Route::get('bookcategory/create_bookcategory',[BookcategoryController::class,'create_bookcategory'])->name('createbookcategory');
    Route::post('bookcategory/bookcategorysave',[BookcategoryController::class,'save']);
    Route::get('bookcategory/edit/{id}',[BookcategoryController::class,'edit']);
    Route::post('bookcategory/catupdate/{id}',[BookcategoryController::class,'update']);
    Route::get('bookcategory/delete/{id}',[BookcategoryController::class,'delete']);
    
    Route::post('bookcategory/bookcat_order',[BookcategoryController::class,'positionchangeBookcat']);
    Route::get('bookcategory/statushide',[BookcategoryController::class,'hideunhide']);
    
    //--new route Started
    //-- Orders Route
    Route::post('product/updateStatus',[ProductController::class,'updatestatus']);
    Route::get('order',[OrderController::class,'index'])->name('order');
    Route::get('order/edit/{id}',[OrderController::class,'edit']);
    Route::post('order/orderupdate/{id}',[OrderController::class,'update']);
    Route::get('order/invoice/{id}',[OrderController::class,'order_invoice']);
    
    //-- Return Orders Route
    Route::get('order/return/',[OrderController::class,'return_order']);
    Route::get('order/return_edit/{id}',[OrderController::class,'edit_return']);
    Route::post('order/returnupdate/{id}',[OrderController::class,'update_return']);
    
    //-- Exchange Orders Route
    Route::get('order/exchange/',[OrderController::class,'exchange_order']);
    Route::get('order/exchange_edit/{id}',[OrderController::class,'edit_exchange']);
    Route::post('order/exchangeupdate/{id}',[OrderController::class,'update_exchange']);
    //-- ccavenue


    
    //-- Cancel Orders Route
    Route::get('order/cancel/',[OrderController::class,'cancel_order']);
    Route::get('order/cancel_edit/{id}',[OrderController::class,'edit_cancel']);
    Route::post('order/cancelupdate/{id}',[OrderController::class,'update_cancel']);

    //-- Setting Route
    Route::get('setting/general_shipping_condition',[SettingController::class,'shipcondition']);
    Route::get('setting/general_return_condition',[SettingController::class,'retcondition']);
    Route::get('setting/edit/{id}',[SettingController::class,'edit']);
    Route::post('setting/settingupdate/{id}',[SettingController::class,'update']);
    Route::get('setting/minimum_order',[SettingController::class,'min_order']);
    Route::get('setting/min_order_edit/{id}',[SettingController::class,'min_edit']);
    Route::post('setting/minedit/{id}',[SettingController::class,'min_update']);
    Route::get('setting/support',[SettingController::class,'support'])->name('support');
    Route::get('setting/edit_support/{id}',[SettingController::class,'editsupport']);
    Route::post('setting/supportupdate/{id}',[SettingController::class,'support_update']);
    
    Route::get('setting/return_exchange/',[SettingController::class,'return_exchange']);
    Route::get('setting/edit_return_exchange/{id}',[SettingController::class,'editReturnExchange']);
    Route::post('setting/returnexchupdate/{id}',[SettingController::class,'returnExchangeupdate']);
    
    

    //-- Shipping Route
    Route::get('shipping_charges',[ShippingchargesController::class,'index'])->name('shipping');
    Route::get('shipping/create_charges',[ShippingchargesController::class,'create_charges']);
    Route::post('shipping/shippingsave',[ShippingchargesController::class,'save']); 
    Route::get('shipping/edit/{id}',[ShippingchargesController::class,'edit']);
    Route::post('shipping/shippingupdate/{id}',[ShippingchargesController::class,'update']);
    Route::get('shipping/delete/{id}',[ShippingchargesController::class,'delete']);

    //-- Social Media Route
    Route::get('social_media_link',[SocialmediaController::class,'index'])->name('socialmedia');
    Route::get('socailmedia/edit/{id}',[SocialmediaController::class,'edit']);
    Route::post('socailmedia/socialupdate/{id}',[SocialmediaController::class,'update']);
    
    //--Notification
    Route::get('notification',[NotificationController::class,'index'])->name('notification');
    Route::post('notification/send',[NotificationController::class,'sendnotification']);
    Route::get('notification/view',[NotificationController::class,'view']);
    
    //-- Review Route
    Route::get('review',[ReviewController::class,'index'])->name('reviews');
    Route::get('review/edit/{id}',[ReviewController::class,'edit']);
    Route::post('review/update/{id}',[ReviewController::class,'update']);
    
});



