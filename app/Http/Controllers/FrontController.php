<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Contactus;
use App\Order;
use App\Testimonial;
use Session;

class FrontController extends Controller
{
    //

	private static $_data;

	public function index(){
		self::$_data['title'] = "Home | Express Korean Motor";
		self::$_data['best_seller'] = $this->bestSeller();
		self::$_data['new_product'] = $this->getNewProduct();
		self::$_data['category'] = $this->getCategory();
		self::$_data['testimonial'] = Testimonial::where(['status'=>1])->orderBy('created_at','desc')->take(3)->get();
		return view("frontend.home",self::$_data);
	}

	public function product_show($id,$product_name){
		$product = Product::find($id);
		self::$_data['product'] = $product;
		self::$_data['category'] = $this->getCategory();
		self::$_data['related_product'] = $this->getRelatedProduct($product->p_name);
		self::$_data['title'] = "Product | $product->p_name";
		return view('frontend.product_show',self::$_data);
	}

	public function product(){
		self::$_data['category'] = $this->getCategory();
		self::$_data['title'] = "Products | Express Korean Motor";
		self::$_data['products'] = Product::where(['is_show'=>1])->orderBy('created_at','desc')->paginate(6);
		return view('frontend.products',self::$_data);
	}

	public function product_by_category($id,$cat_name){
		self::$_data['category'] = $this->getCategory();
		self::$_data['cat_name'] = $cat_name;
		self::$_data['title'] = "Products - $cat_name | Express Korean Motor";
		self::$_data['products'] = Product::where(['is_show'=>1,'cat_id'=>$id])->orderBy('created_at','desc')->paginate(6);
		return view('frontend.products_category',self::$_data);
	}

	public function about(){
		self::$_data['category'] = $this->getCategory();
		self::$_data['title'] = "About Us - Express Korean Motor";
		return view("frontend.about",self::$_data);
	}

	public function contact(){
		self::$_data['category'] = $this->getCategory();
		self::$_data['title'] = "Contact Us - Express Korean Motor";
		return view("frontend.contact",self::$_data);
	}

	public function service(){
		self::$_data['category'] = $this->getCategory();
		self::$_data['title'] = "Service - Express Korean Motor";
		return view("frontend.service",self::$_data);
	}

	public function buy(){
		self::$_data['category'] = $this->getCategory();
		self::$_data['title'] = "How to Buy - Express Korean Motor";
		return view("frontend.buy",self::$_data);
	}

	public function contact_post(Request $req){
		$contact = new Contactus();
		$contact->name = $req->input('name');
		$contact->email = $req->input('email');
		$contact->messages = $req->input('messages');
		$contact->subject = $req->input('subject');
		$contact->save();

		Session::flash("success","Your messages has been sent, thanks.");
		return redirect()->route('front.contact');
	}

	public function product_search(Request $req){
		if(!empty($req->input('submit'))){
			$keyword = $req->input("keyword");
			Session::put('keyword-search',$keyword);
		}else{
			if(Session::has('keyword-search')){
				$keyword = Session::get('keyword-search');
			}else{
				$keyword = $req->input("keyword");
				Session::put('keyword-search',$keyword);
			}
		}

		self::$_data['category'] = $this->getCategory();
		self::$_data['keyword'] = $keyword;
		self::$_data['title'] = "Products - $keyword | Express Korean Motor";
		$product = Product::where('p_name','like',"%$keyword%")->orderBy('created_at','desc')->paginate(6);
		self::$_data['products'] = $product;
		return view('frontend.products_search',self::$_data);
	}

	public function product_post(Request $req){
		$order = new Order();
		$order->fullname = $req->input('fullname');
		$order->email = $req->input('email');
		$order->phone = $req->input('phone');
		$order->qty = $req->input('qty');
		$order->address= $req->input("address");
		$order->product_id = $req->input('product_id');
		$order->price = $req->input('price');
		$order->status= 0;
		$order->save();

		Session::flash("success","Your order has been sent and will be proccess with admin, thanks.");
		return redirect()->back();
	}

	public function testimonial(){
		self::$_data['category'] = $this->getCategory();
		self::$_data['title'] = "Testimonial - Express Korean Motor";
		return view("frontend.testimonial",self::$_data);
	}

	public function testimonial_post(Request $req){
		$testimonial = new Testimonial();
		$testimonial->nama = $req->input('nama');
		$testimonial->email = $req->input('email');
		$testimonial->telepon = $req->input('telepon');
		$testimonial->perusahaan = $req->input('perusahaan');
		$testimonial->isi = $req->input('isi');
		$testimonial->status = 0;
		$testimonial->save();

		Session::flash("success","Your testimonial has been sent, thanks.");
		return redirect()->route('front.testimonial');
	}

	private function getCategory(){
		$category = Category::where(['is_show'=>1])->orderBy('cat_name','asc')->get();
		return $category;
	}

	private function getNewProduct(){
		$product = Product::where(['is_show'=>1])->orderBy('created_at','desc')->take(9)->get();
		return $product;
	}

	private function getRelatedProduct($title){
		$products = DB::table('products')
			->select('id', 'p_name','price','pict_1')
			->where('p_name', 'like', "%$title%")
			->orderBy('created_at','desc')
			->take(6)
			->get();

		return $products;
	}

	private function bestSeller(){
		$products = DB::table('orders')
			->join('products','orders.product_id','=','products.id')
			->select('product_id', DB::raw('SUM(qty) as total'),'p_name',DB::raw('products.price as p'),'pict_1')
			->groupBy('product_id')
			->orderBy('total','desc')
			->take(6)
			->get();

		return $products;
	}
}
