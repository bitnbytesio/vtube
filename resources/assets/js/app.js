var vtube = angular.module('vtube', ['ui.router', 'ngSanitize','angular-loading-bar', 'ngAnimate', 'ngForms']);

var initInjector = angular.injector(["ng"]);
var $http = initInjector.get("$http");

$http.get("admin/config").success(function(response) {

    vtube.run(['$rootScope', '$location', function ($rootScope, $location) {
      console.log('setting config...');
      $rootScope.config = response;

     console.log('setup acl...');

      var aclCtrl = function (e, to) {

          if (typeof to.acl == 'object' && typeof $rootScope.config == 'object') {

          var hasAccess = false;
        
          for (var i in to.acl) {

            if ($rootScope.config.roles.indexOf(to.acl[i]) >= 0) {
              hasAccess = true;
              break;
            }
          }

            if(!hasAccess){
              console.log("you don't have permission to access this page!");
              e.preventDefault();
              $location.path('/');
            }
          
          }
      };

$rootScope.$on('$stateChangeSuccess',  aclCtrl);
$rootScope.$on('$stateChangeStart', aclCtrl);

}]);


    angular.element(document).ready(function() {
          angular.bootstrap(document, ['vtube']);
    });

}, function(errorResponse) {
    // Handle error case
});

