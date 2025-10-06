<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= isset($user) ? 'Edit User' : 'Add User' ?></title>
  <style>
    body{font-family:Arial;padding:20px}
    form input{padding:6px;margin-right:8px}
    .btn{padding:6px 10px;border-radius:4px}
    .msg{color:green;font-weight:bold}
    .error{color:red;font-weight:bold}
  </style>
</head>
<body>
  <h2><?= isset($user) ? 'Edit User' : 'Add User' ?></h2>

  <?php if(isset($validation)): ?>
    <div class="error"><?= $validation->listErrors() ?></div>
  <?php endif; ?>

  <form method="post" action="<?= isset($user) ? site_url('/users/edit/'.$user['id']) : site_url('/users/create') ?>">
    <?= csrf_field() ?>
    <input type="text" name="name" placeholder="Name" required value="<?= isset($user) ? esc($user['name']) : set_value('name') ?>">
    <input type="email" name="email" placeholder="Email" required value="<?= isset($user) ? esc($user['email']) : set_value('email') ?>">
    <button class="btn" type="submit"><?= isset($user) ? 'Update' : 'Add' ?></button>
    <a href="<?= site_url('/users') ?>" style="margin-left:10px;">Back</a>
  </form>
</body>
</html>
