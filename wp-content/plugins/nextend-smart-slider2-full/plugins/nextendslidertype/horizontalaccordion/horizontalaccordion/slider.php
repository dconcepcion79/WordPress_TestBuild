<?php
$js = NextendJavascript::getInstance();
$js->addLibraryJsFile('jquery', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'slider.js');
?>
<script type="text/javascript">
    window['<?php echo $id; ?>-onresize'] = [];
</script>

<div id="<?php echo $id; ?>" class="<?php echo $this->_sliderParams->get('accordionhorizontalthemeclass', 'dark'); ?> <?php echo $sliderClasses; ?>" style="font-size: <?php echo intval($fontsize[0]); ?>px;" data-allfontsize="<?php echo intval($fontsize[0]); ?>" data-desktopfontsize="<?php echo intval($fontsize[0]); ?>" data-tabletfontsize="<?php echo intval($fontsize[1]); ?>" data-phonefontsize="<?php echo intval($fontsize[2]); ?>">
    <div class="smart-slider-border1">
        <div class="smart-slider-border2">
            <?php foreach ($this->_slides AS $i => $slide): ?>
                <div class="accordion-horizontal-title">
                    <div class="accordion-horizontal-title-inner">
                        <div class="accordion-horizontal-title-rotate-90">
                            <?php echo $slide['title']; ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-horizontal-slide smart-slider-bg-colored" style="<?php echo $slide['style']; ?>"<?php echo $slide['link']; ?>>
                    <div class="<?php echo $slide['classes']; ?>">
                        <?php if (!$this->_backend && $slide['bg']['desktop']): ?>
                            <img<?php echo $this->makeImg($slide['bg'], $i); ?> class="nextend-slide-bg"/>
                        <?php endif; ?>
                        <?php if ($this->_backend && strpos($slide['classes'], 'smart-slider-slide-active') !== false): ?>
                            <img src="<?php echo ($slide['bg']['desktop'] ? $slide['bg']['desktop'] : 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'); ?>" class="nextend-slide-bg"/>
                        <?php endif; ?>
                        <div class="smart-slider-canvas-inner">
                            <?php echo $items->render($slide['slide'], $i); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    $widgets->echoRemainder();
    ?>
</div>

<?php
$properties['type'] = 'ssHorizontalAccordionSlider';
?>
<script type="text/javascript">
    njQuery(document).ready(function () {
        njQuery('#<?php echo $id; ?>').smartslider(<?php echo json_encode($properties); ?>);
    });
</script>
<div style="clear: both;"></div>