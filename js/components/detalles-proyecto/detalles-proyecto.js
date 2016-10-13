angular.module('examenApp')
    .component('detallesProyecto', {
        templateUrl: './js/components/detalles-proyecto/detalles-proyecto.html',
        controller: function($scope, $routeParams, ProyectosService) {
            $scope.proyecto = {};
            ProyectosService.traerPorId($routeParams.id).then(
                function(rta) {
                    c(rta.data[0]);
                    $scope.proyecto = rta.data[0];
                },
                function(rta) {
                    console.log('error');
                }
            )

        }
    })