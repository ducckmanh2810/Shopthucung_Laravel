<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Repositories\IAdminRepository;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    private $AdminRepository;

    public function __construct(IAdminRepository $AdminRepository) {
        $this->AdminRepository = $AdminRepository;
    }

    public function index(){
        return view('admin_login');
    }
    public function dashboard(){
        $getOrderView = $this->AdminRepository->getOrderView();
        $totalsCustomer = $this->AdminRepository->totalsCustomer();
        $totalsOrders = $this->AdminRepository->totalsOrders();
        $totalsMoney = $this->AdminRepository->totalsMoney();
        $totalsSaleProducts = $this->AdminRepository->totalsSaleProducts();
        return view('admin.dashboard', 
        [
         'getOrderView' => $getOrderView,
         'totalsCustomer' => $totalsCustomer,
         'totalsOrders' =>  $totalsOrders, 
         'totalsMoney' => $totalsMoney, 
         'totalsSaleProducts' => $totalsSaleProducts
        ]);
    }
    public function search(Request $request){
        $searchs = $this->AdminRepository->searchProduct($request);
        return view('admin.products.search')->with('searchs', $searchs)->with('tukhoa', $request->input('tukhoa'));
    }
    public function signin_dashboard(Request $request){
        return $this->AdminRepository->signIn($request);
    }
    public function admin_logout(){
        return $this->AdminRepository->logOut();
    }
}
