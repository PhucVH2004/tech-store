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
            'Smartphones' => 'https://cdn-media.sforum.vn/storage/app/media/phuonganh/iphone-17-pro-co-may-mau-5.jpg',
            'Laptops' => 'https://th.bing.com/th/id/OIP.9URXwrD5-pBSHlCpB4XvcwHaFZ?w=250&h=182&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
            'Tablets' => 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/5201/5201101_sd.jpg',
            'Smartwatches' => 'https://th.bing.com/th/id/OIP.gReLX0znfpXM7m4jNvTO8AHaHa?w=195&h=195&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
            'Audio' => 'https://th.bing.com/th?id=OIF.BwEvhdIHR2n%2fek3nl0WM7A&w=272&h=193&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
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
                'image' => 'https://th.bing.com/th/id/OIP.9URXwrD5-pBSHlCpB4XvcwHaFZ?w=250&h=182&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
                'description' => 'iPhone 16 Pro Max. Built for Apple Intelligence. Featuring a stunning titanium design. Camera Control. 4K 120 fps Dolby Vision. And the A18 Pro chip.',
                'brand' => 'Apple',
                'is_featured' => true,
                'specifications' => json_encode(['Screen' => '6.9" Super Retina XDR', 'Chip' => 'A18 Pro', 'RAM' => '8GB', 'Storage' => '1TB']),
            ],
            [
                'category' => 'Smartphones',
                'name' => 'Samsung Galaxy S24 Ultra 512GB',
                'price' => 33990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/307172/samsung-galaxy-s24-ultra-grey-thumbnew-600x600.jpg',
                'description' => 'Galaxy AI is here. Welcome to the era of mobile AI. With Galaxy S24 Ultra in your hands, you can unleash whole new levels of creativity, productivity and possibility.',
                'brand' => 'Samsung',
                'is_featured' => true,
                'specifications' => json_encode(['Screen' => '6.8" QHD+ Dynamic AMOLED 2X', 'Chip' => 'Snapdragon 8 Gen 3', 'RAM' => '12GB', 'Storage' => '512GB']),
            ],
            [
                'category' => 'Smartphones',
                'name' => 'Xiaomi 14 Ultra 5G',
                'price' => 29990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/309831/xiaomi-14-ultra-black-thumb-600x600.jpg',
                'description' => 'Xiaomi 14 Ultra. Leica Summilux optical lens. All Around Liquid Display. Snapdragon 8 Gen 3 Mobile Platform.',
                'brand' => 'Xiaomi',
                'is_featured' => false,
                'specifications' => json_encode(['Screen' => '6.73" WQHD+ AMOLED', 'Chip' => 'Snapdragon 8 Gen 3', 'RAM' => '16GB', 'Storage' => '512GB']),
            ],
            [
                'category' => 'Smartphones',
                'name' => 'OPPO Find N3 Flip',
                'price' => 22990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/309834/oppo-find-n3-flip-pink-thumb-600x600.jpg',
                'description' => 'OPPO Find N3 Flip. Pocket-sized perfection. Industry-leading triple camera system. 44W SUPERVOOC Flash Charge.',
                'brand' => 'OPPO',
                'is_featured' => false,
                'specifications' => json_encode(['Screen' => '6.8" Foldable AMOLED', 'Chip' => 'Dimensity 9200', 'RAM' => '12GB', 'Storage' => '256GB']),
            ],
            [
                'category' => 'Smartphones',
                'name' => 'Google Pixel 8 Pro',
                'price' => 24500000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/313264/google-pixel-8-pro-xanh-thumb-600x600.jpg',
                'description' => 'Google Pixel 8 Pro. The most advanced Pixel cameras yet. Google AI to help you do more, even faster.',
                'brand' => 'Google',
                'is_featured' => false,
                'specifications' => json_encode(['Screen' => '6.7" Super Actua display', 'Chip' => 'Google Tensor G3', 'RAM' => '12GB', 'Storage' => '128GB']),
            ],

            // Laptops
            [
                'category' => 'Laptops',
                'name' => 'MacBook Pro 14 M3 Pro',
                'price' => 49990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/318225/macbook-pro-14-inch-m3-pro-18gb-512gb-den-thumb-600x600.jpg',
                'description' => 'MacBook Pro. Mind-blowing. Head-turning. With M3 Pro and M3 Max, our most advanced chips for personal computers.',
                'brand' => 'Apple',
                'is_featured' => true,
                'specifications' => json_encode(['Screen' => '14.2" Liquid Retina XDR', 'Chip' => 'M3 Pro', 'RAM' => '18GB', 'Storage' => '512GB']),
            ],
            [
                'category' => 'Laptops',
                'name' => 'Dell XPS 13 Plus',
                'price' => 55000000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/308696/dell-xps-13-plus-9320-i7-71013325-thumb-600x600.jpg',
                'description' => 'Dell XPS 13 Plus. Twice as powerful as before. In the same size. It’s the most powerful 13-inch XPS laptop yet.',
                'brand' => 'Dell',
                'is_featured' => false,
                'specifications' => json_encode(['Screen' => '13.4" OLED 3.5K', 'Chip' => 'Core i7 1360P', 'RAM' => '16GB', 'Storage' => '512GB']),
            ],
            [
                'category' => 'Laptops',
                'name' => 'ASUS ROG Zephyrus G14',
                'price' => 42990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/304958/asus-rog-zephyrus-g14-ga402xv-r9-n2063w-thumb-600x600.jpg',
                'description' => 'ROG Zephyrus G14. The world’s most powerful 14-inch gaming laptop. Now with Nebula HDR Display.',
                'brand' => 'ASUS',
                'is_featured' => true,
                'specifications' => json_encode(['Screen' => '14" QHD+ 165Hz', 'Chip' => 'Ryzen 9 7940HS', 'RAM' => '16GB', 'Storage' => '1TB']),
            ],
            [
                'category' => 'Laptops',
                'name' => 'HP Spectre x360 14',
                'price' => 45990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/318182/hp-spectre-x360-14-eu0050tu-ultra-7-a19c2pa-thumb-600x600.jpg',
                'description' => 'HP Spectre x360. Automatically adjusts to your surroundings. The world’s most intelligent PC.',
                'brand' => 'HP',
                'is_featured' => false,
                'specifications' => json_encode(['Screen' => '14" 2.8K OLED', 'Chip' => 'Core Ultra 7', 'RAM' => '32GB', 'Storage' => '1TB']),
            ],
            [
                'category' => 'Laptops',
                'name' => 'Lenovo ThinkPad X1 Carbon Gen 11',
                'price' => 52000000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/309653/lenovo-thinkpad-x1-carbon-gen-11-i7-21hm001lvn-thumb-600x600.jpg',
                'description' => 'ThinkPad X1 Carbon Gen 11. Ultralight. Ultrapowerful. The 14" business laptop that sets the standard.',
                'brand' => 'Lenovo',
                'is_featured' => false,
                'specifications' => json_encode(['Screen' => '14" WUXGA', 'Chip' => 'Core i7 1355U', 'RAM' => '16GB', 'Storage' => '512GB']),
            ],

            // Tablets
            [
                'category' => 'Tablets',
                'name' => 'iPad Pro 13 inch M4',
                'price' => 37990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/522/325515/ipad-pro-13-inch-m4-wifi-256gb-den-thumb-600x600.jpg',
                'description' => 'iPad Pro. Thinpossible. The thinnest Apple product ever. Powered by the M4 chip.',
                'brand' => 'Apple',
                'is_featured' => true,
                'specifications' => json_encode(['Screen' => '13" Ultra Retina XDR', 'Chip' => 'M4', 'RAM' => '8GB', 'Storage' => '256GB']),
            ],
            [
                'category' => 'Tablets',
                'name' => 'Samsung Galaxy Tab S9 Ultra',
                'price' => 29990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/522/307176/samsung-galaxy-tab-s9-ultra-grey-thumb-600x600.jpg',
                'description' => 'Galaxy Tab S9 Ultra. The new standard for premium tablets. Dynamic AMOLED 2X display. S Pen included.',
                'brand' => 'Samsung',
                'is_featured' => false,
                'specifications' => json_encode(['Screen' => '14.6" Dynamic AMOLED 2X', 'Chip' => 'Snapdragon 8 Gen 2', 'RAM' => '12GB', 'Storage' => '256GB']),
            ],
            [
                'category' => 'Tablets',
                'name' => 'Xiaomi Pad 6S Pro',
                'price' => 14990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/522/321868/xiaomi-pad-6s-pro-grey-thumb-600x600.jpg',
                'description' => 'Xiaomi Pad 6S Pro. Big screen, big performance. 12.4" 3K 144Hz display. Snapdragon 8 Gen 2.',
                'brand' => 'Xiaomi',
                'is_featured' => false,
                'specifications' => json_encode(['Screen' => '12.4" 3K LCD', 'Chip' => 'Snapdragon 8 Gen 2', 'RAM' => '8GB', 'Storage' => '256GB']),
            ],
            [
                'category' => 'Tablets',
                'name' => 'OPPO Pad 2',
                'price' => 12990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/522/303531/oppo-pad-2-gold-thumb-600x600.jpg',
                'description' => 'OPPO Pad 2. ReadFit Screen. 7:5 aspect ratio. Dimensity 9000. 144Hz refresh rate.',
                'brand' => 'OPPO',
                'is_featured' => false,
                'specifications' => json_encode(['Screen' => '11.61" LCD 144Hz', 'Chip' => 'Dimensity 9000', 'RAM' => '8GB', 'Storage' => '256GB']),
            ],
            [
                'category' => 'Tablets',
                'name' => 'Lenovo Tab P12 Pro',
                'price' => 17990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/522/251648/lenovo-tab-p12-pro-xam-thumb-600x600.jpg',
                'description' => 'Lenovo Tab P12 Pro. Premium entertainment and productivity. 12.6" AMOLED display. Precision Pen 3.',
                'brand' => 'Lenovo',
                'is_featured' => false,
                'specifications' => json_encode(['Screen' => '12.6" AMOLED 120Hz', 'Chip' => 'Snapdragon 870', 'RAM' => '8GB', 'Storage' => '256GB']),
            ],

            // Smartwatches
            [
                'category' => 'Smartwatches',
                'name' => 'Apple Watch Ultra 2',
                'price' => 21990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/7077/314664/apple-watch-ultra-2-lte-49mm-vien-titanium-day-alpine-loop-xanh-duong-thumb-600x600.jpg',
                'description' => 'Apple Watch Ultra 2. The most rugged and capable Apple Watch. Now with the S9 SiP.',
                'brand' => 'Apple',
                'is_featured' => true,
                'specifications' => json_encode(['Case' => '49mm Titanium', 'Chip' => 'S9 SiP', 'Battery' => 'Up to 36 hours', 'Water Resistance' => '100m']),
            ],
            [
                'category' => 'Smartwatches',
                'name' => 'Samsung Galaxy Watch6 Classic',
                'price' => 8990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/7077/308405/samsung-galaxy-watch6-classic-lte-47mm-den-thumb-600x600.jpg',
                'description' => 'Galaxy Watch6 Classic. The rotating bezel is back. Track your sleep. Understand your health.',
                'brand' => 'Samsung',
                'is_featured' => false,
                'specifications' => json_encode(['Case' => '47mm Stainless Steel', 'Chip' => 'Exynos W930', 'Battery' => '425mAh', 'Water Resistance' => '5ATM']),
            ],
            [
                'category' => 'Smartwatches',
                'name' => 'Garmin Fenix 7 Pro',
                'price' => 23990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/7077/309605/garmin-fenix-7-pro-solar-titanium-47mm-den-thumb-600x600.jpg',
                'description' => 'Garmin Fenix 7 Pro. All day, every day. Conquer every hour with advanced training features.',
                'brand' => 'Garmin',
                'is_featured' => true,
                'specifications' => json_encode(['Case' => '47mm Polymer', 'Chip' => 'Garmin', 'Battery' => 'Up to 22 days', 'Water Resistance' => '10ATM']),
            ],
            [
                'category' => 'Smartwatches',
                'name' => 'Xiaomi Watch 2 Pro',
                'price' => 5990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/7077/315998/xiaomi-watch-2-pro-46mm-den-thumb-600x600.jpg',
                'description' => 'Xiaomi Watch 2 Pro. Smarter every wear. Wear OS by Google. Snapdragon W5+ Gen 1.',
                'brand' => 'Xiaomi',
                'is_featured' => false,
                'specifications' => json_encode(['Case' => '46mm Stainless Steel', 'Chip' => 'Snapdragon W5+ Gen 1', 'Battery' => '495mAh', 'Water Resistance' => '5ATM']),
            ],
            [
                'category' => 'Smartwatches',
                'name' => 'Huawei Watch GT 4',
                'price' => 5490000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/7077/315750/huawei-watch-gt-4-46mm-day-da-nau-thumb-600x600.jpg',
                'description' => 'Huawei Watch GT 4. Fashion Forward. Geometric Aesthetics. Pro-Level Health Management.',
                'brand' => 'Huawei',
                'is_featured' => false,
                'specifications' => json_encode(['Case' => '46mm Stainless Steel', 'Chip' => 'Huawei', 'Battery' => 'Up to 14 days', 'Water Resistance' => '5ATM']),
            ],

            // Audio
            [
                'category' => 'Audio',
                'name' => 'AirPods Pro (2nd Gen) USB-C',
                'price' => 5990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/54/315128/airpods-pro-2-magsafe-usb-c-thumb-600x600.jpg',
                'description' => 'AirPods Pro. Up to 2x more Active Noise Cancellation. Transparency mode. Personalized Spatial Audio.',
                'brand' => 'Apple',
                'is_featured' => true,
                'specifications' => json_encode(['Type' => 'In-ear', 'Chip' => 'H2', 'Battery' => 'Up to 6 hours', 'Charging' => 'USB-C / MagSafe']),
            ],
            [
                'category' => 'Audio',
                'name' => 'Sony WH-1000XM5',
                'price' => 7990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/54/280875/sony-wh-1000xm5-bac-thumb-600x600.jpg',
                'description' => 'Sony WH-1000XM5. Industry-leading noise cancellation. Exceptional sound and call quality.',
                'brand' => 'Sony',
                'is_featured' => true,
                'specifications' => json_encode(['Type' => 'Over-ear', 'Chip' => 'V1 + QN1', 'Battery' => 'Up to 30 hours', 'Charging' => 'USB-C']),
            ],
            [
                'category' => 'Audio',
                'name' => 'JBL PartyBox 310',
                'price' => 14900000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/2162/228839/jbl-partybox-310-thumb-600x600.jpg',
                'description' => 'JBL PartyBox 310. Huge sound, dazzling lights and unbelievable power. Take the party anywhere.',
                'brand' => 'JBL',
                'is_featured' => false,
                'specifications' => json_encode(['Type' => 'Portable Speaker', 'Power' => '240W', 'Battery' => 'Up to 18 hours', 'Water Resistance' => 'IPX4']),
            ],
            [
                'category' => 'Audio',
                'name' => 'Marshall Stanmore III',
                'price' => 9990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/2162/288421/loa-bluetooth-marshall-stanmore-iii-den-thumb-600x600.jpg',
                'description' => 'Marshall Stanmore III. The legendary one. Re-engineered for a wider soundstage.',
                'brand' => 'Marshall',
                'is_featured' => false,
                'specifications' => json_encode(['Type' => 'Home Speaker', 'Power' => '80W', 'Connectivity' => 'Bluetooth 5.2', 'Input' => 'RCA, 3.5mm']),
            ],
            [
                'category' => 'Audio',
                'name' => 'Samsung Galaxy Buds2 Pro',
                'price' => 3990000,
                'image' => 'https://cdn.tgdd.vn/Products/Images/54/285890/samsung-galaxy-buds2-pro-tim-thumb-600x600.jpg',
                'description' => 'Galaxy Buds2 Pro. 24-bit Hi-Fi audio. Intelligent 360 Audio. Active Noise Cancellation.',
                'brand' => 'Samsung',
                'is_featured' => false,
                'specifications' => json_encode(['Type' => 'In-ear', 'Chip' => 'Samsung', 'Battery' => 'Up to 5 hours', 'Water Resistance' => 'IPX7']),
            ],
        ];

        foreach ($products as $productData) {
            $category = \App\Models\Category::where('name', $productData['category'])->first();
            if ($category) {
                \App\Models\Product::create([
                    'category_id' => $category->id,
                    'name' => $productData['name'],
                    'slug' => \Illuminate\Support\Str::slug($productData['name']),
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'image' => $productData['image'],
                    'stock' => rand(10, 100),
                    'brand' => $productData['brand'],
                    'specifications' => $productData['specifications'],
                    'is_featured' => $productData['is_featured'],
                ]);
            }
        }
    }
}
