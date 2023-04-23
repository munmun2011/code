<?php
// require_once '../app/Controllers/HomeControllers.php';
// require_once '../app/Controllers/ProductController.php';
use Core\Route;
use App\Controllers\HomeController as HomeController;
use App\Controllers\ProductController;
// Route::get('/',function (){
//   return 'Xin chao trang chu';
// });
// Route::get('/san-pham',function (){
//   return 'Danh sach san pham';
// });
// Route::post('/san-pham',function (){
//   return 'Them san pham';
// });
Route::get('/',[HomeController::class, 'index']);
Route::get('/bao-cao',[HomeController::class, 'report']);
Route::get('/san-pham/sua/{id}',[ProductController::class, 'edit']);
?>