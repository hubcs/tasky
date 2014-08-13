<?php
/* @var $this ThunderbirdClientsController */
/* @var $model ThunderbirdClients */

$this->breadcrumbs=array(
	'Thunderbird Clients'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ThunderbirdClients', 'url'=>array('index')),
	array('label'=>'Create ThunderbirdClients', 'url'=>array('create')),
	array('label'=>'Update ThunderbirdClients', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ThunderbirdClients', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ThunderbirdClients', 'url'=>array('admin')),
);
?>

<h1>View ThunderbirdClients #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'owner_id',
		'installation_id',
	),
)); ?>
