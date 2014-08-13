<?php
/* @var $this ThunderbirdClientsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Thunderbird Clients',
);

$this->menu=array(
	array('label'=>'Create ThunderbirdClients', 'url'=>array('create')),
	array('label'=>'Manage ThunderbirdClients', 'url'=>array('admin')),
);
?>

<h1>Thunderbird Clients</h1>

<span style="color: red; font-weight: bold;">WARNING: make changes here ONLY IF YOU KNOW WHAT YOU ARE DOING!
<br />This table is being filled when a user installs the Taskybird addon in thunderbird and connects to this webserver
</span>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
