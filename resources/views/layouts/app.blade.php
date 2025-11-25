<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechStore - @yield('title', 'Best Tech Deals')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'TechStore') - Premium Tech Experience</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --primary: #0f172a;      /* Slate 900 */
            --primary-light: #334155;
            --accent: #4f46e5;       /* Indigo 600 */
            --accent-hover: #4338ca;
            --bg-light: #f8fafc;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            --card-hover-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.025);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary);
            letter-spacing: -0.5px;
        }

        .navbar-brand i { color: var(--accent); }

        .nav-link {
            font-weight: 500;
            color: var(--text-dark);
            margin: 0 10px;
            transition: color 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--accent);
        }

        .btn-primary {
            background-color: var(--accent);
            border-color: var(--accent);
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--accent-hover);
            border-color: var(--accent-hover);
            transform: translateY(-1px);
        }
        
        .btn-outline-primary {
            color: var(--accent);
            border-color: var(--accent);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--accent);
            border-color: var(--accent);
        }

        .badge-cart {
            background-color: var(--accent);
            font-size: 0.7rem;
        }

        /* Main Content */
        main { flex: 1; padding-top: 2rem; padding-bottom: 4rem; }

        /* Footer */
        footer {
            background-color: var(--primary);
            color: #fff;
            padding: 4rem 0 2rem;
        }

        footer h5 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        footer a {
            color: #94a3b8;
            text-decoration: none;
            display: block;
            margin-bottom: 0.8rem;
            transition: color 0.2s;
        }

        footer a:hover { color: #fff; }
        
        footer .social-icon {
            font-size: 1.2rem;
            margin-right: 1rem;
            color: #94a3b8;
        }
        
        footer .social-icon:hover { color: #fff; }

        /* Utilities */
        .text-accent { color: var(--accent); }
        .bg-accent { background-color: var(--accent); }
        
        .card {
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-hover-shadow);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-cpu-fill me-2"></i>TechStore
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">Shop</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Categories</a>
                        <ul class="dropdown-menu border-0 shadow-lg rounded-3 mt-2">
                            @foreach(\App\Models\Category::all() as $cat)
                                <li><a class="dropdown-item py-2 px-4" href="{{ route('products.index', ['category' => $cat->id]) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('cart.index') }}" class="btn btn-light position-relative rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                        <i class="bi bi-cart3 fs-5"></i>
                        @if(session('cart') && count(session('cart')) > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-cart">
                                {{ count(session('cart')) }}
                            </span>
                        @endif
                    </a>

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4">Register</a>
                    @else
                        <div class="dropdown">
                            <a class="btn btn-light dropdown-toggle d-flex align-items-center gap-2 rounded-pill px-3" href="#" role="button" data-bs-toggle="dropdown">
                                <div class="bg-accent text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; font-size: 0.8rem;">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="fw-medium">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 mt-2">
                                @if(Auth::user()->is_admin)
                                    <li><a class="dropdown-item py-2" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Admin Panel</a></li>
                                @endif
                                <li><a class="dropdown-item py-2" href="{{ route('orders.index') }}"><i class="bi bi-box-seam me-2"></i>My Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item py-2 text-danger" type="submit"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="text-white mb-3"><i class="bi bi-cpu-fill me-2 text-accent"></i>TechStore</h5>
                    <p class="text-muted mb-4">Your premium destination for the latest technology. We provide high-quality gadgets with exceptional service.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <h5>Shop</h5>
                    <a href="{{ route('products.index') }}">All Products</a>
                    <a href="#">New Arrivals</a>
                    <a href="#">Best Sellers</a>
                    <a href="#">Deals</a>
                </div>
                <div class="col-lg-2 col-6">
                    <h5>Support</h5>
                    <a href="#">Contact Us</a>
                    <a href="#">FAQs</a>
                    <a href="#">Shipping Info</a>
                    <a href="#">Returns</a>
                </div>
                <div class="col-lg-4">
                    <h5>Stay Updated</h5>
                    <p class="text-muted small">Subscribe to our newsletter for the latest tech news and exclusive offers.</p>
                    <form class="d-flex gap-2">
                        <input type="email" class="form-control" placeholder="Enter your email">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="border-top border-secondary mt-5 pt-4 text-center text-muted small">
                <p>&copy; {{ date('Y') }} TechStore. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false,
            customClass: { popup: 'rounded-4' }
        });
    </script>
    @endif
    
    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            customClass: { popup: 'rounded-4' }
        });
    </script>
    @endif

    @yield('scripts')
</body>
</html>
