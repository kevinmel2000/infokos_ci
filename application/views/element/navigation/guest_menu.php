<?php
$menu = array(
    'Beranda' => 'page/home',
    'Daftar Kost' => 'kost',
    'Peta Lokasi' => 'place',
    'Cara Pembayaran' => 'page/payment',
    'Tentang Kami' => 'page/about_us',
    'Login' => 'member/login');
?>
<ul>
    <?php foreach ($menu as $key=>$val){ ?>
    <li><?php echo anchor($val, $key);?></li>
    <?php } ?>
</ul>