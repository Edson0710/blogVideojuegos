<!-- SIDEBAR -->
<?php require_once 'includes/helpers.php';?>
<aside id="sidebar">
    <div id="login" class="bloque">
        <h3>Identificate</h3>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email"/>

            <label for="pass">Contraseña</label>
            <input type="password" name="pass"/>

            <input type="submit" value="Entrar"/>
        </form>
    </div>

    <div id="register" class="bloque">
        <h3>Registrate</h3>
        <!-- Mostrar errores -->
        <?php if(isset($_SESSION['completado'])):?>
            <div class="alerta alerta-exito">
                <?=$_SESSION['completado']?>
            </div>
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-error">
                <?=$_SESSION['errores']['general']?>
            </div>
        <?php endif; ?>
        <form action="registro.php" method="POST">
            <label for="name">Nombre</label>
            <input type="text" name="name"/>
            <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'], 'name'):'';?>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos"/>
            <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'], 'apellidos'):'';?>
            
            <label for="email">Email</label>
            <input type="email" name="email"/>
            <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'], 'email'):'';?>

            <label for="pass">Contraseña</label>
            <input type="password" name="pass"/>
            <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'], 'pass'):'';?>

            <input type="submit" value="Registrar" name="submit"/>
        </form>
        <?php borrarErrores();?>
    </div>
</aside>