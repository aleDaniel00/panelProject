function atController($scope, ProyectosService) {
    ProyectosService.traerTodos().then(
        function(rta) {
            c(rta);
            c(indice)
            $scope.proyectos = rta.data;
            for(var i = 0; i < $scope.proyectos.length ; i++){
                      $scope.proyecto = $scope.proyectos[i];
                      $scope.atributoDeProject = $scope.proyecto.this.indice;
            }
        },
        function(rta) {
            console.log('error');
        }

    )
    console.log(this.nombre);
}
angular.module('examenApp')
    .component('atributosporIndice', {
        templateUrl: './js/components/atributospor-indice/atributospor-indice.html',
        controller: atController,
        bindings: {
            indice: '='
        }

    })