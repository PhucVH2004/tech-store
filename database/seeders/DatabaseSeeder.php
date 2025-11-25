<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@techstore.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
        ]);

        // Create Categories
        $categories = [
            'Smartphones' => 'https://cdn.tgdd.vn/Category/42/5-iPhone-(Apple)-120x120.png',
            'Laptops' => 'https://cdn.tgdd.vn/Category/44/Laptop-120x120.png',
            'Tablets' => 'https://cdn.tgdd.vn/Category/522/Tablet-120x120.png',
            'Smartwatches' => 'https://cdn.tgdd.vn/Category/7077/Dong-ho-thong-minh-120x120.png',
            'Audio' => 'https://cdn.tgdd.vn/Category/54/Tai-nghe-120x120.png',
        ];

        $catIds = [];
        foreach ($categories as $name => $image) {
            $cat = Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'image' => $image,
            ]);
            $catIds[$name] = $cat->id;
        }

        // Create Products
        $products = [
            // Smartphones
            [
                'category' => 'Smartphones',
                'name' => 'iPhone 16 Pro Max 1TB',
                'price' => 46990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/329149/iphone-16-pro-max-titan-sa-mac-1-600x600.jpg',
                'description' => 'iPhone 16 Pro Max. Built for Apple Intelligence. Featuring a stunning titanium design. Camera Control. 4K 120 fps Dolby Vision. And the A18 Pro chip.',
            ],
            [
                'category' => 'Smartphones',
                'name' => 'Samsung Galaxy S24 Ultra 5G',
                'price' => 33990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/307172/samsung-galaxy-s24-ultra-grey-600x600.jpg',
                'description' => 'Galaxy AI is here. Welcome to the era of mobile AI. With Galaxy S24 Ultra in your hands, you can unleash whole new levels of creativity, productivity and possibility.',
            ],
            [
                'category' => 'Smartphones',
                'name' => 'Xiaomi 14 Ultra 5G',
                'price' => 29990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/314108/xiaomi-14-ultra-black-thumb-600x600.jpg',
                'description' => 'Xiaomi 14 Ultra. Legendary optics. Leica Summilux lens. 1-inch image sensor. Snapdragon 8 Gen 3.',
            ],
            [
                'category' => 'Smartphones',
                'name' => 'OPPO Find N3 Flip',
                'price' => 22990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/306995/oppo-find-n3-flip-hong-thumb-600x600.jpg',
                'description' => 'OPPO Find N3 Flip. Pocket-sized perfection. Industry-first triple camera flip phone.',
            ],
            [
                'category' => 'Smartphones',
                'name' => 'Google Pixel 9 Pro XL',
                'price' => 25990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/329107/google-pixel-9-pro-xl-obsidian-600x600.jpg',
                'description' => 'Meet Pixel 9 Pro XL. It has a telephoto lens, pro-level camera controls, and the brightest Pixel display ever.',
            ],
            [
                'category' => 'Smartphones',
                'name' => 'iPhone 15 Plus 128GB',
                'price' => 22990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/303891/iphone-15-plus-hong-thumb-600x600.jpg',
                'description' => 'iPhone 15 Plus. Dynamic Island. 48MP Main camera. USB-C. Durable color-infused glass and aluminum design.',
            ],
            [
                'category' => 'Smartphones',
                'name' => 'Samsung Galaxy Z Fold6 5G',
                'price' => 41990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/320721/samsung-galaxy-z-fold6-xam-thumb-600x600.jpg',
                'description' => 'Galaxy Z Fold6. The ultimate productivity device. Thinner, lighter, and more powerful than ever.',
            ],
            // Laptops
            [
                'category' => 'Laptops',
                'name' => 'MacBook Pro 14 inch M3',
                'price' => 39990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/318225/macbook-pro-14-inch-m3-2023-16gb-xam-thumb-600x600.jpg',
                'description' => 'MacBook Pro 14 inch M3. Mind-blowing. Head-turning. With the M3 chip, MacBook Pro leaps ahead.',
            ],
            [
                'category' => 'Laptops',
                'name' => 'MacBook Air 13 inch M2',
                'price' => 24990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/282827/macbook-air-m2-2022-midnight-600x600.jpg',
                'description' => 'MacBook Air M2. Don\'t take it lightly. Supercharged by M2. Up to 18 hours of battery life.',
            ],
            [
                'category' => 'Laptops',
                'name' => 'Asus ROG Strix G16',
                'price' => 32990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/315367/asus-rog-strix-g16-g614ju-i7-n3135w-thumb-600x600.jpg',
                'description' => 'ROG Strix G16. Raise your game. Carry your squad to victory with the latest Intel Core processor and NVIDIA GeForce RTX 40 Series Laptop GPU.',
            ],
            [
                'category' => 'Laptops',
                'name' => 'Dell XPS 13 Plus',
                'price' => 45990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/309187/dell-xps-13-plus-9320-i7-71013325-thumb-600x600.jpg',
                'description' => 'Dell XPS 13 Plus. Twice as powerful as before. In the same size. It\'s the most powerful 13-inch XPS laptop.',
            ],
            [
                'category' => 'Laptops',
                'name' => 'HP Spectre x360 14',
                'price' => 38990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/321427/hp-spectre-x360-14-eu0056tu-u7-a19c6pa-thumb-600x600.jpg',
                'description' => 'HP Spectre x360. Crafted to combine performance and beauty. 2-in-1 design.',
            ],
            [
                'category' => 'Laptops',
                'name' => 'Lenovo Legion 5 Pro',
                'price' => 35990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/318042/lenovo-legion-5-pro-16irx8-i9-82wk0069vn-thumb-600x600.jpg',
                'description' => 'Lenovo Legion 5 Pro. The world\'s best gaming laptop just got better. AI-tuned performance.',
            ],
            [
                'category' => 'Laptops',
                'name' => 'Acer Swift Go 14 AI',
                'price' => 22990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/326107/acer-swift-go-14-ai-sf14-73-53x7-u5-nxks0sv001-thumb-600x600.jpg',
                'description' => 'Acer Swift Go 14. Ready to go. Powered by Intel Core Ultra processors with AI Boost.',
            ],
            // Tablets
            [
                'category' => 'Tablets',
                'name' => 'iPad Pro 13 inch M4',
                'price' => 37990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/522/325514/ipad-pro-13-inch-m4-wifi-black-thumb-600x600.jpg',
                'description' => 'iPad Pro. Thinpossible. The thinnest Apple product ever. Powered by the M4 chip.',
            ],
            [
                'category' => 'Tablets',
                'name' => 'Samsung Galaxy Tab S9 Ultra',
                'price' => 28990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/522/308605/samsung-galaxy-tab-s9-ultra-xam-thumb-600x600.jpg',
                'description' => 'Galaxy Tab S9 Ultra. The new standard for premium tablets. Dynamic AMOLED 2X display.',
            ],
            [
                'category' => 'Tablets',
                'name' => 'Xiaomi Pad 6S Pro',
                'price' => 13990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/522/321868/xiaomi-pad-6s-pro-xam-thumb-600x600.jpg',
                'description' => 'Xiaomi Pad 6S Pro. 12.4 inch 3K display. Snapdragon 8 Gen 2. 120W HyperCharge.',
            ],
            [
                'category' => 'Tablets',
                'name' => 'iPad Air 13 inch M2',
                'price' => 21990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/522/325518/ipad-air-13-inch-m2-wifi-blue-thumb-600x600.jpg',
                'description' => 'iPad Air. Fresh air. Now with the M2 chip. Two sizes. Infinite possibilities.',
            ],
            [
                'category' => 'Tablets',
                'name' => 'OPPO Pad 2',
                'price' => 12990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/522/309628/oppo-pad-2-thumb-600x600.jpg',
                'description' => 'OPPO Pad 2. 7:5 ReadFit Screen. Dimensity 9000. 144Hz Refresh Rate.',
            ],
            // Smartwatches
            [
                'category' => 'Smartwatches',
                'name' => 'Apple Watch Ultra 2',
                'price' => 21990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/7077/314663/apple-watch-ultra-2-49mm-vien-titan-day-alpine-blue-thumb-1-600x600.jpg',
                'description' => 'Apple Watch Ultra 2. Next level adventure. The brightest Apple display ever.',
            ],
            [
                'category' => 'Smartwatches',
                'name' => 'Samsung Galaxy Watch6 Classic',
                'price' => 7990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/7077/308405/samsung-galaxy-watch6-classic-47mm-den-thumb-1-600x600.jpg',
                'description' => 'Galaxy Watch6 Classic. The rotating bezel is back. Sleep coaching. Heart health monitoring.',
            ],
            [
                'category' => 'Smartwatches',
                'name' => 'Garmin Fenix 7 Pro',
                'price' => 23990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/7077/308616/garmin-fenix-7-pro-solar-titanium-47mm-thumb-1-600x600.jpg',
                'description' => 'Garmin Fenix 7 Pro. All day, every day. Long battery life with solar charging.',
            ],
            [
                'category' => 'Smartwatches',
                'name' => 'Apple Watch Series 9',
                'price' => 10490000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/7077/314656/apple-watch-s9-gps-41mm-vien-nhom-day-silicone-hong-thumb-1-600x600.jpg',
                'description' => 'Apple Watch Series 9. Smarter. Brighter. Mightier. Double tap gesture.',
            ],
            [
                'category' => 'Smartwatches',
                'name' => 'Huawei Watch GT 4',
                'price' => 5490000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/7077/315809/huawei-watch-gt-4-46mm-day-da-nau-thumb-1-600x600.jpg',
                'description' => 'Huawei Watch GT 4. Fashion forward. Up to 2 weeks battery life. Enhanced health management.',
            ],
            // Audio
            [
                'category' => 'Audio',
                'name' => 'Sony WH-1000XM5',
                'price' => 8490000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/54/280053/tai-nghe-chup-tai-bluetooth-sony-wh-1000xm5-bac-thumb-600x600.jpg',
                'description' => 'Sony WH-1000XM5. Industry-leading noise cancellation. Magnificent sound, engineered to perfection.',
            ],
            [
                'category' => 'Audio',
                'name' => 'AirPods Pro (2nd Gen) USB-C',
                'price' => 5990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/54/314850/airpods-pro-2-magsafe-usb-c-thumb-600x600.jpg',
                'description' => 'AirPods Pro. Up to 2x more Active Noise Cancellation. Transparency mode. Personalized Spatial Audio.',
            ],
            [
                'category' => 'Audio',
                'name' => 'Marshall Major IV',
                'price' => 3690000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/54/285527/tai-nghe-chup-tai-bluetooth-marshall-major-iv-den-thumb-600x600.jpg',
                'description' => 'Marshall Major IV. 80+ hours of wireless playtime. Wireless charging. Iconic Marshall design.',
            ],
            [
                'category' => 'Audio',
                'name' => 'JBL PartyBox 310',
                'price' => 14900000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/2162/233373/loa-bluetooth-jbl-partybox-310-thumb-600x600.jpg',
                'description' => 'JBL PartyBox 310. Huge sound, dazzling lights and unbelievable power.',
            ],
            [
                'category' => 'Audio',
                'name' => 'Samsung Galaxy Buds2 Pro',
                'price' => 2990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/54/286026/samsung-galaxy-buds2-pro-tim-thumb-600x600.jpg',
                'description' => 'Galaxy Buds2 Pro. 24-bit Hi-Fi audio. Intelligent ANC. Ergonomic fit.',
            ],
            [
                'category' => 'Audio',
                'name' => 'Sony WF-1000XM5',
                'price' => 6490000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/54/311099/sony-wf-1000xm5-den-thumb-600x600.jpg',
                'description' => 'Sony WF-1000XM5. The best noise cancelling earbuds. Astonishing sound quality.',
            ],
            // More Smartphones to reach 35
            [
                'category' => 'Smartphones',
                'name' => 'Xiaomi Redmi Note 13 Pro',
                'price' => 6790000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/309833/xiaomi-redmi-note-13-pro-xanh-thumb-600x600.jpg',
                'description' => 'Redmi Note 13 Pro. 200MP OIS camera. 120Hz AMOLED display. 67W turbo charging.',
            ],
            [
                'category' => 'Smartphones',
                'name' => 'Samsung Galaxy A55 5G',
                'price' => 9990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/322638/samsung-galaxy-a55-5g-xanh-thumb-1-600x600.jpg',
                'description' => 'Galaxy A55 5G. Awesome design. Vivid Nightography. 2-day battery.',
            ],
            [
                'category' => 'Smartphones',
                'name' => 'Realme 11 Pro+',
                'price' => 13990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/306993/realme-11-pro-plus-trang-thumb-600x600.jpg',
                'description' => 'Realme 11 Pro+. 200MP SuperZoom Camera. 120Hz Curved Vision Display.',
            ],
            [
                'category' => 'Smartphones',
                'name' => 'Vivo V30 5G',
                'price' => 13990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/321544/vivo-v30-xanh-thumb-600x600.jpg',
                'description' => 'Vivo V30. Aura Light Portrait. 50MP AF Group Selfie. Slimmest 5000mAh Phone.',
            ],
            [
                'category' => 'Smartphones',
                'name' => 'Asus ROG Phone 8',
                'price' => 29990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/320703/asus-rog-phone-8-black-thumb-600x600.jpg',
                'description' => 'ROG Phone 8. Beyond Gaming. Snapdragon 8 Gen 3. IP68 water resistance.',
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'category_id' => $catIds[$product['category']],
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'price' => $product['price'],
                'image' => $product['image'],
                'description' => $product['description'],
                'stock' => rand(10, 100),
            ]);
        }
    }
}
