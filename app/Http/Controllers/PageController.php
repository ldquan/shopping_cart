<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\ProductType;
use App\Slide;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function getIndex(){
        $slides = Slide::all();
        $new_products = Product::where('new',1)->paginate(4);
        $top_products = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.home-page',compact('slides','new_products', 'top_products'));
    }
    public function getProductType($type) {
        $product_types = Product::where('id_type',$type)->get();
        $type = ProductType::where('id',$type)->first();
        $types = ProductType::all();
        $other_products = Product::where('id_type','<>',$type)->paginate(3);
        return view('page.product-type', compact('product_types','type', 'other_products', 'types'));
    }
    public function getProductDetail($id){
        $product = Product::where('id',$id)->first();
        $related_products = Product::where('id_type',$product->id_type)->paginate(6);
        return view('page.product',compact('product','related_products'));
    }
    public function getContact() {
        return view('page.contact');
    }
    public function getAbout() {
        return view('page.about');
    }
    public function getLogin(){
        return view('page.login');
    }
    public function getRegister(){
        return view('page.register');
    }
    public function postRegister(Request $request){
        $this->validate($request,[
            'email' => 'email|required|unique:users,email',
            'fullname' => 'required',
            'password' => 'required|min:6|max:20',
            're_password' => 'required|same:password'
        ],[
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Không đúng dịnh dạng Email',
            'email.unique' => 'Email đã đăng kí',
            'fullname.required' => 'Vui lòng nhập đầy đủ họ tên',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Password tối thiểu 6 kí tự',
            'password.max' => 'Password tối đa 20 kí tự',
            're_password.required' => 'Vui lòng nhập lại password',
            're_password.same' => 'Password không khớp'
        ]);
        $user = new User();
        $user->email = $request->email;
        $user->full_name = $request->fullname;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success','Đăng kí tài khoản thành công');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
           'email' => 'required|email',
           'password' => 'required|min:6|max:20'
        ],[
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Vui lòng nhập đúng định dạng Email',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Password tối thiểu 6 kí tự',
            'password.max' => 'Password tối đa 20 kí tự',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('trang-chu')->with(['flag' => 'success','message' => 'Đăng nhập thành công']);
        }
        else {
            return redirect()->back()->with(['flag' => 'danger','message' => 'Tài khoản đăng nhập không đúng']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    public function postSearch(Request $request){
        $key = $request->key_word;
        $search_products = Product::where('name','like','%'.$key.'%')->orWhere('unit_price',$key)->paginate(9);
        $types = ProductType::all();

        return view('page.search',compact('search_products', 'types','key'));
    }
    public function getSearch(){
        return redirect()->route('trang-chu');
    }

    public function getOrder(Request $request, $id) {
        $number_products = $request->productQty;
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id,$number_products);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDeleteCartItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }
}
