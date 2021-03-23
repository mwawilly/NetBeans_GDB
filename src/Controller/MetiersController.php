<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Metiers Controller
 *
 * @property \App\Model\Table\MetiersTable $Metiers
 *
 * @method \App\Model\Entity\Metier[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MetiersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $metiers = $this->paginate($this->Metiers);

        $this->set(compact('metiers'));
        
        $this->set([
            'metiers' => $metiers,
            '_serialize' => ['metiers']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Metier id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $metier = $this->Metiers->get($id, [
            'contain' => ['Praticiens']
        ]);

        $this->set('metier', $metier);
        
        $this->set([
            'metier' => $metier,
            '_serialize' => ['metier']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $metier = $this->Metiers->newEntity();
        if ($this->request->is('post')) {
            $metier = $this->Metiers->patchEntity($metier, $this->request->getData());
            if ($this->Metiers->save($metier)) {
                $this->Flash->success(__('The metier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The metier could not be saved. Please, try again.'));
        }
        $this->set(compact('metier'));
        
        $this->set([
            'metier' => $metier,
            '_serialize' => ['metier']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Metier id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $metier = $this->Metiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $metier = $this->Metiers->patchEntity($metier, $this->request->getData());
            if ($this->Metiers->save($metier)) {
                $this->Flash->success(__('The metier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The metier could not be saved. Please, try again.'));
        }
        $this->set(compact('metier'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Metier id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $metier = $this->Metiers->get($id);
        if ($this->Metiers->delete($metier)) {
            $this->Flash->success(__('The metier has been deleted.'));
        } else {
            $this->Flash->error(__('The metier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        
        $this->set([
            '_serialize' => ['metier']
        ]);
    }
}
