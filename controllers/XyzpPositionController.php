<?php

namespace app\controllers;

use Yii;
use app\models\XyzpPosition;
use app\models\XyzpPositionSearch;
use app\models\XyzpInfo;
use app\models\XyzpPositionSubClassify;
use app\models\XyzpClassifyKey;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * XyzpPositionController implements the CRUD actions for XyzpPosition model.
 */
class XyzpPositionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all XyzpPosition models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new XyzpPositionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // echo "<pre>";
        // var_dump($dataProvider);
        // die;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single XyzpPosition model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new XyzpPosition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new XyzpPosition();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing XyzpPosition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing XyzpPosition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the XyzpPosition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return XyzpPosition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = XyzpPosition::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPosition()
    {
        // $p = Yii::$app->request->get('p') ? intval(Yii::$app->request->get('p')) : 1;
        // ini_set('memory_limit','1024M');
        // ini_set('max_execution_time',600);
        
// die('已完成');
        // 1.查询职位名称,以name+info_id组合来去重
        $info = XyzpPosition::find()
                ->select('name,info_id')
                ->distinct()
                ->where(['>=', 'create_time', '2017-09-01 00:00:00'])
                ->orderBy(['create_time'=>SORT_DESC,'update_time'=>SORT_DESC])
                ->offset(25*5000)
                ->limit(5000)
                ->asArray()
                ->all();

        foreach ($info as $k => $v) 
        {
            // 查ID 
            $info1 = XyzpPosition::find()
                        ->select('id')
                        ->where(['name'=>$v['name'],'info_id'=>$v['info_id']])
                        ->asArray()
                        ->one();
            $info[$k]['pid'] = $info1['id'];

            // 查公司名称
            $info2 = XyzpInfo::find()
                        ->select('company')
                        ->where(['id'=>$v['info_id']])
                        ->asArray()
                        ->one();
            $info[$k]['company'] = $info2['company'];

            // 查所属分类
            $info3 = XyzpPositionSubClassify::find()
                        ->select('class')
                        ->where(['info_id'=>$info1['id']])
                        ->asArray()
                        ->all();
            
            if($info3)
            {
                $class = array();
                $subClass = array();
                foreach ($info3 as $k3 => $v3) 
                {
                    $info4 = XyzpClassifyKey::find()
                                ->select('p_id,key')
                                ->where(['id'=>$v3['class']])
                                ->asArray()
                                ->one();
                    
                    if($info4['p_id'] == 0)
                    {
                        $class[] = $info4['key'];
                    }else
                    {
                        $subClass[] = $info4['key'];

                        $info5 = XyzpClassifyKey::find()
                                    ->select('key')
                                    ->where(['id'=>$info4['p_id']])
                                    ->asArray()
                                    ->one();
                        $class[] = $info5['key'];
                    }   
                }

                $info[$k]['p_key'] = implode('，', array_unique($class));
                $info[$k]['sub_key'] = implode('，', array_unique($subClass));

            }else
            {
                $info[$k]['sub_key'] = '';
                $info[$k]['p_key'] = '';
            }
        }

        $arr = array();
        foreach ($info as $k2 => $v2) 
        {
            foreach ($v2 as $k3 => $v3) 
            {
                $arr[$k2][] = $v3;
            }
        }
        
        echo "<pre>";
        var_dump($arr);
        die;


        $keys = ['position','info_id','pid','company','class','subclass'];

        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();

        try {
            $db->createCommand()->batchInsert('xyzp_temp', $keys, $arr)->execute();
            
            $transaction->commit();

            
        } catch(\Exception $e) {

            $transaction->rollBack();
       
            throw $e;
        }
        
        echo http_response_code();   
    }


    public function actionFenlei()
    {
        ini_set('memory_limit','1024M');
        $command = new \yii\db\Query();

        $all = $command->from('xyzp_temp')->all();

        $arr = array();
        foreach ($all as $k0 => $v0) 
        {
            $arr[$v0['position']][] = $v0;
        }

        // echo "<pre>";
        // var_dump($arr);
        
        $arr1 = array();
        foreach ($arr as $k => $v) 
        {
            $info1 = array();
            $info2 = array();
            $info3 = array();
            $info4 = array();
            $info5 = array();
            $info6 = array();
            $info7 = array();
            foreach ($v as $k2 => $v2) 
            {
                if($v2['info_id'] && $v2['company'])
                {
                    $info1[$v2['info_id']] = $v2['company'];
                }

                if($v2['class'])
                {
                    $info3[] = explode('，', $v2['class']);
                }
                if($v2['subclass'])
                {
                    $info4[] = explode('，', $v2['subclass']);
                }
            }
            
            $info2 = array_slice(array_unique($info1), 0, 5, true);
            $info7 = array();
            foreach ($info2 as $k7 => $v7) 
            {
                $info7[] = $k7;
            }
            
            $info5 = array();
            foreach ($info3 as $k3 => $v3) 
            {
                foreach ($v3 as $k4 => $v4) 
                {
                    $info5[] = $v4;
                } 
            }

            $info6 = array();
            foreach ($info4 as $k5 => $v5) 
            {
                foreach ($v5 as $k6 => $v6) 
                {
                    $info6[] = $v6;
                } 
            }

            $arr1[$k]['position'] = $k;
            $arr1[$k]['info_id'] = implode(',', $info7);
            $arr1[$k]['company'] = implode(',', $info2);
            $arr1[$k]['class'] = implode(',', array_unique($info5));
            $arr1[$k]['subclass'] = implode(',', array_unique($info6));
        }
        
        echo "<pre>";
        var_dump($arr1);

        $keys = ['position','info_id','company','class','subclass'];

        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();

        try {
            $db->createCommand()->batchInsert('xyzp_tmp', $keys, $arr1)->execute();
            
            $transaction->commit();

            
        } catch(\Exception $e) {

            $transaction->rollBack();
       
            throw $e;
        }
        
        echo http_response_code();
    }
}
