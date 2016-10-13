angular.module('examenApp')
    .component('formProyecto', {
        templateUrl: './js/components/form-proyecto/form-proyecto.html',
        controller: function($scope, $routeParams, ProyectosService) {
            $scope._titulo = "Editar proyecto";
            $scope.proyecto = {};
            $scope.estadoMensaje = null;
            $scope.estado = null;
            ProyectosService.traerPorId($routeParams.id).then(
                function(rta) {
                    c(rta.data[0]);
                    $scope.proyecto = rta.data[0];
                },
                function(rta) {
                    console.log('error');
                }
            )
            $scope.grabar = function() {
                c($routeParams.id);
                if ($routeParams.id) {
                    ProyectosService.editar($routeParams.id, $scope.proyecto)
                        .then(function(rta) {
                            console.log(rta);
                            $scope.estado = rta.data.status;
                            $scope.estadoMensaje = rta.data.message;
                        }, function(rta) {
                            console.log(rta);
                        });
                } else {
                    ProyectosService.grabar($scope.proyecto)
                        .then(function(rta) {
                            console.log(rta);
                            $scope.estado = rta.data.status;
                            $scope.estadoMensaje = rta.data.message;
                        }, function(rta) {
                            console.log(rta);
                        });
                }
            }

        }
    });