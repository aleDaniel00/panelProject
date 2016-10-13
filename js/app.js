angular
    .module('examenApp', ['ngRoute', 'ngAnimate', 'ngSanitize', 'ui.bootstrap'])

// Configuramos las rutas
.config([
    '$routeProvider',
    function($routeProvider) {
        $routeProvider
        // Cada when define una ruta en nuestra aplicación.
            .when('/', {
                // Le indicamos el template que queremos usar.
                templateUrl: 'views/home.html'
            })
            /*.when('/buenas/herramientas', {
            	// Le indicamos el template que queremos usar.
            	'templateUrl': 'views/herramientas.html',
            	'controller': 'listarHerramientasController'
            })*/
            .when('/proyectos/nuevo', {
                templateUrl: 'views/editarProyecto.html'
            })
            .when('/proyectos/:id', {
                templateUrl: 'views/proyecto.html'
            })
            .when('/proyectos/:id/editar', {
                templateUrl: 'views/editarProyecto.html'
            })
            .when('/proyectos/planificacion/:id', {
                templateUrl: 'views/planificacion.html'
            })

        /*.when('/habilidades', {
        	'templateUrl': 'views/main-container.html',
        	'controller': 'listarHerramientasController'
        })
        /*.when('/#herramientas', {
        	'template': '<h1>hola</h1>'
        })*/
        /*.when('/peliculas/:id', {
            	'templateUrl': 'views/ver-pelicula.html',
            	'controller': 'verPeliCtrl'
            })
           
            .when('/peliculas/:id/eliminar', {
            	'templateUrl': 'views/ver-pelicula.html',
            	'controller': 'eliminarPeliCtrl'
            })
            /*.when('/peliculas/:id/eliminar', {
            	'templateUrl': 'views/eliminar-pelicula.html',
            	'controller': 'eliminarPeliCtrl'
            })*/
        // Definimos una ruta por defecto, en caso que la que
        // pida el usuario no exista.
        .otherwise('/');
    }
]);