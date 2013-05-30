<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Place extends CI_Controller {

    var $limit = 10;

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Peta Lokasi ';
        $data['place_types'] = $this->db->get_where('place_types', array('is_active' => 1));
        $data['content'] = $this->router->class . '/' . $this->router->method;
        $this->load->view('layout/maps', $data);
    }

    public function get_places() {
        $this->load->model('Place_model');
        $places = $this->Place_model->getPlaceMaps($this->uri->segment(3));

        $data = array();
        foreach ($places as $place) {
            if (empty($place->kost_name)) {
                $info = $place->place_name . " (<b>" . $place->place_type_name . "</b>)<br/>" . $place->address;
            } else {
                $info = anchor('kost/detail/' . $place->kost_id, $place->kost_name) . " (<b>" . $place->place_type_name . "</b>)<br/>" . $place->address . "<br/>Harga Rp. " . number_format($place->price, 2, ',', '.') . "/" . $place->type;
            }
            $data[] = array(
                'id' => $place->id,
                'bujur' => $place->longitude,
                'lintang' => $place->latitude,
                'info' => $info,
                'icon' => $place->image,
                'nama' => $place->place_name,
                'id_kost' => $place->kost_id
            );
        }

        echo json_encode($data);
        die;
    }

    public function get_images() {
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $place = $this->db->get('places')->result();
        if ($place[0]->kost_id > 0) {
            $images = $this->db->get_where('image_kosts', array('kost_id' => $place[0]->kost_id, 'is_active' => 1));

            $this->load->model('Facilities_model');
            $facilities = $this->Facilities_model->getKostFacilities($place[0]->kost_id);
            foreach ($facilities->result() as $item) {
                $fasilitas_kost .= '<li><b>' . $item->name . '</b><br/>';
                $fasilitas_kost .= $item->information . '</li>';
            }

            $this->load->model('Kost_model');
            $kost = $this->Kost_model->getKost($place[0]->kost_id);
            $data["detail"] = '<table cellspacing="0" cellpadding="5px">
                                <tr>
                                    <th>Nama Pemilik</th>
                                    <td>: ' . $kost[0]->owner_name . '</td>
                                </tr>
                                <tr>
                                    <th>No. Handphone</th>
                                    <td>: ' . $kost[0]->phone . '</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: ' . $kost[0]->email . '</td>
                                </tr>
                                <tr>
                                    <th>Nama Kosan</th>
                                    <td>: ' . $kost[0]->name . '</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: ' . $kost[0]->address . '</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>: <ul>' . $kost[0]->information . '</li></td>
                                </tr>
                                <tr>
                                    <th>Fasilitas</th>
                                    <td>: ' . @$fasilitas_kost . '</td>
                                </tr>
                            </table>';
        } else {
            $images = $this->db->get_where('image_places', array('place_id' => $id, 'is_active' => 1));

            $place = $this->db->get('places')->result();
            $data["detail"] = '<table cellspacing="0" cellpadding="5px">
                            <tr>
                                <th>Nama Tempat</th>
                                <td>: ' . $place->name . '</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: ' . $place->address . '</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>: ' . $place->information . '</td>
                            </tr>
                            </table>';
        }

        foreach ($images->result() as $image){
            $data['image'][] = array(
                'id' => $image->id,
                'lokasi' => $image->location,
                'keterangan' => $image->information,
            );
        }

        echo json_encode($data);
        die;
    }

}