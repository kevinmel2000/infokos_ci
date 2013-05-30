<div class="contact">
    <h1>Edit Data Profile User</h1>
    <p class="message"><?php echo $this->session->flashdata('message'); ?></p>
    <div class="content-table">
        <?php echo form_open_multipart('member/edit'); ?>
        <table>
            <tr>
                <th width="200px">Nama <span class="red">*</span></th>
                <td>
                    <input type="text" class="form_field"  name="name" size="40" value="<?php echo set_value('name', $member[0]->name) ?>"/>
                    <?php echo form_error('name', '<p class="field_error">', '</p>');?>
                </td>
                <td rowspan="7" width="235px">
                    <?php
                    if (empty($member[0]->photo)) {
                        $img = base_url()."webroot/photos/na.jpg";
                    } else {
                        $img = base_url().'webroot/photos/small_' . $member[0]->photo;
                    }
                    ?>
                    <img src="<?php echo $img ?>" style="width: 215px;border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;border:2px solid #000;"/>
                </td>
            </tr>
            <tr>
                <th>No. KTP <span class="red">*</span></th>
                <td>
                    <input type="text" class="form_field"  name="ktp" size="40" value="<?php echo set_value('ktp', $member[0]->ktp) ?>"/>
                    <?php echo form_error('ktp', '<p class="field_error">', '</p>');?>
                </td>
            </tr>
            <tr>
                <th>Email <span class="red">*</span></th>
                <td>
                    <input type="text" class="form_field"  name="email" size="40" value="<?php echo set_value('email', $member[0]->email) ?>"/>
                    <?php echo form_error('email', '<p class="field_error">', '</p>');?>
                </td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><textarea name="alamat" rows="3" cols="56"><?php echo set_value('address', $member[0]->address) ?></textarea></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <?php if ($member[0]->gender == 'M') { ?>
                    <td>
                        <input type="radio" name="jenis_kelamin" value="M" checked="checked"/> Laki-laki 
                        <input type="radio" name="jenis_kelamin" value="F"/> Perempuan                            
                    </td>
                <?php } else { ?>
                    <td>
                        <input type="radio" name="jenis_kelamin" value="M"/> Laki-laki 
                        <input type="radio" name="jenis_kelamin" value="F" checked="checked"/> Perempuan                            
                    </td>
                <?php } ?>
            </tr>
            <tr>
                <th>No. Handphone <span class="red">*</span></th>
                <td>
                    <input type="text" class="form_field"  name="phone" size="40" value="<?php echo set_value('phone', $member[0]->phone) ?>"/>
                    <?php echo form_error('phone', '<p class="field_error">', '</p>');?>
                </td>
            </tr>
            <tr>
                <th>Kampus</th>
                <td>
                    <input type="text" name="kampus" size="40" value="<?php echo set_value('campus', $member[0]->campus) ?>"/>
                </td>
            </tr>
            <tr>
                <th>Edit Password</th>
                <td>
                    <input type="radio" class="edit_pass" value="ya" name="edit_pass"/>Ya 
                    <input type="radio" class="edit_pass" value="tidak" name="edit_pass" checked="checked"/>Tidak
                </td>
                <td><input type="file" name="photo" size="10"/></td>
            </tr>
            <tr class="password" style="display: none">
                <th>Password Lama</th>
                <td colspan="2">
                    <input type="password" class="form_field"  name="password" size="40" value="<?php echo set_value('password') ?>"/>
                    <?php echo form_error('password', '<p class="field_error">', '</p>');?>
                </td>
            </tr>
            <tr class="password" style="display: none">
                <th>Password Baru</th>
                <td colspan="2">
                    <input type="password" class="form_field"  name="new_password" size="40" value="<?php echo set_value('new_password') ?>"/>
                    <?php echo form_error('new_password', '<p class="field_error">', '</p>');?>
                </td>
            </tr>
            <tr class="password" style="display: none">
                <th>Konfirmasi Password</th>
                <td colspan="2">
                    <input type="password" class="form_field"  name="conf_password" size="40" value="<?php echo set_value('conf_password') ?>"/>
                    <?php echo form_error('conf_password', '<p class="field_error">', '</p>');?>
                </td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <th align="center" colspan="2"><input type="submit" value="Simpan"/></th>
            </tr>
        </table>
        <?php echo form_close() ?>
    </div>
</div>
<script type="text/javascript">
    $('.edit_pass').live('click',function(){
        $('.password').hide();
        if($(this).val() == 'ya'){
            $('.password').show();
        }
    })
</script>