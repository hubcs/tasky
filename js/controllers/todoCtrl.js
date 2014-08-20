var todoApp = angular.module('todoApp', ['ngDragDrop']);

todoApp.controller('TodoCtrl', ['$scope', 'TodoRest', 'TagRest', function($scope, TodoRest, TagRest) {

    //get data from REST
    $scope.todos = null;
    TodoRest.getData().then(function (dataResponse) {
        $scope.todos = dataResponse.data.data.tasks;
        console.log($scope.todos);
    });

    $scope.toggleTodo = function(todo) {
        todo.status == 4 ? todo.status = 0 : todo.status = 4;
        TodoRest.putData(todo.id, todo.note, todo.status).then(function (dataResponse) {
        });
    };

    $scope.addTodo = function () {
        var newTodo = $scope.newTodo.trim();
        if (!newTodo.length) {
            return;
        }
        TodoRest.postData(newTodo).then(function (dataResponse) {
            $scope.todos.push({
                note: newTodo,
                status: 0
            });
        });

    $scope.newTodo = '';
    };

    $scope.deleteTodo = function (todo) {
        TodoRest.deleteData(todo.id).then(function (dataResponse) {
            $scope.todos.splice($scope.todos.indexOf(todo), 1);
        });
    };

    $scope.editTodo = function (todo) {
        $scope.editedTodo = todo;
// Clone the original todo to restore it on demand.
        $scope.originalTodo = angular.extend({}, todo);
    };

    $scope.doneEditing = function (todo) {
        if (!todo.note) {
            $scope.deleteTodo(todo);
        } else {
            TodoRest.putData(todo.id, todo.note, todo.status).then(function (dataResponse) {
                $scope.editedTodo = null;
                todo.note = todo.note.trim();
            });
        }
    };

    $scope.revertEditing = function (todo) {
        $scope.todos[$scope.todos.indexOf(todo)] = $scope.originalTodo;
        $scope.doneEditing($scope.originalTodo);
    };

    /////////////////////////////////////////
    // TAGS
    ////////////////////////////////////////

    //get data from REST
    $scope.tags = null;
    TagRest.getData().then(function (dataResponse) {
        $scope.tags = dataResponse.data.data.tags;
        console.log($scope.tags);
    });

    $scope.addTag = function () {
        var newTag = $scope.newTag.trim();
        if (!newTag.length) {
            return;
        }
        TagRest.postData(newTag).then(function (dataResponse) {
            $scope.tags.push({
                name: newTag
            });
        });
        $scope.newTag = '';
    };

    $scope.deleteTag = function (tag) {
        TagRest.deleteData(tag.id).then(function (dataResponse) {
            $scope.tags.splice($scope.tags.indexOf(tag), 1);
        });
    };



    $scope.editTag = function (tag) {
        $scope.editedTag = tag;
// Clone the original todo to restore it on demand.
        $scope.originalTag = angular.extend({}, tag);
    };

    $scope.doneEditingTag = function (tag) {
        if (!tag.name) {
            $scope.deleteTag(tag);
        } else {
            TagRest.putData(tag.id, tag.name).then(function (dataResponse) {
                $scope.editedTag = null;
                tag.name = tag.name.trim();
            });
        }
    };

    $scope.revertEditingTag = function (tag) {
        $scope.tags[$scope.tags.indexOf(tag)] = $scope.originalTag;
        $scope.doneEditing($scope.originalTag);
    };

    onDropTag = function(task, tag) {
        console.log(task+" has been successfully dropped into "+tag);
    }

}]);