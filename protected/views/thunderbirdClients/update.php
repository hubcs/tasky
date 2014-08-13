<?php
/* @var $this ThunderbirdClientsController */
/* @var $model ThunderbirdClients */

$this->breadcrumbs=array(
	'Thunderbird Clients'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ThunderbirdClients', 'url'=>array('index')),
	array('label'=>'Create ThunderbirdClients', 'url'=>array('create')),
	array('label'=>'View ThunderbirdClients', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ThunderbirdClients', 'url'=>array('admin')),
);
?>

<h1>Update ThunderbirdClients <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>