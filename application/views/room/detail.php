<?php if (!empty($image_rooms)) { ?>
    <div style="position: relative;height: 330px;width: 620px;margin: 0 auto 50px;">
        <div id="slides" style="margin:40px 0 10px 60px">
            <div class="slides_container">
                <?php
                foreach ($image_rooms->result() as $image_room) {
                    if (!empty($image_room->location)) {
                        $img = base_url() . 'webroot/images/medium_' . $image_room->location;
                    } else {
                        $img = base_url() . 'webroot/na-447x456.jpg';
                    }
                    ?>
                    <div class="slide">
                        <a href="<?php echo $img ?>" title="<?php echo $image_room->information ?>" target="_blank"><img src="<?php echo $img ?>" width="570" height="270"></a>
                        <div class="caption" style="bottom:0">
                            <p><?php echo $image_room->information ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a href="#" class="prev"><img src="<?php echo base_url() ?>webroot/img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
            <a href="#" class="next"><img src="<?php echo base_url() ?>webroot/img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
        </div>
        <div style="clear: both"></div>
    </div>
<?php } ?>

<div class="gallery">
    <h1>Data Kamar <?php echo $room->name ?></h1>
    <?php
    if ($room->is_content == 0) {
        echo anchor('order/ordering/' . $room->id, 'Pesan Sekaran', array('class' => 'button-h2'));
    }
    echo anchor('kost/detail/' . $kost->id, 'Kembali', array('class' => 'button-h2 cancel'));
    ?>
    <div style="clear: both"></div>
    <div class="content-table">
        <table>
            <tr><th width="135px">Nama Kamar</th><td><?php echo $room->name ?></td><tr>
            <tr><th>Jenis</th>
                <td>
                    <?php
                    if ($room->gender == 'M') {
                        echo 'Putra';
                    } else {
                        echo 'Putri';
                    }
                    ?>
                </td>
            <tr>
            <tr><th>Keterangan</th><td><?php echo $room->information ?></td><tr>
            <tr><th>Harga</th><td>
                    <ul>
                        <?php
                        foreach ($room_prices->result() as $price) {
                            echo '<li style="list-style: square;margin:5px 10px 5px 14px;width:100%">Rp. ' . number_format($price->price, 2, ',', '.') . '/' . $price->type . '</li>';
                        }
                        ?>
                    </ul>
                </td></tr>
        </table>
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
</div>