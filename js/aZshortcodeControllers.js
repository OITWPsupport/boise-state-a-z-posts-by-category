angular.module('aZshortcodeApp.aZshortcodeControllers', [])
    .controller('aZshortcodeController', function($scope){

        $scope.title = "Select Category:";
        $scope.selectAll = false;
        $scope.lastCheck = false;
        $scope.selectedCategories = '';

        $scope.init = function(categories) {
            $scope.categories = categories;
        }

    });