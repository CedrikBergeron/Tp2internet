<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Airlines Controller
 *
 * @property \App\Model\Table\AirlinesTable $Airlines
 *
 * @method \App\Model\Entity\Airline[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AirlinesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['findAirlines', 'add', 'edit', 'delete']);
        $this->viewBuilder()->setLayout('cakephp_default');

    }

    /**
     * findAirline method
     * for use with JQuery-UI Autocomplete
     *
     * @return JSon query result
     */
    public function findAirlines() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Airlines->find('all', array(
                'conditions' => array('Airlines.name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['id']);
            }
            echo json_encode($resultArr);
        }
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Regions', 'Countries'],
        ];
        $airlines = $this->paginate($this->Airlines);

        $this->set(compact('airlines'));
    }

    /**
     * View method
     *
     * @param string|null $id Airline id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $airline = $this->Airlines->get($id, [
            'contain' => ['Regions', 'Countries'],
        ]);

        $this->set('airline', $airline);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $airline = $this->Airlines->newEntity();
        if ($this->request->is('post')) {
            $airline = $this->Airlines->patchEntity($airline, $this->request->getData());
            if ($this->Airlines->save($airline)) {
                $this->Flash->success(__('The Airline has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Airline could not be saved. Please, try again.'));
        }
        $regions = $this->Airlines->Regions->find('list', ['limit' => 200]);
        $countries = $this->Airlines->Countries->find('list', ['limit' => 200]);
        $this->set(compact('airline', 'regions', 'countries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Airline id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $airline = $this->Airlines->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $airline = $this->Airlines->patchEntity($airline, $this->request->getData());
            if ($this->Airlines->save($airline)) {
                $this->Flash->success(__('The Airline has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Airline could not be saved. Please, try again.'));
        }
        $regions = $this->Airlines->Regions->find('list', ['limit' => 200]);
        $countries = $this->Airlines->Countries->find('list', ['limit' => 200]);
        $this->set(compact('airline', 'regions', 'countries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Airline id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $airline = $this->Airlines->get($id);
        if ($this->Airlines->delete($airline)) {
            $this->Flash->success(__('The Airline has been deleted.'));
        } else {
            $this->Flash->error(__('The Airline could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
