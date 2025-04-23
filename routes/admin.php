<?php


use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\NotificationUsersController;
use App\Livewire\Admin\Brands\BrandList;
use App\Livewire\Admin\Categories\CategoryAttributes;
use App\Livewire\Admin\Categories\CategoryList;
use App\Livewire\Admin\Categories\TrashedCategoryList;
use App\Livewire\Admin\Colors\ColorList;
use App\Livewire\Admin\Guaranties\GuarantyList;
use App\Livewire\Admin\Orders\OrderDetails;
use App\Livewire\Admin\Orders\Orders;
use App\Livewire\Admin\Panel;
use App\Livewire\Admin\Permissions\PermissionList;
use App\Livewire\Admin\Products\CreateProduct;
use App\Livewire\Admin\Products\CreateProductPrice;
use App\Livewire\Admin\Products\EditProduct;
use App\Livewire\Admin\Products\EditProductPrice;
use App\Livewire\Admin\Products\ProductGallery;
use App\Livewire\Admin\Products\ProductList;
use App\Livewire\Admin\Products\ProductPrices;
use App\Livewire\Admin\Products\ProductProperties;
use App\Livewire\Admin\Roles\RoleList;
use App\Livewire\Admin\Users\UserList;
use Illuminate\Support\Facades\Route;

Route::get('/', Panel::class)->name('panel');

//--- users ---//
Route::get('/users', UserList::class)->name('admin.users.list');

//--- roles and permissions ---//
Route::get('/roles', RoleList::class)->name('admin.roles.list');
Route::get('/permissions', PermissionList::class)->name('admin.permissions.list');

//--- categories ---//
Route::get('/categories', CategoryList::class)->name('admin.categories.list');
Route::get('/trashed_categories', TrashedCategoryList::class)->name('admin.trashed_categories.list');
Route::get('/category_attributes/{category}', CategoryAttributes::class)->name('admin.category.attributes');

//--- brands ---//
Route::get('/brands', BrandList::class)->name('admin.brands.list');

//--- colors ---//
Route::get('/colors', ColorList::class)->name('admin.colors.list');

//--- guaranties ---//
Route::get('/guaranties', GuarantyList::class)->name('admin.guaranties.list');


//--- products ---//
Route::get('/products', ProductList::class)->name('admin.products.list');
Route::get('/create_product', CreateProduct::class)->name('admin.create.product');
Route::get('/edit_product/{product}', EditProduct::class)->name('admin.edit.product');
Route::get('/product_prices/{product}', ProductPrices::class)->name('admin.product.prices');
Route::get('/create_product_prices/{product}', CreateProductPrice::class)->name('admin.create.product.prices');
Route::get('/edit_product_prices/{product_price}', EditProductPrice::class)->name('admin.edit.product.prices');
Route::get('/product_properties/{product}', ProductProperties::class)->name('admin.product.properties');
Route::get('/product_gallery/{product}', ProductGallery::class)->name('admin.product.gallery');

//--- guaranties ---//
Route::get('/admin_orders', Orders::class)->name('admin.orders');
Route::get('/admin_order_details/{order_id}', OrderDetails::class)->name('admin.order.details');


Route::get('/new_year_campaign', [CampaignController::class,'newYearNotification'])->name('admin.notification.new_year');

Route::get('/notification_to_all_users', [NotificationUsersController::class,'notificationToAllUsers'])->name('admin.notification.all_users');
