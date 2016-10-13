angular.module("examenApp").
component("menuProyectos", {
    templateUrl: "./js/components/menu-proyectos/menu-proyectos.html",
    controller: function($scope, ProyectosService) {
        $scope.proyectos = []
        ProyectosService.traerTodos().then(
            function(rta) {
                c(rta);
                $scope.proyectos = rta.data;
            },
            function(rta) {
                console.log('error');
            }
        )

    }
});