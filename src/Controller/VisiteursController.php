<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Visiteurs Controller
 *
 * @property \App\Model\Table\VisiteursTable $Visiteurs
 *
 * @method \App\Model\Entity\Visiteur[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VisiteursController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $visiteurs = $this->paginate($this->Visiteurs);

        $this->set(compact('visiteurs'));
        
        $this->set([
            'visiteurs' => $visiteurs,
            '_serialize' => ['visiteurs']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Visiteur id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visiteur = $this->Visiteurs->get($id, [
            'contain' => ['Visites']
        ]);

        $this->set('visiteur', $visiteur);
        
        $this->set([
            'visiteur' => $visiteur,
            '_serialize' => ['visiteur']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visiteur = $this->Visiteurs->newEntity();
        if ($this->request->is('post')) {
            $visiteur = $this->Visiteurs->patchEntity($visiteur, $this->request->getData());
            if ($this->Visiteurs->save($visiteur)) {
                $this->Flash->success(__('The visiteur has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The visiteur could not be saved. Please, try again.'));
        }
        $this->set(compact('visiteur'));
        
        $this->set([
            'visiteur' => $visiteur,
            '_serialize' => ['visiteur']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visiteur id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visiteur = $this->Visiteurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visiteur = $this->Visiteurs->patchEntity($visiteur, $this->request->getData());
            if ($this->Visiteurs->save($visiteur)) {
                $this->Flash->success(__('The visiteur has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The visiteur could not be saved. Please, try again.'));
        }
        $this->set(compact('visiteur'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Visiteur id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visiteur = $this->Visiteurs->get($id);
        if ($this->Visiteurs->delete($visiteur)) {
            $this->Flash->success(__('The visiteur has been deleted.'));
        } else {
            $this->Flash->error(__('The visiteur could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        
        $this->set([
            '_serialize' => ['visiteur']
        ]);
    }
}
