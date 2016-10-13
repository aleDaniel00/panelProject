function MainCtrl($scope, $log, ProyectosService) {

    this.indices = [{
            atributo: 'NOMBRE'
        },
        {
            atributo: 'DESCRIPCION'
        },
        {
            atributo: 'RFI'
        },
        {
            atributo: 'NOTAS'
        },
        {
            atributo: 'ESTADO'
        }
    ];
    $scope.verIndice = function(indice) {
        ProyectosService.trearPorAtributo(indice).then(
            function(rta) {
                $scope.proyectos = rta.data;
            },
            function(rta) {
                c(rta.data);
            }
        )
    }



    $scope.status = {
        isopen: false
    };

    $scope.toggled = function(open) {
        $log.log('Dropdown is now: ', open);
    };

    $scope.toggleDropdown = function($event) {
        $event.preventDefault();
        $event.stopPropagation();
        $scope.status.isopen = !$scope.status.isopen;
    };

    $scope.isCollapsed = true;


}
angular.module('examenApp')
    .component('filtrosProyectos', {
        templateUrl: './js/components/filtros-proyectos/filtros-proyectos.html',
        controller: MainCtrl
    })