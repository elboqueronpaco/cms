<h1>Registro de usuario</h1>
<h2>Por favor ingresa sus datos para crearte una cuenta</h2>
<?php if (isset($_SESSION['message'])) : ?>
    <div><?= $_SESSION['message'] ?></div>
<?php endif; ?>
<form action="<?= urlBase() ?>?controller=users&action=register" method="POST" name="registroForm" class="RegisterForm" id="registroForm">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="lastname">Apellidos</label>
        <input type="text" id="lastname" name="lastname">
    </div>
    <div class="form-group">
        <label for="username">Apodos</label>
        <input type="text" id="username" name="username">
    </div>
    <div class="form-group">
        <label for="email">Correo</label>
        <input type="email" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="password2">Confirmar Contraseña</label>
        <input type="password" id="password2" name="password2">
    </div>
    
    <button type="submit" name="register">Registrate</button>
</form>