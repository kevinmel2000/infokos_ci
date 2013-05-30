<div class="gallery">
    <h1>Daftar Kosan</h1>
    <?php $this->load->view('element/search/kost'); ?>
    <div>
        <ul>
            <?php
            foreach ($kost as $item) {
                if (!empty($item->location)) {
                    $image = base_url() . 'webroot/images/small_' . $item->location;
                } else {
                    $image = base_url() . 'webroot/images/na-135x135.jpg';
                }
                ?>
                <li>
                    <?php echo anchor('kost/detail/'.$item->id, '<img src="' . $image . '" alt="' . $item->name . '"/>'); ?>
                    <span>
                        <?php echo anchor('kost/detail/'.$item->id, $item->name); ?>
                        <span>
                            <?php
                            if ($item->male > 0 || $item->female > 0) {
                                echo 'Kosan';
                                if ($item->male > 0)
                                    echo ' Putra';
                                if ($item->female > 0)
                                    echo ' Putri';
                            }
                            if (!empty($item->max_price))
                                echo '<br/>Harga Rp. ' . number_format($item->max_price, 2, ',', '.') . '/' . $item->room_type
                                ?>
                        </span>
                    </span>
                    <?php
                }
                ?>
            </li>	
        </ul>	
    </div>
    <p><?php echo $pagination ?></p>
</div>
