<?php
/* @var $this ThunderbirdSyncListController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Thunderbird Sync Lists',
);


?>

<h1>Thunderbird Sync Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
