<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PraticiensSpecialites Controller
 *
 * @property \App\Model\Table\PraticiensSpecialitesTable $PraticiensSpecialites
 *
 * @method \App\Model\Entity\PraticiensSpecialite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PraticiensSpecialitesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Praticiens', 'Specialites']
        ];
        $praticiensSpecialites = $this->paginate($this->PraticiensSpecialites);

        $this->set(compact('praticiensSpecialites'));
        
        $this->set([
            'praticiensSpecialites' => $praticiensSpecialites,
            '_serialize' => ['praticiensSpecialites']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Praticiens Specialite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $praticiensSpecialite = $this->PraticiensSpecialites->get($id, [
            'contain' => ['Praticiens', 'Specialites']
        ]);

        $this->set('praticiensSpecialite', $praticiensSpecialite);
        
        $this->set([
            'praticiensSpecialite' => $praticiensSpecialite,
            '_serialize' => ['praticiensSpecialite']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $praticiensSpecialite = $this->PraticiensSpecialites->newEntity();
        if ($this->request->is('post')) {
            $praticiensSpecialite = $this->PraticiensSpecialites->patchEntity($praticiensSpecialite, $this->request->getData());
            if ($this->PraticiensSpecialites->save($praticiensSpecialite)) {
                $this->Flash->success(__('The praticiens specialite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The praticiens specialite could not be saved. Please, try again.'));
        }
        $praticiens = $this->PraticiensSpecialites->Praticiens->find('list', ['limit' => 200]);
        $specialites = $this->PraticiensSpecialites->Specialites->find('list', ['limit' => 200]);
        $this->set(compact('praticiensSpecialite', 'praticiens', 'specialites'));
        
        $this->set([
            'praticiensSpecialite' => $praticiensSpecialite,
            '_serialize' => ['praticiensSpecialite']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Praticiens Specialite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $praticiensSpecialite = $this->PraticiensSpecialites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $praticiensSpecialite = $this->PraticiensSpecialites->patchEntity($praticiensSpecialite, $this->request->getData());
            if ($this->PraticiensSpecialites->save($praticiensSpecialite)) {
                $this->Flash->success(__('The praticiens specialite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The praticiens specialite could not be saved. Please, try again.'));
        }
        $praticiens = $this->PraticiensSpecialites->Praticiens->find('list', ['limit' => 200]);
        $specialites = $this->PraticiensSpecialites->Specialites->find('list', ['limit' => 200]);
        $this->set(compact('praticiensSpecialite', 'praticiens', 'specialites'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Praticiens Specialite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $praticiensSpecialite = $this->PraticiensSpecialites->get($id);
        if ($this->PraticiensSpecialites->delete($praticiensSpecialite)) {
            $this->Flash->success(__('The praticiens specialite has been deleted.'));
        } else {
            $this->Flash->error(__('The praticiens specialite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        
        $this->set([
            '_serialize' => ['praticiensSpecialite']
        ]);
    }
}
