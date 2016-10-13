angular.module('examenApp')
    .service('ProyectosService', [
        '$http',
        function($http) {

            this.traerTodos = function() {
                return $http.get('API/GestionProyecto/projectsAll.php');
            };
            this.traerPorId = function(id) {
                return $http.get('API/GestionProyecto/projectId.php?id=' + id);
            };
            this.editar = function(id, data) {
                return $http.put('API/GestionProyecto/modificarProject.php?id=' + id, data);
            };
            this.grabar = function(proyecto) {
                alert();
                return $http.post('API/GestionProyecto/grabarProject.php', proyecto);
            };
        }
    ]);