<?php require './component/head-data.php' ?>
<title>Register</title>
<?php require './component/LogRegTop.php' ?>

<div class="text-center mb-4">
  <h2 class="fw-bold mb-1">Daftar Akun</h2>
  <p class="text-grey2 mb-0">Gabung dan bagikan resep pertamamu.</p>
</div>

<form action="./php/daftar_akun.php" method="post">
  <div class="input-group mb-3">
    <span class="input-group-text"><i class="bi bi-person"></i></span>
    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
  </div>

  <div class="input-group mb-3" x-data="{ eye: false }">
    <span class="input-group-text"><i class="bi bi-lock"></i></span>
    <input :type="eye ? 'text' : 'password'" class="form-control" id="password" name="password" placeholder="Password" required />
    <button type="button" class="input-group-text cursor-pointer" @click="eye = !eye" tabindex="-1">
      <i :class="eye ? 'bi-eye-slash' : 'bi-eye-fill'"></i>
    </button>
  </div>

  <div class="input-group mb-4" x-data="{ eye: false }">
    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
    <input :type="eye ? 'text' : 'password'" class="form-control" id="password2" name="password2" placeholder="Ulangi Password" required />
    <button type="button" class="input-group-text cursor-pointer" @click="eye = !eye" tabindex="-1">
      <i :class="eye ? 'bi-eye-slash' : 'bi-eye-fill'"></i>
    </button>
  </div>

  <button type="submit" class="btn-pill w-100">Daftar</button>
</form>

<div class="text-center mt-4">
  <p class="text-grey2 small mb-0">Sudah punya akun?
    <a href="login.php" class="daftar-login_sekarang">Masuk sekarang</a>
  </p>
</div>

</div>
</div>
</div>
</body>

</html>
