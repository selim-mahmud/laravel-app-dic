var myApp = angular.module('myApp', ['ngMessages']);

myApp.controller('homeController', ['$scope', '$timeout', '$filter', '$http', function($scope, $timeout, $filter,
	$http){

	$scope.person = 'Selim'

	$timeout(function(){

		$scope.person = 'Kaniz';

	}, 2000);

	$scope.occu = '';

	$scope.lowercase = function(){

		return $filter('lowercase')($scope.occu);

	}

	$scope.minCharacter = 5;
	$scope.maxCharacter =10;


	//show/hide

	$scope.isVisible = true;

	$scope.showHide = function(){
		$scope.isVisible = $scope.isVisible?false:true;

	}

	//ajax get

	$http.get('/api.php')
	.success(function(results){

		$scope.results = results;

		console.log(results);

	})
	.error(function(data){
		console.log(data);
	});

	//ajax post
	$scope.name = '';
	$scope.email = '';
	$scope.phone = '';
	$scope.address = '';

	$scope.isMessage = true;
	$scope.errorClass = true;

	$scope.saveMember = function(){

			$http.post('/save.php', {'name':$scope.name, 'email':$scope.email, 'phone':$scope.phone, 'address':$scope.address})
			.success(function(results){

				$scope.results = results;

				$scope.name = '';
				$scope.email = '';
				$scope.phone = '';
				$scope.address = '';

				$scope.isMessage = false;
				$scope.errorClass = false;



			})
			.error(function(data){
				console.log(data);
			});

	}

	$scope.showMessage = function(){

			$scope.isMessage = true;
			$scope.errorClass = true;

	}


	

}]);

