<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticlesTags Controller
 *
 * @property \App\Model\Table\ArticlesTagsTable $ArticlesTags
 */
class ArticlesTagsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles', 'Tags']
        ];
        $this->set('articlesTags', $this->paginate($this->ArticlesTags));
        $this->set('_serialize', ['articlesTags']);
    }

    /**
     * View method
     *
     * @param string|null $id Articles Tag id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesTag = $this->ArticlesTags->get($id, [
            'contain' => ['Articles', 'Tags']
        ]);
        $this->set('articlesTag', $articlesTag);
        $this->set('_serialize', ['articlesTag']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesTag = $this->ArticlesTags->newEntity();
        if ($this->request->is('post')) {
            $articlesTag = $this->ArticlesTags->patchEntity($articlesTag, $this->request->data);
            if ($this->ArticlesTags->save($articlesTag)) {
                $this->Flash->success(__('The articles tag has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The articles tag could not be saved. Please, try again.'));
            }
        }
        $articles = $this->ArticlesTags->Articles->find('list', ['limit' => 200]);
        $tags = $this->ArticlesTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('articlesTag', 'articles', 'tags'));
        $this->set('_serialize', ['articlesTag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Tag id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesTag = $this->ArticlesTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesTag = $this->ArticlesTags->patchEntity($articlesTag, $this->request->data);
            if ($this->ArticlesTags->save($articlesTag)) {
                $this->Flash->success(__('The articles tag has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The articles tag could not be saved. Please, try again.'));
            }
        }
        $articles = $this->ArticlesTags->Articles->find('list', ['limit' => 200]);
        $tags = $this->ArticlesTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('articlesTag', 'articles', 'tags'));
        $this->set('_serialize', ['articlesTag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Tag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesTag = $this->ArticlesTags->get($id);
        if ($this->ArticlesTags->delete($articlesTag)) {
            $this->Flash->success(__('The articles tag has been deleted.'));
        } else {
            $this->Flash->error(__('The articles tag could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
