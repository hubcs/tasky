<?php

class TasktagassocController extends Controller
{
	public function actionIndex()
	{
        $dataProvider=new CActiveDataProvider('Tasktagassoc');
		$this->render('index', array(
            'dataProvider'=>$dataProvider,
        ));
	}

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            array(
                'ext.RestfullYii.filters.ERestFilter +
                REST.GET, REST.PUT, REST.POST, REST.DELETE'
            ),
        );
    }

    public function actions()
    {
        return array(
            'REST.'=>'ext.RestfullYii.actions.ERestActionProvider',
        );
    }

    public function restEvents()
    {

        $this->onRest('req.get.special.render', function($param1) {
            echo CJSON::encode(['param1'=>$param1]);
        });
    }

    public function loadModel($id)
    {
        $model=Tasktagassoc::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}