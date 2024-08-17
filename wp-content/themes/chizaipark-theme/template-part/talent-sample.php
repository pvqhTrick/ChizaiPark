<?php 
$sample = get_field($args['voice']);
?>
<li>
    <p class="sampleName"><?php echo $args['name']?></p>
    <ul class="listVoice">
        <?php 
        for($i = 1; $i <= 5; $i++):
            $voice_url = isset($sample[$i-1]) ? $sample[$i-1]['voice'] : '';
        ?>
            <li>
                <a href="" class="hover <?php echo $voice_url ? 'active' : '';?>" data-audio-url="<?php echo esc_url($voice_url); ?>">
                    <?php echo $i; ?>
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</li>
