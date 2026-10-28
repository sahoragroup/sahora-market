<?php require 'includes/config.php';
if (user()) redirect('account.php');
$error = '';
$next = ($_GET['next'] ?? $_POST['next'] ?? 'account.php');
if (!in_array($next, ['checkout.php', 'account.php'], true)) $next = 'account.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    check_csrf();
    $s = db()->prepare('SELECT id,name,password_hash,role FROM users WHERE email=?');
    $s->execute([strtolower(trim($_POST['email'] ?? ''))]);
    $u = $s->fetch();
    if ($u && password_verify($_POST['password'] ?? '', $u['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['user'] = ['id' => (int)$u['id'], 'name' => $u['name'], 'role' => $u['role']];
        redirect($next);
    } else $error = 'Invalid email or password.';
}
$pageTitle = 'Sign In';
require 'includes/header.php'; ?><section class="container section-space">
    <div class="auth-panel">
        <div class="eyebrow">WELCOME BACK</div>
        <h1 class="page-title">Sign <em>In</em></h1><?php if ($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?><form method="post"><input type="hidden" name="csrf" value="<?= csrf() ?>"><input type="hidden" name="next" value="<?= e($next) ?>"><label class="form-label mt-3">Email</label><input class="form-control" type="email" name="email" required><label class="form-label mt-3">Password</label><input class="form-control" type="password" name="password" required><button class="btn btn-gold w-100 mt-4">SIGN IN</button></form>
        <p class="mt-3">New here? <a class="text-gold" href="register.php">Create account</a></p>
    </div>
</section><?php require 'includes/footer.php'; ?>