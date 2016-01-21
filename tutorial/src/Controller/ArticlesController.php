<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;




/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{

    public function associated()
    {

        $article = $this->Articles->newEntity();
       // pr($article);
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data, [
                //'fieldList' => ['title', 'tags'],
                'associated' => [
                    'Authors',
                    'Authors.Profiles',
                    'Tags',
                    'Comments'
                ]
            ]);
            //pr($article);

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The associated has been saved.'));
               	return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The associated could not be saved. Please, try again.'));
            }
            
        }
        $this->set(compact('article'));
        
    }

    public function form()
    {
        $article = $this->Articles->newEntity();
        $this->set(compact('article'));
    }

	public function index(){
		$condtions = $this->filter($this->request->query);
		$query = $this->Articles->newEntity();
		$this->paginate =[
				'conditions'=>$condtions,
				'limit'=>2,
				'order'=>['Articles.created'=>'DESC']
		];
		$articles = $this->paginate($this->Articles);
		$this->set(compact('articles','query'));
		
	}
    
    public function index_old()
    {
        
        $conditions = $this->filter($this->request->query);
        $query = $this->Articles->newEntity();
        
        $this->paginate = [
             'conditions'=>$conditions,
             'limit' => 2,
             'order' => [
                  'Articles.created' => 'DESC'
             ]
         ];

        $articles = $this->paginate($this->Articles);
        $this->set(compact('articles','query'));
    }

    private function filter($query){
    	$conditions = array();
    	
    	if(!empty($query['id']))
    		$conditions['AND']['Articles.id']=$query['id'];
    	if(!empty($query['title']))
    		$conditions['AND']['Articles.title LIKE']='%'.$query['title'].'%';
    	if(isset($query['status'])&&!empty($query['status']))
    		$conditions['AND']['Articles.status'] = $query['status'];
    	if(!empty($query['created_start']))
        	$conditions['AND']['Articles.created_start >=']=date('Y-m-d',strtotime($query['created_start']));
         if(!empty($query['created_end']))
         	$conditions['AND']['Articles.created_end<=']=data('Y-m-d',strtotime($query['created_end']));
         return $conditions;
    }
    private function filter_old($query)
    {
        $conditions =array();
        
        if(!empty($query['id']))
        {
            $conditions['AND']['Articles.id'] = $query['id'];
        }
            
        if(!empty($query['title']))
        {
            $conditions['AND']['Articles.title LIKE'] =  '%'.$query['title'].'%';
        }

        if(isset($query['status']) && $query['status'] !== "")
        {
             $conditions['AND']['Articles.status'] =  $query['status'];
        }
       
        if(!empty($query['created_start']))
        {

            $start = strtotime($query['created_start']);

            if(!empty($query['created_end'])&&!empty($start))
            {
                $end = strtotime($query['created_end']);
                if(!empty($end))
                {
                    $conditions['AND']['Articles.created >= '] =date("Y-m-d", strtotime($query['created_start']));
                    $conditions['AND']['Articles.created < '] = date("Y-m-d", strtotime($query['created_end']));
                }
            }else
            {
                $conditions['AND']['Articles.created >= '] =date("Y-m-d", strtotime($query['created_start']));
                $conditions['AND']['Articles.created < '] = date("Y-m-d",strtotime(date("Y-m-d", strtotime($query['created_start'])) . " +1 day"));
            }
        }

        return $conditions;
    }

    public function find()
    {
        $all_articles = $this->Articles->find('all',[
            'fields' => ['Articles.title','Articles.id','Articles.body'],
            'conditions' => ['Articles.title LIKE' =>  '%'.'title'.'%'],
            'contain' => [
                    'Authors',
                    'Authors.Profiles', 
                    'Comments'=>[
                        'fields'=>['Comments.article_id','Comments.body']
                        //'conditions'
                    ]
            ],
            //matching
            //notMatching
            'limit' => 2,
            'offset' => 2,
            'order' =>  ['Articles.created' => 'DESC'],
            'group' => [],
        ]);

        pr($all_articles);
       // pr($all_articles->toArray());
        $first_articles = $all_articles->all()->first();
        
        $last_articles = $all_articles->all()->last();
        $count_articles = $all_articles->all()->count();
        $is_empty_articles = $all_articles->all()->isEmpty();

        $list_articles = $this->Articles->find('list', [
             'keyField' => 'title',
             'valueField' => 'body',
        //    'groupField' => 'author_id'
        ]);
        //http://book.cakephp.org/3.0/en/orm/retrieving-data-and-resultsets.html#dynamic-finders
        $find_by_title = $this->Articles->findById(1);
        $find_by_titles = $this->Articles->findAllByTitle('title');
        //pr($find_by_title->toArray());
        $this->set(compact('list_articles','all_articles','last_articles','first_articles','count_articles','is_empty_articles'));
        
    }

    public function update()
    {
        $article = $this->Articles->get(1, [
            'contain' => ['Comments','Authors','Tags']
        ]);

        if($this->request->is('post'))
        {
            /* one to many update*/
            $firstComment = $this->Articles->Comments->newEntity();
            $firstComment->body = 'The CakePHP features are outstanding';

            $secondComment = $this->Articles->Comments->newEntity();
            $secondComment->body = 'CakePHP performance is terrific!';

            /* many to many update */
            $tag1 = $this->Articles->Tags->findByName('tee')->first();
            $tag1->_joinData = $this->Articles->ArticlesTags->newEntity();
            $tag1->_joinData->starred = 1;
            
            $this->Articles->Comments->link($article, [$firstComment, $secondComment]);
            $this->Articles->Tags->link($article, [$tag1]);

            $this->Articles->save($article);

        }   
       
        $this->set(compact('article'));
    }

   
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Tags', 'Authors', 'Comments']
        ]);
        $this->set(compact('article'));
    }

    
    public function add()
    {

        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
                   
             /*
            $article = $this->Articles->newEntity(array(
                'title' => 'hello wolrd',
                'body'  => 'hello body',
                'tags' => array(
                    '0'=>array(
                        '_joinData'=>array('starred'=>1),
                        'name'=>'tag4'),
                    '1'=>array(
                        '_joinData'=>array('starred'=>0),
                        'name'=>'tag5'),
                    '2'=>array(
                        '_joinData'=>array('starred'=>0),
                        'name'=>'tag6'),
                )
            )); 
            */
            /*
            $article = $this->Articles->newEntity(array(
                'title' => 'hello wolrd',
                'body'  => 'hello body',
                'authors' => array(
                    '0'=>array('first_name'=>'mike','last_name'=>'last mike'),
                    '1'=>array('first_name'=>'tom','last_name'=>'last tom'),
                    '2'=>array('first_name'=>'john','last_name'=>'last john'),
                )
            )); 
            */

            // $this->Articles->save($article);
            
            
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
            
        }
        $tags = $this->Articles->Tags->find('list', ['limit' => 200]);
        $authors = $this->Articles->Authors->find('list', ['limit' => 200]);
        $this->set(compact('article', 'tags', 'authors'));
    }

   
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Tags', 'Authors']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Articles->Tags->find('list', ['limit' => 200]);
        $authors = $this->Articles->Authors->find('list', ['limit' => 200]);
        $this->set(compact('article', 'tags', 'authors'));
    }

    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function  inputExcel(){
    	$this->autoRender = false;
    	
    	$this->_validateExcel ( $_FILES );
    	$temp = explode ( ".", $_FILES ["excel"] ["name"] );
    	$ext = end ( $temp );
    	$filename = uniqid () . '.' . $ext;
    	$path = APP . DS . 'tmp' . DS . $filename;
    	//pr($_FILES ['excel'] ['tmp_name']);
    	move_uploaded_file ( $_FILES ['excel'] ['tmp_name'], $path );
    	try {
    		$inputFileType = PHPExcel_IOFactory::identify ( $path );
    		$objReader = PHPExcel_IOFactory::createReader ( $inputFileType );
    		$objPHPExcel = $objReader->load ( $path );
    	}
    	catch ( Exception $e ) {
    		die ( 'Error loading file "' . pathinfo ( $path, PATHINFO_BASENAME ) . '": ' . $e->getMessage () );
    	}
    	$sheet = $objPHPExcel->getSheet ( 0 );
    	$highestRow = $sheet->getHighestRow ();
    	$highestColumn = $sheet->getHighestColumn ();
    	$this->getExcelOrderInfo($sheet,$highestRow,$highestColumn);
    	for($row = 2; $row <= $highestRow; $row ++) {
    		$rowData = $sheet->rangeToArray ( 'A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE );
    		pr($rowData [0] [8]);
    	}
    	
    }
    
    private function _validateExcel($file) {
    	if ($file ['excel'] ['error'] > 0) {
    		$value='导入错误！';
    		switch ($file ['excel'] ['error'] )
    		{
    			case 4:
    				$value='请选择文件上传！';
    				break;
    		}
    		$this->Session->setFlash ( $value, 'default', array (
    				'class' => 'albox errorbox'
    		) );
    		return $this->redirect (  $this->referer() );
    	}
    
    	/* if (! in_array ( $file ['excel'] ['type'], array (
    			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    			'application/vnd.ms-excel'
    	) )) {
    		$this->Session->setFlash ( "导入出错 上传类型出错，您上传文件为" . $file ['excel'] ['type'], 'default', array (
    				'class' => 'albox errorbox'
    		) );
    		return $this->redirect (  $this->referer() );
    	} */
    
    	if ($file ['excel'] ['size'] > 14000000) {
    		$this->Session->setFlash ( "导入文件过大必须小于10m", 'default', array (
    				'class' => 'albox errorbox'
    		) );
    		return $this->redirect (  $this->referer() );
    	}
    }
    
}
