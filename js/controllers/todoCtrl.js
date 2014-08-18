var todoApp = angular.module('todoApp', []);

todoApp.service('dataService', function($http) {
    delete $http.defaults.headers.common['X-Requested-With'];
    this.getData = function() {
        // $http() returns a $promise that we can add handlers with .then()
        return $http({
            method: 'GET',
            url: '/taskybird/index.php/api/tasks'
            //params: 'limit=10',
           //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'}
        });
    }
    this.postData = function(note) {
        return $http({
            method: 'POST',
            url: '/taskybird/index.php/api/tasks',
            //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'},
            data: {
                note: note, status: 0
            }
        });
    }
    this.putData = function(id, note, status) {
        return $http({
            method: 'PUT',
            url: '/taskybird/index.php/api/tasks/'+id,
            //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'},
            data: {
                id: id, note: note, status: status
            }
        });
    }
    this.deleteData = function(id) {
        return $http({
            method: 'DELETE',
            url: '/taskybird/index.php/api/tasks/'+id,
            //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'},
            data: {
                id: id
            }
        });
    }
});


todoApp.controller('TodoCtrl', ['$scope', 'dataService', function($scope, dataService) {

    //get data from REST
    $scope.todos = null;
    dataService.getData().then(function (dataResponse) {
        $scope.todos = dataResponse.data.data.tasks;
        console.log($scope.todos);
    });



    $scope.toggleTodo = function(todo) {
        todo.status == 4 ? todo.status = 0 : todo.status = 4;
        dataService.putData(todo.id, todo.note, todo.status).then(function (dataResponse) {
        });
    };



    $scope.addTodo = function () {
        var newTodo = $scope.newTodo.trim();
        if (!newTodo.length) {
            return;
        }

        dataService.postData(newTodo).then(function (dataResponse) {
            $scope.todos.push({
                note: newTodo,
                status: 0
            });
        });


        $scope.newTodo = '';
    };

    $scope.deleteTodo = function (todo) {
        dataService.deleteData(todo.id).then(function (dataResponse) {
            $scope.todos.splice($scope.todos.indexOf(todo), 1);
        });
    };

    $scope.editTodo = function (todo) {
        $scope.editedTodo = todo;
// Clone the original todo to restore it on demand.
        $scope.originalTodo = angular.extend({}, todo);
    };

    $scope.doneEditing = function (todo) {
        dataService.putData(todo.id, todo.note, todo.status).then(function (dataResponse) {
            $scope.editedTodo = null;
            todo.note = todo.note.trim();
        });

        if (!todo.note) {
            $scope.deleteTodo(todo);
        }
    };

    $scope.revertEditing = function (todo) {
        $scope.todos[$scope.todos.indexOf(todo)] = $scope.originalTodo;
        $scope.doneEditing($scope.originalTodo);
    };

    /////////////////////////////////////////
    // TAGS //todo - move to tagsCtrl.js
    ////////////////////////////////////////

    $scope.tags = [{name: "@home"},
        {name: "@work"},
        {name: "Next"},
    ];


    $scope.addTag = function () {
        var newTag = $scope.newTag.trim();
        if (!newTag.length) {
            return;
        }

        $scope.tags.push({
            name: newTag
        });

        $scope.newTag = '';
    };

    $scope.deleteTag = function (tag) {
        $scope.tags.splice($scope.tags.indexOf(tag), 1);
    };



    $scope.editTag = function (tag) {
        $scope.editedTag = tag;
// Clone the original todo to restore it on demand.
        $scope.originalTag = angular.extend({}, tag);
    };

    $scope.doneEditingTag = function (tag) {
        $scope.editedTag = null;
        tag.name = tag.name.trim();

        if (!tag.name) {
            $scope.deleteTag(tag);
        }
    };

    $scope.revertEditingTag = function (tag) {
        $scope.tags[$scope.tags.indexOf(tag)] = $scope.originalTag;
        $scope.doneEditing($scope.originalTag);
    };

}]);