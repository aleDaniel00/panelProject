function MainCtrl($scope, $log) {

    this.indices = [
        'NOMBRE',
        'DESCRIPCION',
        'RFI',
        'NOTAS',
        'ESTADO'
    ];



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