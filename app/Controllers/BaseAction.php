<?php

namespace App\Controllers;

class BaseAction extends BaseController
{
    
    public function index()
    {
        return view('index');
    }

    public function product()
    {
        return view('product');
    }

    public function productDescription()
    {
        return view('product_desc');
    }

    public function profile()
    {
        return view('profile');
    }

    public function booking()
    {
        return view('booking');
    }

    public function cart()
    {
        return view('cart');
    }
    public function wishlist()
    {
        return view('wishlist');
    }
    public function order()
    {
        return view('order');
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function faq()
    {
        return view('faq');
    }
    public function privacypolicy()
    {
        return view('privacypolicy');
    }
    public function experience()
    {
        return view('experience');
    }
    public function addpet()
    {
        return view('addpet');
    }
    public function groomingcenter()
    {
        return view('groomingcenter');
    }
    public function consultationcenter()
    {
        return view('consultationcenter');
    }
    public function consultation()
    {  
        $data['menuItems'] = [];
        return view('consultation', $data);
    }

    public function chatwithdoctor()
    {  
        $data['menuItems'] = [];
        return view('chatwithdoctor', $data);
    }
    public function termsAndCondition()
    {
        return view('termsandconditions');
    }

    
    
}
