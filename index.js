let app=angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
	$scope.addPerson = function() {
		$http.post("addPerson.php", {'fullName': $scope.fullName, 'gender': $scope.gender})
		.then(function(res, err) {
			if (err) {
				console.log(err);
			} else {
				$scope.message = `${res.data.message} id: ${res.data.id}`;
				$scope.getAll();
			}
		});
	}

	$scope.delPerson = function(_id) {
		$http.post("delPerson.php", {'id': _id})
		.then(function(res, err) {
			if (err) {
				console.log(err);
			} else {
				$scope.message = `${res.data.message} id: ${res.data.id}`;
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
				//console.log(res.data);
			}
		});
	}

	$scope.getAll();
});
