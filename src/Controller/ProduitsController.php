<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Produits Controller
 *
 * @property \App\Model\Table\ProduitsTable $Produits
 *
 * @method \App\Model\Entity\Produit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProduitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Familles']
        ];
        $produits = $this->paginate($this->Produits);

        $this->set(compact('produits'));
        
        $this->set([
            'produits' => $produits,
            '_serialize' => ['produits']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Produit id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produit = $this->Produits->get($id, [
            'contain' => ['Familles', 'Visites']
        ]);

        $this->set('produit', $produit);
        
        $this->set([
            'produit' => $produit,
            '_serialize' => ['produit']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produit = $this->Produits->newEntity();
        if ($this->request->is('post')) {
            $produit = $this->Produits->patchEntity($produit, $this->request->getData());
            if ($this->Produits->save($produit)) {
                $this->Flash->success(__('The produit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produit could not be saved. Please, try again.'));
        }
        $familles = $this->Produits->Familles->find('list', ['limit' => 200]);
        $visites = $this->Produits->Visites->find('list', ['limit' => 200]);
        $this->set(compact('produit', 'familles', 'visites'));
        
        $this->set([
            'produit' => $produit,
            '_serialize' => ['produit']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produit = $this->Produits->get($id, [
            'contain' => ['Visites']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produit = $this->Produits->patchEntity($produit, $this->request->getData());
            if ($this->Produits->save($produit)) {
                $this->Flash->success(__('The produit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produit could not be saved. Please, try again.'));
        }
        $familles = $this->Produits->Familles->find('list', ['limit' => 200]);
        $visites = $this->Produits->Visites->find('list', ['limit' => 200]);
        $this->set(compact('produit', 'familles', 'visites'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produit = $this->Produits->get($id);
        if ($this->Produits->delete($produit)) {
            $this->Flash->success(__('The produit has been deleted.'));
        } else {
            $this->Flash->error(__('The produit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        
        $this->set([
            '_serialize' => ['produit']
        ]);
    }
}
