<!DOCTYPE html>
<html>
<head>
  <title>Login Arsip</title>
</head>
<body>
  <h2>Login Sistem Arsip Digital</h2>
  
  <?php if (!empty($error)): ?>
    <p style="color:red;"><?= $error ?></p>
  <?php endif; ?>

  <form method="post" action="<?= site_url('auth/login') ?>">
    <label>Username</label><br>
    <input type="text" name="username" required><br>
    <label>Password</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
  </form>
</body>
</html>
