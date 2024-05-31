<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginUserController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\BookcategoryController;
use App\Http\Controllers\Api\BooksController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\PromocodeController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PincodeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:api')->group(function (Request $request) {
// });
//Route::get('articles', 'ArticleController@index')->middleware('api.admin')->name('articles');

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('test',[LoginUserController::class,'test']);
    Route::post('loginUser',[LoginUserController::class,'login']);
    Route::post('loginOtp',[LoginUserController::class,'loginotp']);
    Route::post('registerUser',[LoginUserController::class,'register']);
    // Route::post('resetPassword',[LoginUserController::class,'resetpass']);
    Route::post('setPassword',[LoginUserController::class,'setpass']);
    Route::post('forgotPassword',[LoginUserController::class,'forgotPassword']);
    Route::post('verifyResetOtp',[LoginUserController::class,'verifyResetOtp']);
    Route::post('setNewPassword',[LoginUserController::class,'setNewPassword']);
    
    Route::post('guestLogin',[LoginUserController::class,'guestLogin']);
});

Route::middleware('auth:api')->group(function(){

    // Route::get('home',[HomeController::Class,'homePage']);
    // //--Product Route
    // Route::get('product/detail',[ProductController::Class,'index']);
    // Route::post('search',[ProductController::Class,'productsearch']);
    // Route::post('listing',[ProductController::Class,'productlisting']);
    
    //--Profile Route
    Route::get('viewprofile',[ProfileController::Class,'profile']);
    Route::post('updateProfile',[ProfileController::Class,'updateProfile']);
    Route::post('changeUsePassword',[ProfileController::Class,'changeUserPassword']);

    
    //--Category Route
    // Route::get('category',[CategoryController::Class,'viewCategory']);
    // Route::get('allcategory',[CategoryController::Class,'allCategory']);
    // Route::get('subCategoryList/{slug}',[CategoryController::Class,'fetchSubCategory']);
    
    
    //--Cart Route
    Route::get('viewCart',[CartController::Class,'cart']);
    Route::post('addCart',[CartController::Class,'addCart']);
    Route::post('deleteCart',[CartController::Class,'delCart']);
    Route::post('qtyupdate',[CartController::Class,'qtyupdate']);
    Route::get('movewishlist',[CartController::Class,'movewish']);
   
    //--Wishlist Route
    Route::get('viewWishlist',[WishlistController::Class,'wishlist']);
    Route::post('addWishlist',[WishlistController::Class,'addWish']);
    Route::post('deleteWishlist',[WishlistController::Class,'delWish']);

    //--Book category
    Route::get('bookcategory',[BookcategoryController::Class,'bookcategory']);
    Route::get('books',[BooksController::Class,'books']);
    Route::get('viewbook',[BooksController::Class,'viewbooks']);

    //--Review 
    Route::get('review',[ReviewController::Class,'review']);
    Route::post('addReview',[ReviewController::Class,'add_review']);
    
    //Order
    Route::post('checkout',[OrderController::class,'checkout']);
    Route::get('orderList',[OrderController::class,'orderlist']);
    Route::get('orderDetail',[OrderController::class,'orderdetail']);
    Route::post('order/status/update',[OrderController::class,'updateOrderStatus']);

    //Address
    Route::post('addAddress',[AddressController::class,'add_address']);
    Route::get('viewaddress',[AddressController::class,'viewAddress']);
    Route::get('addressDetail',[AddressController::class,'detail_address']);
    Route::post('updateAddress',[AddressController::class,'update_address']);
    Route::get('deleteAddress',[AddressController::class,'delete_address']);
    
    //Coupon
    Route::get('applyCoupon',[PromocodeController::class,'applyCoupon']);
    Route::get('viewCoupon',[PromocodeController::class,'viewCoupon']);

    //WALLET
    Route::get('walletInfo',[WalletController::class,'index']);
    
    //Profile Image
    Route::post('profileImageupdate',[ProfileController::class,'profileImageupdate']);
    Route::post('createHelpQuery',[HomeController::class,'createHelpQuery']);
    //NOTIFICATION
    Route::get('notification',[NotificationController::class,'index']);
    //checkpincode
    
    Route::get('checkpincode',[PincodeController::class,'checkpincode']);
    Route::get('transaction',[OrderController::class,'orderTransaction']);
    
    //PAYMENT RESPONSE
    Route::post('handleResponse',[OrderController::class,'handleResponseData']);
    Route::get('pay',[OrderController::class,'paypayment']);
    
    //MY REFERRAL 
    Route::get('myReferral',[ProfileController::class,'myReferral']);
    
    Route::get('home',[HomeController::Class,'homePage']);
    
    //--Category Route
    Route::get('category',[CategoryController::Class,'viewCategory']);
    Route::get('allcategory',[CategoryController::Class,'allCategory']);
    Route::get('subCategoryList/{slug}',[CategoryController::Class,'fetchSubCategory']);
        //--Product Route
    Route::get('product/detail',[ProductController::Class,'index']);
    Route::post('search',[ProductController::Class,'productsearch']);
    Route::post('listing',[ProductController::Class,'productlisting']);


});

    //social media
    Route::get('socialmedia',[ProfileController::class,'socialMedia']);
    
    Route::get('support_email',[ProfileController::class,'supportEmail']);
    Route::get('support_mobile',[ProfileController::class,'supportMobile']);
    Route::get('/unauthorized',[LoginUserController::class,'unauthorized'])->name('unauthorized');
    
    
    
    

