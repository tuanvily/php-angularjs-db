let app=angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
	$scope.addPerson = function() {
		$http.post("addPerson.php", {'fullName': $scope.fullName, 'gender': $scope.gender})
		.then(function(res, err) {
			if (err) {
				console.log("error");
				console.log(err);
			} else {
				console.log(res.data);
				$scope.getAll();
			}
		});
	}

	$scope.getAll = function() {
		$http.get("getAll.php")
		.then(function(res, err) {
			if(err){
				console.log(err)
			} else {
				$scope.data = res.data;
				console.log(res);
			}
		});
	}

	$scope.getAll();
});
