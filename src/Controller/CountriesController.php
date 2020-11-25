<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Countries Controller
 *
 * @property \App\Model\Table\CountriesTable $Countries
 *
 * @method \App\Model\Entity\Country[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CountriesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['getByRegion', 'add', 'edit', 'delete']);
    }

    public function getByRegion() {
        $region_id = $this->request->query('region_id');

        $countries = $this->Countries->find('all', [
            'conditions' => ['Countries.region_id' => $region_id],
        ]);
        /**/        $this->set('countries', $countries);
                  $this->set('_serialize', ['countries']);
        /**/
        /*      $data = '';
                foreach ($countries as $country) {
                    $data .= '<option value="' . $country->id . '">' . $country->name . '</option>';
                }
                $this->autoRender = false; // ligne ajoutée
                echo $data;
         */
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Regions'],
        ];
        $countries = $this->paginate($this->Countries);

        $this->set(compact('countries'));
    }

    /**
     * View method
     *
     * @param string|null $id country id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $country = $this->Countries->get($id, [
            'contain' => ['Regions', 'Airlines'],
        ]);

        $this->set('country', $country);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $country = $this->Countries->newEntity();
        if ($this->request->is('post')) {
            $country = $this->Countries->patchEntity($country, $this->request->getData());
            if ($this->Countries->save($country)) {
                $this->Flash->success(__('The country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The country could not be saved. Please, try again.'));
        }
        $regions = $this->Countries->Regions->find('list', ['limit' => 200]);
        $this->set(compact('country', 'regions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id country id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $country = $this->Countries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $country = $this->Countries->patchEntity($country, $this->request->getData());
            if ($this->Countries->save($country)) {
                $this->Flash->success(__('The country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The country could not be saved. Please, try again.'));
        }
        $regions = $this->Countries->Regions->find('list', ['limit' => 200]);
        $this->set(compact('country', 'regions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id country id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $country = $this->Countries->get($id);
        if ($this->Countries->delete($country)) {
            $this->Flash->success(__('The country has been deleted.'));
        } else {
            $this->Flash->error(__('The country could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
