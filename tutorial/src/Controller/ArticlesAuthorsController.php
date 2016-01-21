<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticlesAuthors Controller
 *
 * @property \App\Model\Table\ArticlesAuthorsTable $ArticlesAuthors
 */
class ArticlesAuthorsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles', 'Authors']
        ];
        $this->set('articlesAuthors', $this->paginate($this->ArticlesAuthors));
        $this->set('_serialize', ['articlesAuthors']);
    }

    /**
     * View method
     *
     * @param string|null $id Articles Author id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesAuthor = $this->ArticlesAuthors->get($id, [
            'contain' => ['Articles', 'Authors']
        ]);
        $this->set('articlesAuthor', $articlesAuthor);
        $this->set('_serialize', ['articlesAuthor']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesAuthor = $this->ArticlesAuthors->newEntity();
        if ($this->request->is('post')) {
            $articlesAuthor = $this->ArticlesAuthors->patchEntity($articlesAuthor, $this->request->data);
            if ($this->ArticlesAuthors->save($articlesAuthor)) {
                $this->Flash->success(__('The articles author has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The articles author could not be saved. Please, try again.'));
            }
        }
        $articles = $this->ArticlesAuthors->Articles->find('list', ['limit' => 200]);
        $authors = $this->ArticlesAuthors->Authors->find('list', ['limit' => 200]);
        $this->set(compact('articlesAuthor', 'articles', 'authors'));
        $this->set('_serialize', ['articlesAuthor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Author id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesAuthor = $this->ArticlesAuthors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesAuthor = $this->ArticlesAuthors->patchEntity($articlesAuthor, $this->request->data);
            if ($this->ArticlesAuthors->save($articlesAuthor)) {
                $this->Flash->success(__('The articles author has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The articles author could not be saved. Please, try again.'));
            }
        }
        $articles = $this->ArticlesAuthors->Articles->find('list', ['limit' => 200]);
        $authors = $this->ArticlesAuthors->Authors->find('list', ['limit' => 200]);
        $this->set(compact('articlesAuthor', 'articles', 'authors'));
        $this->set('_serialize', ['articlesAuthor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Author id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesAuthor = $this->ArticlesAuthors->get($id);
        if ($this->ArticlesAuthors->delete($articlesAuthor)) {
            $this->Flash->success(__('The articles author has been deleted.'));
        } else {
            $this->Flash->error(__('The articles author could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
