<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Visites Controller
 *
 * @property \App\Model\Table\VisitesTable $Visites
 *
 * @method \App\Model\Entity\Visite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VisitesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Praticiens', 'Visiteurs', 'Motifs']
        ];
        $visites = $this->paginate($this->Visites);

        $this->set(compact('visites'));
        
        $this->set([
            'visites' => $visites,
            '_serialize' => ['visites']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Visite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visite = $this->Visites->get($id, [
            'contain' => ['Praticiens', 'Visiteurs', 'Motifs', 'Produits']
        ]);

        $this->set('visite', $visite);
        
        $this->set([
            'visite' => $visite,
            '_serialize' => ['visite']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visite = $this->Visites->newEntity();
        if ($this->request->is('post')) {
            $visite = $this->Visites->patchEntity($visite, $this->request->getData());
            if ($this->Visites->save($visite)) {
                $this->Flash->success(__('The visite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The visite could not be saved. Please, try again.'));
        }
        $praticiens = $this->Visites->Praticiens->find('list', ['limit' => 200]);
        $visiteurs = $this->Visites->Visiteurs->find('list', ['limit' => 200]);
        $motifs = $this->Visites->Motifs->find('list', ['limit' => 200]);
        $produits = $this->Visites->Produits->find('list', ['limit' => 200]);
        $this->set(compact('visite', 'praticiens', 'visiteurs', 'motifs', 'produits'));
        
        $this->set([
            'visite' => $visite,
            '_serialize' => ['visite']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visite = $this->Visites->get($id, [
            'contain' => ['Produits']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visite = $this->Visites->patchEntity($visite, $this->request->getData());
            if ($this->Visites->save($visite)) {
                $this->Flash->success(__('The visite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The visite could not be saved. Please, try again.'));
        }
        $praticiens = $this->Visites->Praticiens->find('list', ['limit' => 200]);
        $visiteurs = $this->Visites->Visiteurs->find('list', ['limit' => 200]);
        $motifs = $this->Visites->Motifs->find('list', ['limit' => 200]);
        $produits = $this->Visites->Produits->find('list', ['limit' => 200]);
        $this->set(compact('visite', 'praticiens', 'visiteurs', 'motifs', 'produits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Visite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visite = $this->Visites->get($id);
        if ($this->Visites->delete($visite)) {
            $this->Flash->success(__('The visite has been deleted.'));
        } else {
            $this->Flash->error(__('The visite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        
        $this->set([
            '_serialize' => ['visite']
        ]);
    }
}
