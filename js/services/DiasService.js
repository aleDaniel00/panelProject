angular.module('examenApp')
    .service('DiasService', [
        '$http',
        function($http) {

            this.traerTodos = function() {
                return $http.get('API/GestionProyecto/diasPlanificados.php');
            };

        }
    ]);