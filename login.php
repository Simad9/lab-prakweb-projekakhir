<?php require './component/head-data.php' ?>
<title>Login</title>
<?php require './component/LogRegTop.php' ?>

<div class="text-center mb-4">
  <h2 class="fw-bold mb-1">Selamat Datang</h2>
  <p class="text-grey2 mb-0">Masuk untuk mulai memasak.</p>
</div>

<form action="./php/cek_login.php" method="post">
  <div class="input-group mb-3">
    <span class="input-group-text"><i class="bi bi-person"></i></span>
    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required />
  </div>

  <div class="input-group mb-1" x-data="{ eye: false }">
    <span class="input-group-text"><i class="bi bi-lock"></i></span>
    <input :type="eye ? 'text' : 'password'" class="form-control" id="password" name="password" placeholder="Password" required />
    <button type="button" class="input-group-text cursor-pointer" @click="eye = !eye" tabindex="-1">
      <i :class="eye ? 'bi-eye-slash' : 'bi-eye-fill'"></i>
    </button>
  </div>

  <div class="d-flex justify-content-end mb-3">
    <a href="#" class="text-13px forget-hover">Lupa password?</a>
  </div>

  <button type="submit" class="btn-pill w-100">Masuk</button>
</form>

<div class="demo-akun mt-4">
  <p class="text-center small text-grey2 mb-2"><i class="bi bi-info-circle me-1"></i>Akun demo (klik untuk mengisi otomatis):</p>
  <div class="d-flex flex-column gap-2">
    <button type="button" class="demo-chip" onclick="isiAkun('wijdan','wijdan123')">
      <span class="fw-bold">wijdan</span>
      <span class="text-grey2">/ wijdan123</span>
      <i class="bi bi-arrow-right ms-auto"></i>
    </button>
    <button type="button" class="demo-chip" onclick="isiAkun('123','123')">
      <span class="fw-bold">123</span>
      <span class="text-grey2">/ 123</span>
      <i class="bi bi-arrow-right ms-auto"></i>
    </button>
  </div>
</div>

<div class="text-center mt-4">
  <div class="d-flex align-items-center gap-3 mb-3">
    <span class="line-divider"></span>
    <span class="text-grey2 small">atau masuk dengan</span>
    <span class="line-divider"></span>
  </div>

  <div class="d-flex justify-content-center gap-2 mb-3">
    <a href="#" class="icons"><img src="./icons/google.svg" alt="Google"></a>
    <a href="#" class="icons"><img src="./icons/github.svg" alt="GitHub"></a>
    <a href="#" class="icons"><img src="./icons/facebook.svg" alt="Facebook"></a>
  </div>

  <p class="text-grey2 small mb-0">Belum punya akun?
    <a href="register.php" class="daftar-login_sekarang">Daftar sekarang</a>
  </p>
</div>

<script>
  function isiAkun(u, p) {
    document.getElementById('username').value = u;
    document.getElementById('password').value = p;
  }
</script>

</div>
</div>
</div>
</body>

</html>
