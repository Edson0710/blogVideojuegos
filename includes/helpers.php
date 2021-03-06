<?php 
    function mostrarError($errores, $campo){
        $alerta = '';
        if(isset($errores[$campo]) && !empty($campo)){
            $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
        } 

        return $alerta;
    }

    function borrarErrores(){
        $borrado = false;
        $_SESSION['errores'] = null;
        $_SESSION['completado'] = null;
        $_SESSION['errores_entrada'] = null;
        if(isset($_SESSION['errores']) || isset($_SESSION['completado'])){
            $borrado = session_unset();
        }
        
        return $borrado;
    }

    function conseguirCategorias($conexion){
        $sql = "SELECT * FROM categorias ORDER BY id ASC;";
        $query = mysqli_query($conexion, $sql);

        $result = false;
        if($query && mysqli_num_rows($query) >= 1){
            $result = $query;
        }

        return $result;
    }

    function conseguirEntradas($conexion){
        $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ORDER BY e.id DESC LIMIT 4";
        $entradas = mysqli_query($conexion, $sql);
        $resultado = array();
        if($entradas && mysqli_num_rows($entradas) >= 1){
            $resultado = $entradas;
        }

        return $entradas;
    }

?>