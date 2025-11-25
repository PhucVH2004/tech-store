<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechStore Admin - @yield('title')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --primary-color: #4f46e5; /* Indigo 600 */
            --primary-hover: #4338ca;
            --sidebar-bg: #0f172a;    /* Slate 900 */
            --bg-color: #f3f4f6;      /* Gray 100 */
            --text-muted: #94a3b8;
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: var(--bg-color); 
            color: #334155;
        }

        /* Sidebar Styling */
        .sidebar { 
            height: 100vh; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 260px; 
            background-color: var(--sidebar-bg); 
            padding: 20px 15px; 
            display: flex;
            flex-direction: column;
            z-index: 1000;
            box-shadow: 4px 0 24px rgba(0,0,0,0.1);
        }

        .sidebar-brand {
            color: #fff;
            font-weight: 700;
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .sidebar-brand i { color: var(--primary-color); }

        .nav-link-item {
            padding: 12px 15px; 
            text-decoration: none; 
            font-size: 0.95rem; 
            font-weight: 500;
            color: var(--text-muted); 
            display: flex; 
            align-items: center;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: all 0.3s ease;
        }

        .nav-link-item i { margin-right: 12px; font-size: 1.1rem; }

        .nav-link-item:hover { 
            color: #fff; 
            background-color: rgba(255,255,255,0.05); 
            transform: translateX(5px);
        }

        .nav-link-item.active { 
            color: #fff; 
            background-color: var(--primary-color); 
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        /* Logout Button Area */
        .mt-auto { margin-top: auto; }
        .logout-btn {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444 !important;
            border-radius: 10px;
            padding: 12px;
            transition: 0.3s;
        }
        .logout-btn:hover {
            background: #ef4444;
            color: #fff !important;
        }

        /* Content Area */
        .content { margin-left: 260px; padding: 30px; transition: 0.3s; }

        /* Top Navbar */
        .top-navbar {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
            padding: 15px 25px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid rgba(255,255,255,0.5);
        }

        .page-title { font-weight: 700; font-size: 1.25rem; margin: 0; color: #1e293b; }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-avatar {
            width: 35px;
            height: 35px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        /* Global Card Styling */
        .card { 
            border: none; 
            border-radius: 16px; 
            font-weight: 500;
        }
        .btn-primary:hover { background-color: var(--primary-hover); }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <i class="bi bi-cpu-fill"></i> TechStore
    </div>
    
    <div class="d-flex flex-column gap-1">
        <a href="{{ route('admin.dashboard') }}" class="nav-link-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        
        <div class="text-uppercase small fw-bold text-muted mt-3 mb-2 ps-3" style="font-size: 11px; letter-spacing: 1px;">Management</div>
        
        <a href="{{ route('admin.categories.index') }}" class="nav-link-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <i class="bi bi-tags"></i> Categories
        </a>
        <a href="{{ route('admin.products.index') }}" class="nav-link-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="bi bi-box-seam"></i> Products
        </a>
        <a href="{{ route('admin.orders.index') }}" class="nav-link-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
            <i class="bi bi-cart-check"></i> Orders
        </a>
    </div>

    <div class="mt-auto">
        <a href="{{ route('home') }}" target="_blank" class="nav-link-item mb-2">
            <i class="bi bi-box-arrow-up-right"></i> View Website
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link text-decoration-none w-100 text-start nav-link-item logout-btn border-0">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>
</div>

<div class="content">
    <div class="top-navbar">
        <h1 class="page-title">@yield('title')</h1>
        
        <div class="user-profile">
            <div class="text-end me-2 d-none d-sm-block">
                <div class="fw-bold text-dark" style="font-size: 14px;">{{ Auth::user()->name }}</div>
                <div class="text-muted" style="font-size: 12px;">Administrator</div>
            </div>
            <div class="user-avatar">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
        </div>
    </div>

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        timer: 3000,
        showConfirmButton: false,
        customClass: {
            popup: 'rounded-4'
        }
    });
</script>
@endif

</body>
</html>