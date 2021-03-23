<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Praticiens Controller
 *
 * @property \App\Model\Table\PraticiensTable $Praticiens
 *
 * @method \App\Model\Entity\Praticien[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PraticiensController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Metiers']
        ];
        $praticiens = $this->paginate($this->Praticiens);

        $this->set(compact('praticiens'));
        
        $this->set([
            'praticiens' => $praticiens,
            '_serialize' => ['praticiens']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Praticien id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $praticien = $this->Praticiens->get($id, [
            'contain' => ['Metiers', 'Specialites', 'Visites']
        ]);

        $this->set('praticien', $praticien);
        
        $this->set([
            'praticien' => $praticien,
            '_serialize' => ['praticien']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $praticien = $this->Praticiens->newEntity();
        if ($this->request->is('post')) {
            $praticien = $this->Praticiens->patchEntity($praticien, $this->request->getData());
            if ($this->Praticiens->save($praticien)) {
                $this->Flash->success(__('The praticien has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The praticien could not be saved. Please, try again.'));
        }
        $metiers = $this->Praticiens->Metiers->find('list', ['limit' => 200]);
        $specialites = $this->Praticiens->Specialites->find('list', ['limit' => 200]);
        $this->set(compact('praticien', 'metiers', 'specialites'));
        
        $this->set([
            'praticien' => $praticien,
            '_serialize' => ['praticien']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Praticien id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $praticien = $this->Praticiens->get($id, [
            'contain' => ['Specialites']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $praticien = $this->Praticiens->patchEntity($praticien, $this->request->getData());
            if ($this->Praticiens->save($praticien)) {
                $this->Flash->success(__('The praticien has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The praticien could not be saved. Please, try again.'));
        }
        $metiers = $this->Praticiens->Metiers->find('list', ['limit' => 200]);
        $specialites = $this->Praticiens->Specialites->find('list', ['limit' => 200]);
        $this->set(compact('praticien', 'metiers', 'specialites'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Praticien id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $praticien = $this->Praticiens->get($id);
        if ($this->Praticiens->delete($praticien)) {
            $this->Flash->success(__('The praticien has been deleted.'));
        } else {
            $this->Flash->error(__('The praticien could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        
        $this->set([
            '_serialize' => ['praticien']
        ]);
    }
}
