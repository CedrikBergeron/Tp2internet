<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Regions Controller
 *
 * @property \App\Model\Table\RegionsTable $Regions
 *
 * @method \App\Model\Entity\Region[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegionsController extends AppController {

    public function initialize() {
        parent::initialize();
//        $this->viewBuilder()->setLayout('cakephp_default');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $regions = $this->paginate($this->Regions);

        $this->set(compact('regions'));
    }

    /**
     * View method
     *
     * @param string|null $id Region id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $region = $this->Regions->get($id, [
            'contain' => ['Airlines', 'Countries'],
        ]);

        $this->set('region', $region);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $region = $this->Regions->newEntity();
        if ($this->request->is('post')) {
            $region = $this->Regions->patchEntity($region, $this->request->getData());
            if ($this->Regions->save($region)) {
                $this->Flash->success(__('The regions has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regions could not be saved. Please, try again.'));
        }
        
        $this->set(compact('region'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Region id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $region = $this->Regions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $region = $this->Regions->patchEntity($region, $this->request->getData());
            if ($this->Regions->save($region)) {
                $this->Flash->success(__('The regions has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regions could not be saved. Please, try again.'));
        }
        $this->set(compact('region'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Region id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $region = $this->Regions->get($id);
        if ($this->Regions->delete($region)) {
            $this->Flash->success(__('The regions has been deleted.'));
        } else {
            $this->Flash->error(__('The regions could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
