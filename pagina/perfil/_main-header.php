<header>
        <!-- <div class="logo-place"></a><img src="assets/DISCOSTWOlogo.png"></div> -->
        <div class="logo2-place"> <a href="../../index.php"> <img src="../../assets/DISCOSTWOletra.png"></a></div>
        <div class="search-place">
            <input type="text" id="idbusqueda" placeholder="Encuentra todo lo que necesitas..." value="<?php if (isset($_GET['text'])) {
                                                                                                            echo $_GET['text'];
                                                                                                        } else {
                                                                                                            echo '';
                                                                                                        } ?>">
            <button class="btn-main btn-search" onclick="search_producto()"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        <div class="options-place">
            <!-- BOTÓN A LOGIN -->
            <?php
            if (isset($_SESSION["NombreCliente"])) {
                // SI LA SESIÓN EXISTE, NO SE MUESTRAN LOS BOTONES
                // SE MUESTRA EL NOMBRE DEL USUARIO Y EL ICONO

                // SI SE PINCHA EN EL ICONO, SE HACE LOGOUT
                echo
                    '<div class="item-option">
                   <a href="/perfil.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <p>' . $_SESSION["NombreCliente"] . '</p></div></a>
                    <a href="../../servicios/logout.php"><div  title="Cerrar sesión" class="item-option"><i class="fa fa-sign-in" aria-hidden="true"></i></a></div>';
            } else {
            ?>
                <div class="item-option" title="Login"><a href="../log/login.php"><i class="fa fa-user-circle-o" aria-hidden="true"></a></i></div>
                
            <?php
                // SE CIERRA EL ELSE
                // SOLO SE MUESTRAN LOS BOTONES SI NO HAY SESIÓN
            }
            ?>
            <div class="item-option" title="Mis compras">
                
                <a href="../pedido/pedido.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            </div>
        </div>
    </header>