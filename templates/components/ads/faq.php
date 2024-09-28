<section class="container">
    <h2>frequently asked questions</h2>
    <div class="faq">
        <?php
        $faq_tabs = get_field("question_1");
        if ($faq_tabs['faq_1']['question']): ?>
            <div class="tab">
                <p class="faq-tab">
                    <?= get_field("fq_tab_tittle_1"); ?>
                </p>
                <div class="faq-content  active">
                    <?php
                    foreach ($faq_tabs as $faq_tab):
                        if ($faq_tab['question'] || $faq_tab['answer']):
                            ?>
                            <ul>
                                <li class="question"><?= $faq_tab['question']; ?></li>
                                <li class="answer"><?= $faq_tab['answer']; ?></li>
                            </ul>
                        <?php endif; endforeach; endif; ?>
            </div>
        </div>
        <?php
        $faq_tabs = get_field("question_2");
        if ($faq_tabs['faq_1']['question']): ?>
            <div class="tab">
                <p class="faq-tab"><?= get_field("fq_tab_tittle_2"); ?></p>
                <div class="faq-content  ">
                    <?php
                    foreach ($faq_tabs as $faq_tab):
                        if ($faq_tab['question'] || $faq_tab['answer']):
                            ?>
                            <ul>
                                <li class="question"><?= $faq_tab['question']; ?></li>
                                <li class="answer"><?= $faq_tab['answer']; ?></li>
                            </ul>
                        <?php endif; endforeach; endif; ?>
            </div>

        </div>

        <?php
        $faq_tabs = get_field("question_3");
        if ($faq_tabs['faq_1']['question']): ?>
            <div class="tab">
                <p class="faq-tab"><?= get_field("fq_tab_tittle_3"); ?></p>
                <div class="faq-content  ">
                    <?php
                    foreach ($faq_tabs as $faq_tab):
                        if ($faq_tab['question'] || $faq_tab['answer']):
                            ?>
                            <ul>
                                <li class="question"><?= $faq_tab['question']; ?></li>
                                <li class="answer"><?= $faq_tab['answer']; ?></li>
                            </ul>
                        <?php endif; endforeach; endif; ?>
            </div>


        </div>

        <?php
        $faq_tabs = get_field("question_4");
        if ($faq_tabs['faq_1']['question']): ?>
            <div class="tab">
                <p class="faq-tab"><?= get_field("fq_tab_tittle_4"); ?></;>
                <div class="faq-content  ">
                    <?php
                    foreach ($faq_tabs as $faq_tab):
                        if ($faq_tab['question'] || $faq_tab['answer']):
                            ?>
                            <ul>
                                <li class="question"><?= $faq_tab['question']; ?></li>
                                <li class="answer"><?= $faq_tab['answer']; ?></li>
                            </ul>
                        <?php endif; endforeach; endif; ?>
            </div>

        </div>


    </div>
</section>