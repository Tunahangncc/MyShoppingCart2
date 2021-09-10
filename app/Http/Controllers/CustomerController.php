<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function showHomePage()
    {
        $topProducts = Product::query()->with(['category'])->select('*')->orderBy('number_of_likes', 'DESC')->take(4)->get();

        return view('customers.home', compact('topProducts'));
    }

    public function showProductsPage()
    {
        $products = getAllProducts();
        $categories = Category::query()->whereNull('parent_id')->with('childrenCategories')->get();

        return view('customers.products', [
            'products' => $products,
            'productCount' => productCount(),
            'categories' => $categories,
        ]);
    }

    public function showAboutUsPage()
    {
        return view('customers.about_us');
    }

    public function showContactPage()
    {
        return view('customers.contact');
    }

    public function showLoginPage()
    {
        return view('customers.login');
    }

    public function showRegisterPage()
    {
        return view('customers.register');
    }

    public function showProfilePage()
    {
        return view('customers.profile');
    }

    public function showProfileEditPage()
    {
        $months = array(
            'Jan' => 'January', 'Feb' => 'February', 'Mar' => 'March', 'Apr' => 'April',
            'May' => 'May', 'June' => 'June', 'July' => 'July', 'Aug' => 'August',
            'Sep' => 'September', 'Oct' => 'October', 'Nov' => 'November', 'Dec' => 'December'
        );

        return view('customers.profile_edit', [
            'months' => $months,
        ]);
    }

    public function showProfileAddressPage()
    {
        $districts = array('Adana', 'Adıyaman', 'Afyon', 'Ağrı', 'Amasya', 'Ankara', 'Antalya', 'Artvin',
            'Aydın', 'Balıkesir', 'Bilecik', 'Bingöl', 'Bitlis', 'Bolu', 'Burdur', 'Bursa', 'Çanakkale',
            'Çankırı', 'Çorum', 'Denizli', 'Diyarbakır', 'Edirne', 'Elazığ', 'Erzincan', 'Erzurum', 'Eskişehir',
            'Gaziantep', 'Giresun', 'Gümüşhane', 'Hakkari', 'Hatay', 'Isparta', 'Mersin', 'İstanbul', 'İzmir',
            'Kars', 'Kastamonu', 'Kayseri', 'Kırklareli', 'Kırşehir', 'Kocaeli', 'Konya', 'Kütahya', 'Malatya',
            'Manisa', 'Kahramanmaraş', 'Mardin', 'Muğla', 'Muş', 'Nevşehir', 'Niğde', 'Ordu', 'Rize', 'Sakarya',
            'Samsun', 'Siirt', 'Sinop', 'Sivas', 'Tekirdağ', 'Tokat', 'Trabzon', 'Tunceli', 'Şanlıurfa', 'Uşak',
            'Van', 'Yozgat', 'Zonguldak', 'Aksaray', 'Bayburt', 'Karaman', 'Kırıkkale', 'Batman', 'Şırnak',
            'Bartın', 'Ardahan', 'Iğdır', 'Yalova', 'Karabük', 'Kilis', 'Osmaniye', 'Düzce'
        );

        return view('customers.profile_address', [
            'districts' => $districts,
        ]);
    }

    public function showProfileAddProductPage()
    {
        return view('customers.profile_add_product');
    }

    public function showProfileEditProductPage()
    {
        return view('customers.profile_edit_product');
    }

    public function showProfileEditSelectedProductPage()
    {
        return view('customers.profile_edit_selected_product');
    }

    public function showMessageBoxPage()
    {
        return view('customers.profile_message_box');
    }

    public function showShoppingBagPage()
    {
        return view('customers.profile_shopping_bag');
    }
}
