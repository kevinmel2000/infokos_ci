<?php
$config = array(
    'member/register' => array(
        array(
            'field' => 'name',
            'label' => 'Nama',
            'rules' => 'required|alpha'
        ),
        array(
            'field' => 'ktp',
            'label' => 'KTP',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[members.email]'
        ),
        array(
            'field' => 'gender',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'
        ),
        array(
            'field' => 'phone',
            'label' => 'No. Handphone',
            'rules' => 'required|numeric|min_length[8]|max_length[12]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[5]'
        ),
        array(
            'field' => 'conf_password',
            'label' => 'Konfirmasi Password',
            'rules' => 'required|min_length[5]|matches[password]'
        ),
    )
);
?>
