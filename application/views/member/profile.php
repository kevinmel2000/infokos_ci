<div class="contact">
    <h1>Profile User</h1>
    <div class="content-table">
        <table>
            <tr>
                <th width="200px">Nama</th>
                <td><?php echo $member[0]->name ?></td>
                <td rowspan="7" width="235px">
                    <?php
                    if (empty($member[0]->photo)) {
                        $img = base_url()."webroot/photos/na.jpg";
                    } else {
                        $img = base_url().'webroot/photos/small_' . $member[0]->photo;
                    }
                    ?>
                    <img src="<?php echo $img; ?>" style="width: 215px;border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;border:2px solid #000;"/>
                </td>
            </tr>
            <tr>
                <th>No. KTP</th>
                <td><?php echo $member[0]->ktp ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $member[0]->email ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $member[0]->address ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>
                    <?php
                    if ($member[0]->gender == 'M') {
                        echo 'Laki - Laki';
                    }  else {
                        echo 'Perempuan';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>No. Handphone</th>
                <td><?php echo $member[0]->phone ?></td>
            </tr>
            <tr>
                <th>Kampus</th>
                <td><?php echo $member[0]->campus ?></td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <th align="center" colspan="2"><input type="button" onclick="location.href = '<?php echo site_url() ?>/member/edit'" value="Edit Profile"/></th>
            </tr>
        </table>
    </div>
</div>
