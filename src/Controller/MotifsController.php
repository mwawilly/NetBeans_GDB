<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Motifs Controller
 *
 * @property \App\Model\Table\MotifsTable $Motifs
 *
 * @method \App\Model\Entity\Motif[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MotifsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $motifs = $this->paginate($this->Motifs);

        $this->set(compact('motifs'));
        
        $this->set([
            'motifs' => $motifs,
            '_serialize' => ['motifs']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Motif id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $motif = $this->Motifs->get($id, [
            'contain' => ['Visites']
        ]);

        $this->set('motif', $motif);
        
        $this->set([
            'motif' => $motif,
            '_serialize' => ['motif']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $motif = $this->Motifs->newEntity();
        if ($this->request->is('post')) {
            $motif = $this->Motifs->patchEntity($motif, $this->request->getData());
            if ($this->Motifs->save($motif)) {
                $this->Flash->success(__('The motif has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The motif could not be saved. Please, try again.'));
        }
        $this->set(compact('motif'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Motif id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $motif = $this->Motifs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $motif = $this->Motifs->patchEntity($motif, $this->request->getData());
            if ($this->Motifs->save($motif)) {
                $this->Flash->success(__('The motif has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The motif could not be saved. Please, try again.'));
        }
        $this->set(compact('motif'));
        
        $this->set([
            'motif' => $motif,
            '_serialize' => ['motif']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Motif id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $motif = $this->Motifs->get($id);
        if ($this->Motifs->delete($motif)) {
            $this->Flash->success(__('The motif has been deleted.'));
        } else {
            $this->Flash->error(__('The motif could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        
        $this->set([
            '_serialize' => ['motif']
        ]);
    }
}
