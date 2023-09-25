<div class="container">
    <h5 class="text-center">Login for PMB UNIYAP</h5><hr>
    <?php Flasher::flash('admin') ?? false ?>
    <form action="<?= BASEURL ?>/admin/auth" method="post">
      <div class="form-group">
        <label for="user">Username</label>
        <input type="text" id="user" name="username" placeholder="Masukkan username Anda" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Masukkan password Anda" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit">Login</button>
      </div>
    </form>
</div>