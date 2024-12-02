<section class="faq faq-bot-space">
    <div class="container">
        <?php
        $faqs = get_field('faq'); 
        if($faqs): ?>
        <div class="row">
            <div class="col-md-3">
                <h2>Frequently <br> Asked <br> Questions</h2>
            </div>
            <div class="col-md-9">
                <div class="accordion" id="accordionExample">
                    <?php
                    //Schema code
                    $bread = '';
                        $bread .= '<script type="application/ld+json">
                        {
                          "@context": "https://schema.org",
                          "@type": "FAQPage",
                          "mainEntity": [';
                           $i=1;
                    $num_of_items = count($faqs);
                    $num_count = 0;
                  //END Schema code
                   
                     foreach( $faqs as $faq ):
                    $serv_link = get_permalink( $faq->ID );
                     $stitle = get_the_title( $faq->ID );
                      ?>
                      <?php
                       
                     //Schema code
                        $bread .='{
                            "@type": "Question",
                            "name": "'. $stitle.'",
                            "acceptedAnswer": {
                              "@type": "Answer",
                              "text": "'.$faq->post_content.'"
                            }
                          }';
                    $num_count = $num_count + 1;

                          if ($num_count < $num_of_items) {
                             $bread .=  ",";
                       }
                       //END Schema code
                        ?>


                    <div class="accordion-item">
                        <h4 class="accordion-header" id="heading<?=$i?>">
                            <button class="accordion-button <?php echo ($i == 1) ? '': 'collapsed'; ?> " type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse<?=$i?>" aria-expanded="true"
                                aria-controls="collapse<?=$i?>">
                                <?=$stitle?>
                            </button>
                        </h4>
                        <div id="collapse<?=$i?>"
                            class="accordion-collapse collapse <?php echo ($i == 1) ? 'show': ''; ?>"
                            aria-labelledby="heading<?=$i?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?php if($faq->post_content):echo $faq->post_content; else: echo get_field('answer',$faq->ID);
                                 endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                     
                        $i++; endforeach;

                       
                      //Schema code
                        $bread .= '] } </script>';
                        echo $bread;
                        //END Schema code
                        ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(get_field('cta_copy_title')): ?>
        <div class="home-call-btn">
            <div class="book-cll">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <span>
                            <?=get_field('cta_copy_title')?>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <?php /*  <div class="become-a-customer">
                                <p><?=get_field('cta_copy_shortdescription')?>
                        </p>
                        <a class="prime-btn" href="<?=get_field('cta_links')?>">Contact Us</a>
                    </div> */ ?>
                    <div class="become-a-customer">
                        <p>
                            <?=get_field('cta_copy_shortdescription');?>
                        </p>
                        <?php if(get_field('cta_links')){?><a class="prime-btn"
                            href="<?php echo get_field('cta_links'); ?>">
                            <?=get_field('cta_link_contact_text')?>
                        </a>
                        <?php }else{ ?>
                        <a class="prime-btn" data-bs-toggle="modal"
                            data-bs-target="#<?php echo get_field('cta_link_popup'); ?>">
                            <?=get_field('cta_link_contact_text')?>
                        </a>
                        <?php }?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    </div>
</section>