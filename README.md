# API_MVC_PHP
API REST en PHP usando MVC: La base de datos de refranes y su estructura


El proyecto se organiza de acuerdo con el patrón MVC, siguiendo esta estructura de carpetas:

app/controllers/RefranController.php: Controlador encargado de manejar las solicitudes relacionadas con los refranes.

app/models/Refran.php: Modelo que define la lógica de acceso a la base de datos para los refranes.

app/core/Database.php: Gestor de la conexión a la base de datos.

public/index.php: Punto de entrada de la API, donde se enrutan las solicitudes al controlador adecuado.

