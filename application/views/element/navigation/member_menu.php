<?php
$menu = array(
    'Beranda' => 'page/home',
    'Daftar Kost' => 'kost',
    'Peta Lokasi' => 'place',
    'Transaksi' => 'order',
    'Cara Pembayaran' => 'page/payment',
    'Tentang Kami' => 'page/about_us',
    'Profil' => 'member/profile',
    'Logout' => 'member/logout');
?>
<ul>
    <?php foreach ($menu as $key=>$val){ ?>
    <li><?php echo anchor($val, $key);?></li>
    <?php } ?>
</ul>
