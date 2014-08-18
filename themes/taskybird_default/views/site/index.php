<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div ng-app="todoApp">
<div class="container" ng-controller="TodoCtrl">
    <div class="row">
        <div class="col-md-3 col-md-offset-1" id="sidebar">



            <div class="row" id="tags">
                <div class="col-md-12 btn-group btn-group-xs">
                    <span id="tagsHeader"><span class="glyphicon glyphicon-tags"></span> Tags</span><button type="button" class="btn btn-default" style="float:right;" id="buttonNewTag"><span class="glyphicon glyphicon-plus"></span> new tag</button>
                    <ul class="list-group">
                        <li class="list-group-item" ng-class="{editing: tag == editedTag}" ng-repeat="tag in tags" ng-dblclick="editTag(tag)">
                            <div class="view">
                                <span class="badge">0</span>
                                {{tag.name}}
                            </div>
                            <form ng-submit="doneEditingTag(tag)">
                                <input class="edit" ng-trim="false" ng-model="tag.name" tag-escape="revertEditingTag(tag)" ng-blur="doneEditingTag(tag)" tag-focus="tag == editedTag">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
        <div class="col-md-6">

            <div class="row" id="topnav">
                <div class="col-md-12">
                    <form ng-submit="addTodo()">
                        <input type="text" id="inputNewTodo" placeholder="Create new todo" ng-model="newTodo" />
                    </form>
                    <form ng-submit="addTag()">
                        <input type="text" id="inputNewTag" placeholder="Create new tag" ng-model="newTag" />
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <ul id="todo_ul">
                        <li ng-class="{finished_text: todo.finished, editing: todo == editedTodo}"" ng-repeat="todo in todos | filter:search | orderBy:'status'" ng-dblclick="editTodo(todo)">
                        <div class="view">
                            <span ng-class="todo.status == 4 ? 'finished glyphicon glyphicon-ok' : 'unfinished glyphicon glyphicon-ok'" ng-click="toggleTodo(todo)"></span>{{ todo.note }}
                            <span class="deleteTodo glyphicon glyphicon-remove" ng-click="deleteTodo(todo)"></span>
                        </div>
                        <form ng-submit="doneEditing(todo)">
                            <input class="edit" ng-trim="false" ng-model="todo.note" todo-escape="revertEditing(todo)" ng-blur="doneEditing(todo)" todo-focus="todo == editedTodo">
                        </form>
                        </li>
                    </ul>
                </div>
            </div>



        </div>
    </div>
</div>
</div>