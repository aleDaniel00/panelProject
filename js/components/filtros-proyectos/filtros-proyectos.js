function MainCtrl($scope, $log) {

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
        alert(indice.atributo);
        this.index = indice.atributo;
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