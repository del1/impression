var myApp= angular
			.module("myModule",[])
			.controller("myController", function($scope){
				var employee={
					firstName: "David",
					lastName: "Hasting",
					gender: "Male"
				}
				$scope.employee=employee;

			});