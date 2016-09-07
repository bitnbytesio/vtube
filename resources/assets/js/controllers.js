vtube.controller('AppCtrl', function () {



});

vtube.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/');

    $stateProvider.state('login', {
      url: "/",
      templateUrl: "templates/guest/login.html",
      controller: 'loginCtrl',
    }).state('forgot-password', {
      url: "/forgot-password",
      templateUrl: "templates/guest/forgot-password.html"
    }).state('logout', {
      url: "/logout",
      controller: "logoutCtrl"
    })

	


    // users

    $stateProvider.state('user', {
        templateUrl: "templates/common/layout.html"
    }).state('user.list', {
      url: "/users",
      controller:'listUsersCtrl',
      templateUrl: "templates/user/list.html",
      acl:['super_admin']
    }).state('user.add', {
      url: "/user/add",
      controller: 'addUserCtrl',
      templateUrl: "templates/user/form.html",
      acl:['super_admin']
    });

    // video manager

     $stateProvider.state('video', {
        templateUrl: "templates/common/layout.html"
    }).state('video.list', {
      url: "/videos",
      templateUrl: "templates/video/list.html"
    }).state('video.add', {
      url: "/video/add",
      controller: 'addVideoCtrl',
      templateUrl: "templates/video/form.html"
    });




 }]).config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
    	cfpLoadingBarProvider.includeSpinner = false;
 }]);



vtube.controller('loginCtrl', ['$rootScope', '$scope', '$ngForm', function ($rootScope, $scope, $ngForm) {

$scope.form = {};

$scope.signin =  $ngForm.create({
					url:'admin/login',
					method: 'post',
					scope: $scope,
					path: 'form',
				 }, {
            success: function (o) {
              if (typeof o.config == 'object') {
                $rootScope.config = o.config;
              }
            }
         });


}]);

vtube.controller('logoutCtrl', ['$rootScope', '$http', '$location', function ($rootScope, $http, $location) {
  $http.get('admin/logout').success(function (o) {

     if (typeof o.config == 'object') {
        $rootScope.config = o.config;
     }

    
    $location.path('/');
  });
}]);


vtube.controller('forgotPasswordCtrl', function () {

    $scope.passwordResetLink =  $ngForm.create({
                    url:'admin/login',
                    method: 'post',
                    scope: $scope,
                    path: 'form',
                 }, {
                    success: function (o) {
                        console.log(o);
                        console.log($scope.form);
                    }
                 });

});

// users


vtube.controller('listUsersCtrl', ['$scope', '$http', function ($scope, $http) {

  $scope.users = [];

  $http({url:'admin/users'}).success(function (o) {
    $scope.users = o.data;
  });

}]);

vtube.controller('getUserCtrl', function () {


});

vtube.controller('addUserCtrl', ['$scope', '$ngForm', '$location', '$rootScope', function ($scope, $ngForm, $location, $rootScope) {

    $scope.form = {};

    $scope.roles = $rootScope.config.system_roles;

    var config = {
                    url:'admin/user/save',
                    method: 'post',
                    scope: $scope,
                    path: 'form',
                 };

    $scope.add =  $ngForm.create(config, {
                    success: function (o) {
                        
                       if (o.success == true) {
                          $location.path('users');
                      }

                    }
                 });

    $scope.addNew =  $ngForm.create(config, {
                    success: function (o) {
                        
                        if (o.success == true) {
                            $scope.form = {};
                        }

                    }
                 });

    
}]);


vtube.controller('saveUserCtrl', function () {


});


// video controller

vtube.controller('addVideoCtrl', ['$scope', function ($scope) {

  $scope.form = {};
  $scope.video = {};

}]);
