<p align="center"><a href="https://redpronet.com" target="_blank"><img src="https://img1.wsimg.com/isteam/ip/807b26c1-85ec-45e4-b134-8e1e148e7d7c/logo%203.png/:/rs=w:314,h:117,cg:true,m/cr=w:314,h:117/qt=q:95" width="400" alt="PRONET"></a></p>

<hr>


## Pronet tipo de cambio README

Tipos de cambio.
<li>Desarrollado por: Axel Sarceño  </li>
<li>Email:axel.hernan@hotmail.es  </li>
<li>Instalacion </li>
<ul>
    <li>Uso de PHP 7.3 o superior </li>
    <code>composer update</code> <br>
    <li>Nodejs 20.x o superior </li>
    <code>npm install </code>
    <li>Base de datos MariaDB </li>
    <code>php artisan key:generate </code>
    <li>Base de datos MariaDB </li>
    <li>Para migraciones una vez conectado </li>
    <code>php artisan migrate:fresh </code>
    <li>Uso de vuejs2 </li>
    <li>Archivos claves</li>
        <ul>
            <li>Rutas: web.pjp</li>
            <li>Controladores:</li>
                <ul>
                    <li>Network/ServicioSoapControoler.php</li>
                    <li>PeticionesControoler.php</li>
                </ul>
            <li>Vistas:</li>
            <ul>
                    <li>Resources/views/js/components/tipoCambio/peticionesComponent.vue</li>
                    <li>PeticionesControoler.php</li>
            </ul>
            <li>Ruta para validar el extra: /tipo-cambio-fechainicial/1-01-2024 </li>
            <p>Esto le mostrara el listado ordenado de forma descendente por el TC de venta en formato Json</p>
        </ul>
            
        
    
</ul>

