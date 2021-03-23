<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Familles Controller
 *
 * @property \App\Model\Table\FamillesTable $Familles
 *
 * @method \App\Model\Entity\Famille[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamillesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $familles = $this->paginate($this->Familles);

        $this->set(compact('familles'));
        
        $this->set([
            'familles' => $familles,
            '_serialize' => ['familles']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Famille id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $famille = $this->Familles->get($id, [
            'contain' => ['Produits']
        ]);

        $this->set('famille', $famille);
        
        $this->set([
            'famille' => $famille,
            '_serialize' => ['famille']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $famille = $this->Familles->newEntity();
        if ($this->request->is('post')) {
            $famille = $this->Familles->patchEntity($famille, $this->request->getData());
            if ($this->Familles->save($famille)) {
                $this->Flash->success(__('The famille has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famille could not be saved. Please, try again.'));
        }
        $this->set(compact('famille'));
        
        $this->set([
            'famille' => $famille,
            '_serialize' => ['famille']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Famille id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $famille = $this->Familles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $famille = $this->Familles->patchEntity($famille, $this->request->getData());
            if ($this->Familles->save($famille)) {
                $this->Flash->success(__('The famille has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famille could not be saved. Please, try again.'));
        }
        $this->set(compact('famille'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Famille id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $famille = $this->Familles->get($id);
        if ($this->Familles->delete($famille)) {
            $this->Flash->success(__('The famille has been deleted.'));
        } else {
            $this->Flash->error(__('The famille could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        
        $this->set([
            '_serialize' => ['famille']
        ]);
    }
}
