<div class="contact">
    <div class="content-table">
        <center>
            <h1>Login Pelanggan</h1>
            <p class="message"><?php echo $this->session->flashdata('message'); ?></p>
            <?php echo form_open('member/login/'.  urlencode($this->uri->segment(3))); ?>
                <table style="width: 400px">
                    <tr>
                        <th><label for="username">Email</label></th>
                        <td>
                            <input type="text" name="username" class="form_field" id="username" value="<?php echo set_value('username');?>"/>
                            <?php echo form_error('username', '<p class="field_error">', '</p>');?>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="password">Password</label></th>
                        <td>
                            <input type="password" name="password" class="form_field" id="password" value="<?php echo set_value('password');?>"/>
                            <?php echo form_error('password', '<p class="field_error">', '</p>');?>
                        </td>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <td><input type="submit" value="Login" id="submit"/></td>
                    </tr>
                </table>
            <?php echo form_close(); ?>
            <h2>
                <?php echo anchor('member/register/'.  urlencode($this->uri->segment(3)), 'Register'); ?>
            </h2>
        </center>
    </div>
</div>