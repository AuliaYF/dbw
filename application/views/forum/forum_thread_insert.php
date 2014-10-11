<?php  
$form = array(
    'th_title' => array(
        'name' => 'th_title',
        'class' => 'form-control form_field input-lg',
        'placeholder' => 'Thread title',
        'value' => set_value('user_email', isset($form_value['th_title']) ? $form_value['th_title'] : '')
        ),
    'rp_content' => array(
        'name' => 'rp_content',
        'class' => 'form-control form_field input-lg',
        'placeholder' => 'Thread content',
        'value' => set_value('rp_content', isset($form_value['rp_content']) ? $form_value['rp_content'] : '')
        ),
    'submit' => array(
        'name' => 'submit',
        'id' => 'submit',
        'value' => 'Submit thread',
        'class' => 'btn btn-primary pull-right'
        )
    );
    ?>
<section class="edit-form" style="display: block;"><h2 class="hidden">Forum Edit Form</h2>
    <section><h3 class="hidden">Form Inputs</h3>
        <header class="row">
            <div class="col-md-12">
                <h3>Insert new thread</h3>
            </div>
        </header>
        <?php echo form_open('forum/insert/'.$active_topic); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php 
                            echo form_label('Title', 'th_title', array('class' => 'required'));
                            echo form_input($form['th_title']);
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php 
                            echo form_label('Content', 'rp_content', array('class' => 'required'));
                            echo form_textarea($form['rp_content']);
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Save Button -->
        <section class="row save"><h3 class="hidden">Save</h3>
            <div class="col-md-12">
                <?php echo form_submit($form['submit']); ?>
                <div class="clearfix"></div>
                <div class="underline"></div>
            </div>
        </section>
    <?php echo form_close(); ?>
</section>