<section class="call-to-action">
    <?php $phone_number_1 = get_option('cyn_phone_number_one'); ?>
    <div class="container">
        <a href=<?= 'tel:' . isset($phone_number_1) ? $phone_number_1 : ''; ?> class="secondary-btn">
            <i class="icon-phone"></i>
            call us now
        </a>
        <span>
            we are here for you 24 /7 ,call us now </span>
    </div>
</section>