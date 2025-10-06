<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Users - CI4 CRUD</title>
  <style>
    body{font-family:Arial;padding:20px}
    table{width:100%;border-collapse:collapse;margin-top:20px}
    th,td{border:1px solid #ddd;padding:8px;text-align:left}
    th{background:#f2f2f2}
    .btn{padding:6px 10px;border-radius:4px;text-decoration:none;color:#fff}
    .btn-add{background:#007bff}
    .btn-edit{background:#4CAF50}
    .btn-del{background:#f44336}
    .msg{color:green;font-weight:bold}
    .error{color:red;font-weight:bold}
  </style>
</head>
<body>
  <h2>Users</h2>

  <?php if(session()->get('msg')): ?>
    <p class="msg"><?= session()->get('msg') ?></p>
  <?php endif; ?>
  <?php if(session()->get('error')): ?>
    <p class="error"><?= session()->get('error') ?></p>
  <?php endif; ?>

  <a class="btn btn-add" href="<?= site_url('/users/create') ?>">Add User</a>

  <table>
    <thead>
      <tr><th>No</th><th>Name</th><th>Email</th><th>Actions</th></tr>
    </thead>
    <tbody>
    <?php if(empty($users)): ?>
      <tr><td colspan="4" style="text-align:center">No records found</td></tr>
    <?php else: $i=1; foreach($users as $u): ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= esc($u['name']) ?></td>
        <td><?= esc($u['email']) ?></td>
        <td>
          <a class="btn btn-edit" href="<?= site_url('/users/edit/'.$u['id']) ?>">Edit</a>
          <a class="btn btn-del" href="<?= site_url('/users/delete/'.$u['id']) ?>" onclick="return confirm('Delete this user?');">Delete</a>
        </td>
      </tr>
    <?php endforeach; endif; ?>
    </tbody>
  </table>
</body>
</html>
