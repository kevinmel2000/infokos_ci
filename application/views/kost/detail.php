<?php if (!empty($image_kosts)) { ?>
    <div style="position: relative;height: 330px;width: 620px;margin: 0 auto 50px;">
        <div id="slides" style="margin:40px 0 10px 60px">
            <div class="slides_container">
                <?php
                foreach ($image_kosts->result() as $image_kost) {
                    if (!empty($image_kost->location)) {
                        $img = base_url() . 'webroot/images/medium_' . $image_kost->location;
                    } else {
                        $img = base_url() . 'webroot/na-447x456.jpg';
                    }
                    ?>
                    <div class="slide">
                        <a href="<?php echo $img ?>" title="<?php echo $image_kost->information ?>" target="_blank"><img src="<?php echo $img ?>" width="570" height="270"></a>
                        <div class="caption" style="bottom:0">
                            <p><?php echo $image_kost->information ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a href="#" class="prev"><img src="<?php echo base_url() ?>webroot/img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
            <a href="#" class="next"><img src="<?php echo base_url() ?>webroot/img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
        </div>
        <div style="clear: both"></div>
    </div>
    <?php
}
?>

<div class="gallery">
    <?php echo anchor('kost','Kembali',array('class' => 'button-h2 cancel')) ?>
    <div style="clear: both"></div>
    <div class="content-table">
        <table>
            <tr><th width="135px">Nama Kosan</th><td><?php echo $kost->name ?></td><tr>
            <tr><th>Alamat</th><td><?php echo $kost->address ?></td><tr>
            <tr><th>Pemilik</th><td><?php echo $kost->owner_name ?></td><tr>
            <tr><th>No. Telepon</th><td><?php echo $kost->phone ?></td><tr>
            <tr><th>Fasilitas</th><td>
                    <ul>
                        <?php
                        foreach ($facilities->result() as $val) {
                            echo '<li style="list-style: disc;margin:5px 10px 5px 14px;width:100%"><b>' . $val->name . '</b><br/>';
                            echo $val->information . '</li>';
                        }
                        ?>
                    </ul>
                </td><tr>
            <tr><th>Keterangan</th><td><?php echo $kost->information ?></td><tr>
        </table>
    </div>
    <h2>Daftar Kamar Kost <?php echo $kost->name ?></h2>
    <div>
        <ul>
            <?php
            foreach ($rooms as $room) {
                ?>
                <li>
                    <a href="<?php echo site_url('room/detail/' . $room->id) ?>"><img src="
                        <?php
                        if (!empty($room->location)) {
                            echo base_url() . 'webroot/images/small_' . $room->location;
                        } else {
                            echo base_url() . 'webroot/images/na-135x135.jpg';
                        }
                        ?>
                                                                                      " alt="" /></a>
                    <span>
                        <?php echo anchor('room/detail/' . $room->id, $room->name) ?>
                        <br>
                        <?php
                        if (!empty($room->price))
                            echo '<span>Kamar ';
                        if ($room->gender == 'M') {
                            echo 'Putra';
                        } else {
                            echo 'Putri';
                        }
                        echo '<br/>Harga Rp. ' . number_format($room->price, 2, '.', ',') . '/' . $room->type . '</span>'
                        ?>
                    </span>
                </li>	
                <?php
            }
            ?>
        </ul>	
    </div>
    <p><?php echo $pagination; ?></p>
</div>