todoApp.service('TodoRest', function($http) {
    delete $http.defaults.headers.common['X-Requested-With'];
    this.getData = function() {
        // $http() returns a $promise that we can add handlers with .then()
        return $http({
            method: 'GET',
            url: '/index.php/api/tasks'
            //params: 'limit=10',
            //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'}
        });
    }
    this.postData = function(note) {
        return $http({
            method: 'POST',
            url: '/index.php/api/tasks',
            //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'},
            data: {
                note: note, status: 0
            }
        });
    }
    this.putData = function(id, note, status) {
        return $http({
            method: 'PUT',
            url: '/index.php/api/tasks/'+id,
            //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'},
            data: {
                id: id, note: note, status: status
            }
        });
    }
    this.deleteData = function(id) {
        return $http({
            method: 'DELETE',
            url: '/index.php/api/tasks/'+id,
            //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'},
            data: {
                id: id
            }
        });
    }
});




todoApp.service('TagRest', function($http) {
    delete $http.defaults.headers.common['X-Requested-With'];
    this.getData = function() {
        // $http() returns a $promise that we can add handlers with .then()
        return $http({
            method: 'GET',
            url: '/index.php/api/tags'
            //params: 'limit=10',
            //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'}
        });
    }
    this.postData = function(name) {
        return $http({
            method: 'POST',
            url: '/index.php/api/tags',
            //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'},
            data: {
                name: name
            }
        });
    }
    this.putData = function(id, name) {
        return $http({
            method: 'PUT',
            url: '/index.php/api/tags/'+id,
            //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'},
            data: {
                id: id, name: name
            }
        });
    }
    this.deleteData = function(id) {
        return $http({
            method: 'DELETE',
            url: '/index.php/api/tags/'+id,
            //headers: {'Authorization': 'bearer f44ba59438f607a23517c423ccb38e9aa798dfeb'},
            data: {
                id: id
            }
        });
    }
});