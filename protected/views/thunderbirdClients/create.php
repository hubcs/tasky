<?php
/* @var $this ThunderbirdClientsController */
/* @var $model ThunderbirdClients */

$this->breadcrumbs=array(
	'Thunderbird Clients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ThunderbirdClients', 'url'=>array('index')),
	array('label'=>'Manage ThunderbirdClients', 'url'=>array('admin')),
);
?>

<h1>Create ThunderbirdClients</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>