<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProduitsVisites Controller
 *
 * @property \App\Model\Table\ProduitsVisitesTable $ProduitsVisites
 *
 * @method \App\Model\Entity\ProduitsVisite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProduitsVisitesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Visites', 'Produits']
        ];
        $produitsVisites = $this->paginate($this->ProduitsVisites);

        $this->set(compact('produitsVisites'));
        
        $this->set([
            'produitsVisites' => $produitsVisites,
            '_serialize' => ['produitsVisites']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Produits Visite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produitsVisite = $this->ProduitsVisites->get($id, [
            'contain' => ['Visites', 'Produits']
        ]);

        $this->set('produitsVisite', $produitsVisite);
        
        $this->set([
            'produitsVisite' => $produitsVisite,
            '_serialize' => ['produitsVisite']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produitsVisite = $this->ProduitsVisites->newEntity();
        if ($this->request->is('post')) {
            $produitsVisite = $this->ProduitsVisites->patchEntity($produitsVisite, $this->request->getData());
            if ($this->ProduitsVisites->save($produitsVisite)) {
                $this->Flash->success(__('The produits visite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produits visite could not be saved. Please, try again.'));
        }
        $visites = $this->ProduitsVisites->Visites->find('list', ['limit' => 200]);
        $produits = $this->ProduitsVisites->Produits->find('list', ['limit' => 200]);
        $this->set(compact('produitsVisite', 'visites', 'produits'));
        
        $this->set([
            'produitsVisite' => $produitsVisite,
            '_serialize' => ['produitsVisite']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produits Visite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produitsVisite = $this->ProduitsVisites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produitsVisite = $this->ProduitsVisites->patchEntity($produitsVisite, $this->request->getData());
            if ($this->ProduitsVisites->save($produitsVisite)) {
                $this->Flash->success(__('The produits visite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produits visite could not be saved. Please, try again.'));
        }
        $visites = $this->ProduitsVisites->Visites->find('list', ['limit' => 200]);
        $produits = $this->ProduitsVisites->Produits->find('list', ['limit' => 200]);
        $this->set(compact('produitsVisite', 'visites', 'produits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produits Visite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produitsVisite = $this->ProduitsVisites->get($id);
        if ($this->ProduitsVisites->delete($produitsVisite)) {
            $this->Flash->success(__('The produits visite has been deleted.'));
        } else {
            $this->Flash->error(__('The produits visite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        
        $this->set([
            '_serialize' => ['produitsVisite']
        ]);
    }
}
