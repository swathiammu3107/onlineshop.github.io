<div class="mep-event-meta">
    <?php _e(mep_get_label($post_id, 'mep_share_text', "Share This $event_label:"), 'mage-eventpress'); ?>
    <ul class='mep-social-share'>
        <?php do_action('mep_before_social_share_list',get_the_id()); ?>
        <li> <a data-toggle="tooltip" title="" class="facebook" onclick="window.open('https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" data-original-title="Share on Facebook"><i class="fab fa-facebook-f"></i></a></li>
        <li><a data-toggle="tooltip" title="" class="twitter" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" data-original-title="Twittet it"><i class="fab fa-twitter"></i></a></li>
        <?php do_action('mep_after_social_share_list',get_the_id()); ?>
    </ul>
</div>