function atController($scope, ProyectosService) {
    var ctrl = this;
    ProyectosService.traerTodos().then(
        function(rta) {
            console.log(ctrl.index);
            $scope.proyectos = rta.data;
            for (var i = 0; i < $scope.proyectos.length; i++) {
                $scope.proyecto = $scope.proyectos[i];
                $scope.atributoDeProject = $scope.proyecto;
            }
        },
        function(rta) {
            console.log('error');
        }
    )
}
angular.module('examenApp')
    .component('atributosporIndice', {
        templateUrl: './js/components/atributospor-indice/atributospor-indice.html',
        controller: atController,
        bindings: {
            index: '<'
        }

    })