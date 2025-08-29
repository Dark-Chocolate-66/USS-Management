<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Register • Ultrasoft Systems</title>

  {{-- Bootstrap & Icons --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --ultra-purple:#6f42c1;
      --ultra-purple-2:#8b5cf6;
      --ultra-purple-3:#a78bfa;
      --ultra-bg:#f7f5ff;
      --ultra-dark:#1f1633;
    }

    /* Page background */
    body{
      min-height:100vh;
      background:
        radial-gradient(900px 500px at 100% -10%, rgba(167,139,250,.18), transparent 60%),
        radial-gradient(900px 500px at -10% 110%, rgba(111,66,193,.20), transparent 60%),
        linear-gradient(180deg, #ffffff 0%, var(--ultra-bg) 100%);
      color: var(--ultra-dark);
      font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    /* Brand header */
    .brand-wrap{ display:flex; align-items:center; gap:.75rem; }
    .brand-badge{
      width:52px; height:52px; border-radius:14px;
      display:flex; align-items:center; justify-content:center;
      background: linear-gradient(135deg, var(--ultra-purple), var(--ultra-purple-2));
      color:#fff; box-shadow: 0 10px 24px rgba(111,66,193,.35);
      transform: translateZ(0);
    }
    .brand-badge i{ font-size:1.25rem; }
    .brand-title{ margin:0; line-height:1.1; font-weight:800; letter-spacing:.2px; color:#fff; text-shadow:0 2px 14px rgba(0,0,0,.18); }
    .brand-sub{ margin:0; color:#fff; opacity:.95; font-weight:500; }

    /* Auth card */
    .auth-card{
      border:0; border-radius:1.4rem; overflow:hidden;
      background: rgba(255,255,255,.82);
      backdrop-filter: blur(8px);
      box-shadow: 0 24px 70px rgba(111,66,193,.18);
      transform: translateZ(0);
      transition: transform .18s ease, box-shadow .25s ease;
    }
    .auth-card:hover{ transform: translateY(-4px); box-shadow:0 30px 90px rgba(111,66,193,.25); }

    .card-head-gradient{
      background: linear-gradient(135deg, var(--ultra-purple), var(--ultra-purple-2), var(--ultra-purple-3));
      border:0; padding:2rem 2rem 1.25rem; position:relative;
      animation: shift 8s ease-in-out infinite alternate;
    }
    @keyframes shift{
      0%{ filter: hue-rotate(0deg) brightness(1); }
      100%{ filter: hue-rotate(-12deg) brightness(1.02); }
    }

    /* Floating inputs */
    .form-floating>.form-control{
      padding: 1.25rem .9rem .45rem .9rem;
      border-radius:.9rem;
      border:1px solid #e8defc;
      background:#fff;
      transition: border-color .15s ease, box-shadow .15s ease, transform .08s ease;
    }
    .form-control:hover{
      transform: translateY(-1px);
      box-shadow: 0 6px 14px rgba(111,66,193,.08);
    }
    .form-control:focus{
      border-color: var(--ultra-purple);
      box-shadow: 0 0 0 .25rem rgba(111,66,193,.15);
    }
    .invalid-feedback{ display:block; }

    /* Buttons */
    .btn-ultra{
      border:0; color:#fff;
      background-image: linear-gradient(135deg, var(--ultra-purple), var(--ultra-purple-2));
      border-radius: .9rem; padding:.9rem 1.05rem;
      box-shadow: 0 14px 28px rgba(111,66,193,.25);
      transition: transform .12s ease, box-shadow .2s ease, filter .2s ease;
      position: relative; overflow: hidden;
    }
    .btn-ultra:hover{
      transform: translateY(-2px);
      box-shadow: 0 22px 40px rgba(111,66,193,.35);
      filter: brightness(1.05); color:#fff;
    }
    .btn-ultra::after{
      content:""; position:absolute; inset:-2px; border-radius:inherit;
      box-shadow: 0 0 0 0 rgba(167,139,250,.0); transition: box-shadow .35s ease; pointer-events:none;
    }
    .btn-ultra:hover::after{ box-shadow: 0 0 0 6px rgba(167,139,250,.18); }

    .btn-outline-ultra{
      border-radius:.9rem; border:2px solid rgba(111,66,193,.35);
      color: var(--ultra-purple); background:#fff;
      transition: all .15s ease, transform .12s ease;
    }
    .btn-outline-ultra:hover{
      color:#fff; transform: translateY(-2px);
      background: linear-gradient(135deg, var(--ultra-purple), var(--ultra-purple-2));
      border-color: transparent; box-shadow: 0 14px 28px rgba(111,66,193,.22);
    }

    /* Links */
    .link-ultra{
      color: var(--ultra-purple); text-decoration:none; position:relative; font-weight:600;
    }
    .link-ultra::after{
      content:""; position:absolute; left:0; bottom:-2px; height:2px; width:0;
      background: linear-gradient(90deg, var(--ultra-purple), var(--ultra-purple-2));
      transition: width .2s ease;
    }
    .link-ultra:hover::after{ width:100%; }
    .link-ultra:hover{ color: var(--ultra-purple-2); }

    /* Password eye buttons */
    .pw-toggle{
      position:absolute; right:.6rem; top:50%; transform: translateY(-50%);
      border:0; background:transparent; color:#6b6b6b;
      padding:.35rem .5rem; border-radius:.6rem;
      transition: background .15s ease, color .15s ease;
    }
    .pw-toggle:hover{ background:#f3edff; color: var(--ultra-purple); }

    .legal-note{ color:#6b6b6b; font-size:.92rem; }
  </style>
</head>
<body>

<main class="container py-5">
  <div class="row justify-content-center align-items-center" style="min-height:90vh;">
    <div class="col-12 col-lg-6 col-xl-5">
      <div class="card auth-card">
        <div class="card-head-gradient">
          <div class="brand-wrap">
            <div class="brand-badge"><i class="bi bi-lightning-charge-fill"></i></div>
            <div>
              <h1 class="brand-title h4 mb-1">Ultrasoft Systems</h1>
              <p class="brand-sub mb-0">Create Your Account</p>
            </div>
          </div>
        </div>

        <div class="card-body p-4 p-md-5">
          <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf

            {{-- Name --}}
            <div class="form-floating mb-3">
              <input type="text"
                     id="name"
                     name="name"
                     value="{{ old('name') }}"
                     class="form-control @error('name') is-invalid @enderror"
                     placeholder="Your name"
                     required
                     autocomplete="name">
              <label for="name">Full name</label>
              @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Email --}}
            <div class="form-floating mb-3">
              <input type="email"
                     id="email"
                     name="email"
                     value="{{ old('email') }}"
                     class="form-control @error('email') is-invalid @enderror"
                     placeholder="name@example.com"
                     required
                     autocomplete="username">
              <label for="email">Email address</label>
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Password --}}
            <div class="form-floating mb-3 position-relative">
              <input type="password"
                     id="password"
                     name="password"
                     class="form-control @error('password') is-invalid @enderror"
                     placeholder="••••••••"
                     required
                     autocomplete="new-password">
              <label for="password">Password</label>
              <button type="button" class="pw-toggle" onclick="togglePassword('password','pwIcon1')" aria-label="Show password">
                <i id="pwIcon1" class="bi bi-eye"></i>
              </button>
              @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="form-floating mb-3 position-relative">
              <input type="password"
                     id="password_confirmation"
                     name="password_confirmation"
                     class="form-control @error('password_confirmation') is-invalid @enderror"
                     placeholder="••••••••"
                     required
                     autocomplete="new-password">
              <label for="password_confirmation">Confirm password</label>
              <button type="button" class="pw-toggle" onclick="togglePassword('password_confirmation','pwIcon2')" aria-label="Show password">
                <i id="pwIcon2" class="bi bi-eye"></i>
              </button>
              @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Actions --}}
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-ultra btn-lg">
                <i class="bi bi-person-check me-1"></i> Create account
              </button>
              <a href="{{ route('login') }}" class="btn btn-outline-ultra btn-lg">
                <i class="bi bi-box-arrow-in-right me-1"></i> Already registered? Log in
              </a>
            </div>
          </form>
        </div>
      </div>

      <p class="text-center legal-note mt-3 mb-0">
        &copy; {{ date('Y') }} Ultrasoft Systems — All rights reserved.
      </p>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function togglePassword(inputId, iconId){
    const input = document.getElementById(inputId);
    const icon  = document.getElementById(iconId);
    const isPwd = input.getAttribute('type') === 'password';
    input.setAttribute('type', isPwd ? 'text' : 'password');
    icon.classList.toggle('bi-eye', !isPwd);
    icon.classList.toggle('bi-eye-slash', isPwd);
  }
</script>
</body>
</html>
