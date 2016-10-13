angular.module('examenApp')
    .service('ActividadesService', [
        '$http',
        function($http) {

            this.traerPorProject = function(id) {
                return $http.get('API/GestionProyecto/planificacion.php?id=' + id);
            };
        }
    ]);