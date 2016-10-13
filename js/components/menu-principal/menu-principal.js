angular.module("examenApp").
component("menuPrincipal", {
    templateUrl: "./js/components/menu-principal/menu-principal.html",
    controller: function($scope) {
        $scope.isNavCollapsed = true;
        $scope.isCollapsed = false;
        $scope.isCollapsedHorizontal = false;
        $scope.links = [{
            "nombre": "Project",
            "ruta": "/lista-proyectos"
        }, {
            "nombre": "Groups",
            "ruta": "En-Construccion"
        }, {
            "nombre": "Activities",
            "ruta": "En-Construccion"
        }, {
            "nombre": "Schedule",
            "ruta": "En-Construccion"
        }, {
            "nombre": "Timekkeping",
            "ruta": "En-Construccion"
        }, {
            "nombre": "Flows",
            "ruta": "En-Construccion"
        }, {
            "nombre": "Reporting",
            "ruta": "En-Construccion"
        }]

    }
});