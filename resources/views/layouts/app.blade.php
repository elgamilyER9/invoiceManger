<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-3">
    <div class="container">
      <a class="navbar-brand fw-semibold d-flex align-items-center gap-2" href="{{ url('/home') }}">
        <i class="bi bi-grid-1x2-fill text-primary"></i>  {{ __("DASHBOARD") }}
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
        aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarMain">
        <!-- Left Side -->
        <ul class="navbar-nav me-auto gap-2">
         
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('welcome.*') ? 'active' : '' }}" href="{{ route('welcome') }}">
                          <i class="bi bi-house-door"></i>
  {{ __("Welcome") }}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                          <i class="bi bi-person-circle"></i>
  {{ __("Users") }}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('clients.*') ? 'active' : '' }}" href="{{ route('clients.index') }}">
                          <i class="bi bi-people"></i>
 {{ __("Clients") }}
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('invoices.*') ? 'active' : '' }}" href="{{ route('invoices.index') }}">
                          <i class="bi bi-receipt"></i>
 Invoices
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('invoiceItems.*') ? 'active' : '' }}" href="{{ route('invoiceItems.index') }}">
                          <i class="bi bi-collection"></i>
  {{ __("invoiceItems") }}
            </a>
          </li> 
         
        </ul>

        <!-- Right Side -->
        <ul class="navbar-nav ms-auto align-items-center gap-3">
     

          {{-- Dark Mode --}}
          <li class="nav-item">
            <button id="themeToggle" class="btn btn-outline-secondary border-0">
              <i class="bi bi-moon-stars" id="themeIcon"></i>
            </button>
          </li>

          {{-- User --}}
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="userDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-5"></i>
                <span>{{ Auth::user()->name }}</span>
                <small class="text-muted">#{{ Auth::user()->id }}</small>
              </a>
              <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4"
                aria-labelledby="userDropdown">
                <li>
                  <a class="dropdown-item d-flex align-items-center gap-2"
                    href="{{ route('users.show', Auth::user()->id) }}">
                    <i class="bi bi-person"></i> {{ __('PROFILE') }}
                  </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <a class="dropdown-item text-danger d-flex align-items-center gap-2"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </li>
              </ul>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    @yield('content')
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Dark Mode Toggle
    const toggleBtn = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme === 'dark') {
      document.body.classList.add('dark-mode');
      themeIcon.classList.replace('bi-moon-stars', 'bi-sun');
    }

    toggleBtn.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
      const isDark = document.body.classList.contains('dark-mode');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      themeIcon.classList.toggle('bi-sun', isDark);
      themeIcon.classList.toggle('bi-moon-stars', !isDark);
    });
  </script>

  <style>
    /* Base Navbar */
    .navbar {
      border-radius: 20px;
      margin: 10px auto;
      max-width: 95%;
      background: #f8f9fa !important;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      transition: 0.3s;
    }

    .nav-link {
      color: #444 !important;
      border-radius: 12px;
      padding: 8px 14px;
      transition: all 0.25s ease-in-out;
      font-weight: 500;
    }

    .nav-link:hover {
      background-color: rgba(13, 110, 253, 0.08);
      color: #0d6efd !important;
    }

    /* Active link */
    .nav-link.active {
      background: linear-gradient(135deg, #7cb8f7, #4086ec);
      color: #fff !important;
      box-shadow: 0 3px 10px rgba(64,134,236,0.3);
    }

    /* Dropdown Style */
    .dropdown-menu {
      border-radius: 15px;
      background-color: #fff;
      animation: fadeIn 0.25s ease-in-out;
    }

    .dropdown-item:hover {
      background-color: rgba(13,110,253,0.1);
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(8px);}
      to {opacity: 1; transform: translateY(0);}
    }

    /* Dark Mode */
    body.dark-mode {
      background-color: #0d0d0d;
      color: #fff;
    }

    body.dark-mode .navbar {
      background-color: #1c1c1c !important;
      box-shadow: 0 0 10px rgba(255,255,255,0.05);
    }

    body.dark-mode .nav-link,
    body.dark-mode .navbar-brand,
    body.dark-mode .dropdown-toggle,
    body.dark-mode .nav-link i,
    body.dark-mode .dropdown-item,
    body.dark-mode .dropdown-item i,
    body.dark-mode .dropdown-item span {
      color: #fff !important;
    }

    body.dark-mode .nav-link:hover {
      background-color: rgba(255,255,255,0.1);
      color: #fff !important;
    }

    body.dark-mode .nav-link.active {
      background: linear-gradient(135deg, #2196f3, #1976d2);
      color: #fff !important;
    }

    body.dark-mode .dropdown-menu {
      background-color: #242424 !important;
      color: #fff;
    }

    body.dark-mode .dropdown-item:hover {
      background-color: #2f2f2f !important;
    }

    body.dark-mode .text-muted {
      color: #ccc !important;
    }
  </style>
</body>
</html>
