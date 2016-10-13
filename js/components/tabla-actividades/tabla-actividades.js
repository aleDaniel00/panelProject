angular.module('examenApp')
    .component('tablaActividades', {
        templateUrl: './js/components/tabla-actividades/tabla-actividades.html',
        controller: function($scope, $routeParams, ActividadesService) {
            $scope.dias = [];
            $scope.estimadas = [];
            $scope.finalizadas = [];
            ActividadesService.traerPorProject($routeParams.id).then(
                function(rta) {
                    console.log(rta.data.proyecto[0]);
                    $scope.dias = rta.data.proyecto;
                    $scope.estimadas = rta.data.proyecto;
                     $scope.finalizadas = rta.data.proyecto;
                },
                function(rta) {
                    console.log(rta);
                }

            )
        }
    })