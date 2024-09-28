<?php $work_hours = [
    'monday' => '7am - 5:30pm',
    'tuesday' => '7am - 5:30pm',
    'wednesday' => '7am - 5:30pm',
    'thursday' => '7am - 5:30pm',
    'friday' => '7am - 5:30pm',
    'saturday' => '8am - 5pm',
    'sunday' => 'closed',
];?>
<section class="work-hours container">
    <h2 class="title">
        Store <span class="purple-text">hours</span>
    </h2>

    <div class="work-hours-con">
        <div class="img-wrapper">
            <?= wp_get_attachment_image(get_field('work_hours_img'), 'full') ?>
        </div>

        <div class="table-con">
            <table>
                <?php foreach ($work_hours as $day => $time): ?>
                    <tr>
                        <td>
                            <?= $day ?>
                        </td>
                        <td>
                            <?= $time ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>