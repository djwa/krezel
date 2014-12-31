(function () {
    var myapp = angular.module('myapp', []);


// set the configuration
    myapp.run(['$rootScope', function ($rootScope) {
            // the following data is fetched from the JavaScript variables created by wp_localize_script(), and stored in the Angular rootScope
            $rootScope.dir = BlogInfo.url;
            $rootScope.site = BlogInfo.site;
            $rootScope.api = AppAPI.url;
        }]);


// add a controller
    myapp.controller('HomeCrtl', ['$scope', '$http', function ($scope, $http) {
            // load posts from the WordPress API
            $http({
                method: 'GET',
                url: $scope.api, // derived from the rootScope
                params: {
                    json: 'get_posts'
                }
            }).
                    success(function (data, status, headers, config) {
                        $scope.postdata = data.posts;
                    }).
                    error(function (data, status, headers, config) {
                    });
        }]);

//    myapp.factory('Posts', ['$http', function ($http) {
//            return {
//                getPosts: function () {
//
//                    var response = $http({
//                        url: ajaxurl,
//                        method: "GET",
//                        params: {action: 'test_ajax'}}).then(function (response) {
//                        return response.data;
//                    });
//
//                    return response;
//
//                }
//            };
//        }]);
//
//
//    myapp.controller('HomeCrtl', ['$scope', 'Posts', function ($scope, Posts) {
//            console.log('Home controller in da House!');
//            Posts.getPosts().then(function (data) {
//                $scope.posts = data;
//                console.log($scope, Posts);
//            });
//        }]);
})();