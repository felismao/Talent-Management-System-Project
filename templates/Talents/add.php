<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent $talent
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 * @var string[]|\Cake\Collection\CollectionInterface $locations
 */
?>

<!-- ======= Page CSS ======= -->
<style>
    .row {
        white-space: nowrap;
    }

    .row > div {
        width: 300px;
        display: inline-block;
    }

    h2{
        color:#000000!important;
    }
    p, li, div{
        color:#000000!important;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        position: absolute;
        left: 0;
    }

    input::-webkit-datetime-edit {
        position: relative;
        left: 15px;
    }

    input::-webkit-datetime-edit-fields-wrapper {
        position: relative;
        left: 15px;
    }

    input:hover, textarea:hover, select:hover {
        outline: none;
        border: 1px solid #095484;
        background: #e6eef7;
    }
    .title-block select, .title-block input {
        margin-bottom: 10px;
    }
</style>

<!-- Core theme CSS -->
<?= $this->Html->css('form.css') ?>

<!-- Set the background to white -->
<body style="background-color:#ffffff;">

<!-- ======= Create The Talent Registration Form ======= -->
<main id="main" data-aos="fade" data-aos-delay="1500">
    <section id="about" class="about">
        <div class="container">
            <div class="container" style="padding: 20%">
                <!-- create the form -->
                <?= $this->Form->create($talent, ['type'=>'file']) ?>
                <form>
                    <h2>Talent Registration</h2>

                    <div class="colums">
                        <div class="item">
                            <!-- text field -->
                            <label for="name">First Name<span>*</span></label>
                            <?php echo $this->Form->input('firstname', array('label'=>''));?>
                        </div>
                        <div class="item">
                            <!-- text field -->
                            <label for="name">Last Name<span>*</span></label>
                            <?php echo $this->Form->input('lastname', array('label'=>''));?>
                        </div>
                        <div class="item">
                            <!-- text field -->
                            <label for="name">Pseudonym</label>
                            <?php echo $this->Form->input('name', array('label'=>''));?>
                        </div>
                        <div class="item">
                            <!-- text field -->
                            <label for="eaddress">Email Address<span>*</span></label>
                            <?php echo $this->Form->input('email', array('label'=>'', 'type' => 'email'));?>
                        </div>
                        <div class="item">
                            <!-- text field -->
                            <label for="phone">Phone Number<span>*</span></label>
                            <?php echo $this->Form->input('mobile', array('label'=>'','type' => 'number'));?>
                        </div>
                        <div class="item">
                            <!-- text field -->
                            <label for="street">Street</label>
                            <?php echo $this->Form->input('address', array('label'=>''));?>
                        </div>
                        <div class="item">
                            <!-- text field -->
                            <label for="city">Suburb</label>
                            <?php echo $this->Form->input('suburb', array('label'=>''));?>
                        </div>
                        <div class="item">
                            <!-- text field -->
                            <label for="zip">Postcode</label>
                            <?php echo $this->Form->input('postcode', array('label'=>'','type' => 'number'));?>
                        </div>
                    </div>
                    <div class="colums">
                        <div class="item">
                            <!-- date field -->
                            <label for="dob">Date of Birth<span>*</span></label>
                            <?php echo $this->Form->control('dob', ['type' => 'date', 'label'=>'', 'style'=>'width: 135px; padding-top: -50px;']); ?>
                        </div>
                        <div class="item">
                            <!-- small text field -->
                            <label for="dob">Height (cm)<span>*</span></label>
                            <?php echo $this->Form->control('height', array('label'=>'','style'=>'width:60px'))?>
                        </div>
                    </div>
                    <div class="colums">
                        <div class="item">
                            <!-- dropdown menu -->
                            <label for="state">Location<span>*</span></label><br>
                            <?php echo $this->Form->select('location_id', $locations, ['empty' => true,'label'=>'']); ?>
                        </div>

                        <div class="item">
                            <!-- dropdown menu -->
                            <label for="dob">Gender<span>*</span></label><br>
                            <?php $options = [''=>'All', 'Male'=>'Male', 'Female'=>'Female', 'Gender-Neutral'=>'Gender-Neutral', 'Non-Binary'=>'Non-Binary', 'Trans Man/Biox'=>'Trans Man/Biox', 'Trans Woman/Gyrl'=>'Trans Woman/Gyrl', 'Couple'=>'Couple'];
                            echo $this->Form->select('gender', $options, ['escape' => false]); ?>
                        </div>

                        <div class="item">
                            <!-- dropdown menu -->
                            <label for="availability">Availability<span>*</span></label><br>
                            <?php $options = [''=>'','Any time'=>'Any time', 'Part Time'=>'Part Time', 'Flexible'=>'Flexible', 'Weekends'=>'Weekends', 'All'=>'All'];
                            echo $this->Form->select('availability', $options, ['escape' => false]); ?>
                        </div>

                        <div class="item">
                            <!-- dropdown menu -->
                            <label for="experience">Experience<span>*</span></label><br>
                            <?php $options = [''=>'','Experienced'=>'Experienced', 'Some Experience'=>'Some Experience', 'No Experience'=>'No Experience'];
                            echo $this->Form->select('experience', $options, ['escape' => false]); ?>
                        </div>

                        <div class="item">
                            <!-- dropdown menu -->
                            <label for="eye">Eye Colour</label><br>
                            <?php $options = [''=>'','Black'=>'Black', 'Blue'=>'Blue', 'Blue Green'=>'Blue Green', 'Blue Grey'=>'Blue Grey',
                                'Brown'=>'Brown', 'Brown Hazel'=>'Brown Hazel', 'Green'=>'Green',
                                'Green Brown'=>'Green Brown', 'Green Hazel'=>'Green Hazel', 'Grey'=>'Grey', 'Hazel'=>'Hazel', 'Other'=>'Other'];
                            echo $this->Form->select('eye', $options, ['escape' => false]); ?>
                        </div>

                        <div class="item">
                            <!-- dropdown menu -->
                            <label for="hair">Hair Colour</label><br>
                            <?php $options = [''=>'','Auburn'=>'Auburn', 'Bald'=>'Bald', 'Black'=>'Black', 'Blonde'=>'Blonde', 'Blonde Strawberry'=>'Blonde Strawberry',
                                'Blonde Dark'=>'Blonde Dark', 'Brown'=>'Brown', 'Brown Dark'=>'Brown Dark', 'Brown Light'=>'Brown Light', 'Brown Red'=>'Brown Red',
                                'Brunette'=>'Brunette', 'Chestnut'=>'Chestnut', 'Fair'=>'Fair', 'Grey'=>'Grey', 'Red'=>'Red', 'Peroxide'=>'Peroxide',
                                'Salt/Pepper'=>'Salt/Pepper', 'Dye Coloured'=>'Dye Coloured', 'Other'=>'Other'];
                            echo $this->Form->select('hair', $options, ['escape' => false]); ?>
                        </div>


                        <div class="item">
                            <!-- dropdown menu -->
                            <label style="padding-right: 10px;">Do you have a drivers licence? <span>*</span></label><br>
                            <?php $driveoptions = [''=>'',1=>'Yes', 0=>'No'];
                            echo $this->Form->select('licence', $driveoptions);?>
                        </div>
                        <div class="item">
                            <!-- dropdown menu -->
                            <label style="padding-right: 10px;">Do you own a car? <span>*</span></label><br>
                            <?php echo $this->Form->select('car', $driveoptions);?>
                        </div>

                        <div class="item">
                            <!-- dropdown menu -->
                            <label style="padding-right: 10px;">Lifestyle dress personality</strong><span>*</span></label><br>
                            <?php $dressPersonality = [''=>'','Leather'=>'Leather', 'Latex'=>'Latex', 'Rubberist'=>'Rubberist', 'PVC'=>'PVC', 'Master'=>'Master', 'Dominatrix'=>'Dominatrix', 'Pup'=>'Pup', 'Rope'=>'Rope'];
                            echo $this->Form->select('dress', $dressPersonality, ['escape' => false]); ?>
                        </div>

                        <div class="item">
                            <!-- three dropdown menus -->
                            <label style="padding-right: 10px;">Age Range</strong><span>*</span></label><br>
                            <?php $range = [''=>'All','18-25'=>'18-25', '25-50'=>'25-50', '45-60'=>'45-60', '55-70'=>'55-70', '70-85'=>'70-85'];
                            echo $this->Form->select('agerangeone', $range, ['escape' => false]); ?>
                        </div>
                    </div>

                    <div class="item">
                        <!-- three dropdown menus -->
                        <label style="padding-right: 10px;">What industry are you submitting for?<span>*</span></label><br>
                        <?php $industry = [''=>'','Film'=>'Film', 'TV'=>'TV', 'TVC'=>'TVC', 'Music Video'=>'Music Video', 'Documentaries'=>'Documentaries'];
                        echo $this->Form->select('industryone', $industry, ['escape' => false]);echo $this->Form->select('industrytwo', $industry, ['escape' => false]); echo $this->Form->select('industrythree', $industry, ['escape' => false]);?>
                    </div>

                    <div class="item">
                        <!-- three dropdown menus -->
                        <label style="padding-right: 10px;">What role are you submitting for?<span>*</span></label><br>
                        <?php $role = [''=>'','Actor'=>'Actor', 'Specialised Talent'=>'Specialised Talent', 'Bit Part'=>'Bit Part', 'Featured Extra'=>'Featured Extra', 'Background Extra'=>'Background Extra', 'Voice-Over'=>'Voice-Over', 'Performing Artist'=>'Performing Artist', 'Modelling'=>'Modelling', 'Drag Queen'=>'Drag Queen', 'Drag King'=>'Drag King', 'Fashion'=>'Fashion', 'Stage'=>'Stage', 'Theatre'=>'Theatre', 'Digital & Print Media'=>'Digital & Print Media'];
                        echo $this->Form->select('roleone', $role, ['escape' => false]);echo $this->Form->select('roletwo', $role, ['escape' => false]); echo $this->Form->select('rolethree', $role, ['escape' => false]);?>
                    </div>

                    <div class="item">
                        <!-- dropdown menu -->
                        <label style="padding-right: 10px;">Skill-set</strong></label><br>
                        <?php $cat = [''=>'', 'Accents'=>'Accents', 'Musician'=>'Musician', 'Singer'=>'Singer', 'Dancer'=>'Dancer', 'Performing Artist'=>'Performing Artist', 'Stunts'=>'Stunts'];
                        echo $this->Form->select('category', $cat, ['escape' => false]);echo $this->Form->select('categorytwo', $cat, ['escape' => false]); echo $this->Form->select('categorythree', $cat, ['escape' => false]);?>
                    </div>

                    <p><strong>Click Yes for more information</strong></p>

                    <!-- if the user clicks yes the input fields will be unhidden -->
                    <div class="question">
                        <label>Do you have additional media?</label>
                        <div class="question-answer">
                            <div>
                                <!-- if the radio button is clicked, call the javascript function and un-hide the input fields -->
                                <input type="radio" value="none" onclick="javascript:yesnoReelCheck();" name="yesnoReel" id="radio_7" />
                                <label for="radio_7" class="radio"><span>Yes</span></label>
                            </div>
                            <div>
                                <!-- if the radio button is clicked, hide the input fields -->
                                <input type="radio" value="none" onclick="javascript:yesnoReelCheck();" name="yesnoReel" id="radio_8" />
                                <label for="radio_8" class="radio"><span>No</span></label>

                                <!-- if the yes radio button is checked, display the add media input fields -->
                                <div id="ifReelYes" style="display: none;">
                                    <label>Upload Additional Media</label>
                                    <?php echo $this->Form->control('filename1', ['type'=>'file', 'label'=>'']); ?>
                                    <?php if ($talent->mediaone != null) { ?>
                                        <?= $this->Html->image($talent->mediaone,['style'=>'width:75px'])?>
                                    <?php } else { ?><?php echo $this->Html->image('image-not-found.png', array('alt' => 'error', 'style'=>'width:75px'));?><?php }?>

                                    <?php echo $this->Form->control('filename2', ['type'=>'file', 'label'=>'']); ?>
                                    <?php if ($talent->mediatwo != null) { ?>
                                        <?= $this->Html->image($talent->mediatwo,['style'=>'width:75px'])?>
                                    <?php } else { ?><?php echo $this->Html->image('image-not-found.png', array('alt' => 'error', 'style'=>'width:75px'));?><?php }?>

                                    <?php echo $this->Form->control('filename3', ['type'=>'file', 'label'=>'']); ?>
                                    <?php if ($talent->mediathree != null) { ?>
                                        <?= $this->Html->image($talent->mediathree,['style'=>'width:75px'])?>
                                    <?php } else { ?><?php echo $this->Html->image('image-not-found.png', array('alt' => 'error', 'style'=>'width:75px'));?><?php }?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- if the user clicks yes the input fields will be unhidden -->
                    <div class="question">
                        <label>Do you have any Tattoos?</label>
                        <div class="question-answer">
                            <div>
                                <!-- if the radio button is clicked, call the javascript function and un-hide the input fields -->
                                <input type="radio" value="none" onclick="javascript:yesnoTattooCheck();" name="yesno" id="radio_15" />
                                <label for="radio_15" class="radio"><span>Yes</span></label>
                            </div>
                            <div>
                                <!-- if the radio button is clicked, hide the input fields -->
                                <input type="radio" value="none" onclick="javascript:yesnoTattooCheck();" name="yesno" id="radio_16" />
                                <label for="radio_16" class="radio"><span>No</span></label>

                                <!-- if the yes radio button is checked, display the tattoo input field -->
                                <div id="ifYes" style="display: none;">
                                    <label>If yes, where abouts: </label>
                                    <?php echo $this->Form->input('tattoos', array('label'=>''));?>
                                    <!--<?php $bodyoptions = [''=>null,'Right Hand'=>'Right Hand', 'Left Hand'=>'Left Hand', 'Right Forearm'=>'Right Forearm', 'Left Forearm'=>'Left Forearm', 'Left Upper-arm'=>'Left Upper-arm', 'Right Upper-arm'=>'Right Upper-arm',
                                        'Face'=>'Face','Head'=>'Head', 'Neck'=>'Neck', 'Upper Torso Front'=>'Upper Torso Front', 'Upper Torso Back'=>'Upper Torso Back', 'Left Leg'=>'Left Leg', 'Right Leg'=>'Right Leg', 'Other'=>'Other'];?>
                                            <?php echo $this->Form->select('tattoos', $bodyoptions, ['escape' => false]); ?> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- if the user clicks yes the input fields will be unhidden -->
                    <div class="question">
                        <label>Do you have any Body Piercings?</label>
                        <div class="question-answer">
                            <div>
                                <!-- if the radio button is clicked, call the javascript function and un-hide the input fields -->
                                <input type="radio" value="none" onclick="javascript:yesnoPiercingCheck();" name="yesnoPiercing" id="radio_13" />
                                <label for="radio_13" class="radio"><span>Yes</span></label>
                            </div>
                            <div>
                                <!-- if the radio button is clicked, hide the input fields -->
                                <input type="radio" value="none" onclick="javascript:yesnoPiercingCheck();" name="yesnoPiercing" id="radio_14" />
                                <label for="radio_14" class="radio"><span>No</span></label>

                                <!-- if the yes radio button is checked, display the piercing input field -->
                                <div id="ifPiercingYes" style="display: none;">
                                    <label>If yes, where abouts: </label>
                                    <?php echo $this->Form->input('piercing', array('label'=>''));?>
                                    <!--<?php echo $this->Form->select('piercing', $bodyoptions, ['escape' => false]); ?>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- if the user clicks yes the input fields will be unhidden -->
                    <div class="question">
                        <label>Do you have any Body Modifications?</label>
                        <div class="question-answer">
                            <div>
                                <!-- if the radio button is clicked, call the javascript function and un-hide the input fields -->
                                <input type="radio" value="none" onclick="javascript:yesnoBodyCheck();" name="yesnoBody" id="radio_11" />
                                <label for="radio_11" class="radio"><span>Yes</span></label>
                            </div>
                            <div>
                                <!-- if the radio button is clicked, hide the input fields -->
                                <input type="radio" value="none" onclick="javascript:yesnoBodyCheck();" name="yesnoBody" id="radio_12" />
                                <label for="radio_12" class="radio"><span>No</span></label>

                                <!-- if the yes radio button is checked, display the body modification input field -->
                                <div id="ifBodyYes" style="display: none;">
                                    <label>If yes, where abouts: </label>
                                    <?php echo $this->Form->input('bodymod', array('label'=>''));?>
                                    <!--<?php echo $this->Form->select('bodymod', $bodyoptions, ['escape' => false]); ?>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- if the user clicks yes the input fields will be unhidden -->
                    <div class="question">
                        <label>Do you show Nudity?</label> <!--<label style="color: red;">*</label>-->
                        <div class="question-answer">
                            <div>
                                <!-- if the radio button is clicked, call the javascript function and un-hide the input fields -->
                                <input type="radio" value="none" onclick="javascript:yesnoNudeCheck();" name="yesnoNude" id="radio_9" />
                                <label for="radio_9" class="radio"><span>Yes</span></label>
                            </div>
                            <div>
                                <!-- if the radio button is clicked, hide the input fields -->
                                <input type="radio" value="none" onclick="javascript:yesnoNudeCheck();" name="yesnoNude" id="radio_10" />
                                <label for="radio_10" class="radio"><span>No</span></label>

                                <!-- if the yes radio button is checked, display the nudity input field -->
                                <div id="ifNudeYes" style="display: none;">
                                    <label>If yes, how much: </label>
                                    <?php $nudityoptions = [''=>null,'Partial nudity'=>'Partial nudity', 'Full nudity'=>'Full nudity'];
                                    echo $this->Form->select('nudity', $nudityoptions, ['escape' => false]); ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- text field -->
                    <div class="item">
                        <label for="visit">Do you have any physical differences you may want to tell us about?</label>
                        <?php echo $this->Form->control('differences',['type'=>'text','label'=>'','required'=>false]);?>
                    </div>

                    <!-- large text field -->
                    <div class="item">
                        <label for="visit">Social Media Links</label>
                        <?php echo $this->Form->control('bio',['type'=>'textarea','label'=>'','required'=>false]);?>
                    </div>


                    <div>
                        <?= $this->Form->create($talent, ['type'=>'file']) ?>
                        <div class="item">
                            <label for="name">Upload Feature Photo<span>*</span></label>
                            <p>Please upload a square image</p>
                            <!-- feature photo upload file field -->
                            <?php echo $this->Form->control('add_photo', ['type'=>'file', 'label'=>'']); ?>
                            <?php if ($talent->featurephoto != null) { ?>
                                <!-- if the feature photo field has no data, display image not found -->
                                <?= $this->Html->image($talent->featurephoto,['style'=>'width:250px'])?>
                            <?php } else { ?><?php echo $this->Html->image('image-not-found.png', array('alt' => 'error'));?><?php }?>
                        </div>

                    </div>
                    <div class="container position-relative" style="padding-top: 40px">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 text-center" style="padding-bottom: 25px">
                                <?= $this->Form->button(__('Submit'),['class'=>'button-submit']) ?>
                            </div>
                        </div>
                    </div>

                    <?= $this->Form->end() ?>

                </form>


            </div>
        </div>
    </section>
    <!-- End Form Section -->


</main>
<!-- End #main -->

<!-- Javascript Files -->
<?= $this->Html->script("js/jquery-ui.js")?>
<?= $this->Html->script("js/jquery-1.12.4.js")?>



<!--<h3 style="padding-top: 25px; padding-bottom: 10px; font-weight: bold">Upload Additional Media</h3>
            <div>
                <?php /*echo $this->Form->control('filename1',['type'=>'file', 'label'=>'']);*/?>
                <?php /*if ($media->filename != null) { */?>
                    <?/*= $this->Html->image($media->filename,['style'=>'width:250px'])*/?>
                <?php /*} */?>
               </div>
            <div style="padding-top: 30px">
            <?php /*echo $this->Form->control('filename2',['type'=>'file', 'label'=>'']);*/?>
            <?php /*if ($media2->filename != null) { */?>
                <?/*= $this->Html->image($media2->filename,['style'=>'width:250px'])*/?>
            <?php /*} */?>
            </div>-->


<!--<script>
    tinymce.init({
        selector: "textarea",
        menubar: false,
        // full plugins list can be found in https://www.tinymce.com/docs/demo/full-featured/
        plugins: "image link media template codesample advlist lists wordcount imagetools  emoticons fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media table anchor toc lists wordcount imagetools contextmenu colorpicker textpattern help'",
        toolbar: 'fontsizeselect | undo redo | forecolor backcolor| numlist bullist | bold italic  underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent | emoticons',
        toolbar_mode: 'floating',
    });
</script>-->

<!--<script>
    tinymce.init({
        selector: "textarea",
        menubar: false,
        // full plugins list can be found in https://www.tinymce.com/docs/demo/full-featured/
        plugins: "image link media template codesample advlist lists wordcount imagetools  emoticons fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media table anchor toc lists wordcount imagetools contextmenu colorpicker textpattern help'",
        toolbar: 'fontsizeselect | undo redo | forecolor backcolor| numlist bullist | bold italic  underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent | emoticons',
        toolbar_mode: 'floating',
    });
</script>-->


<!-- ======= Yes/No Radio Button Scripts ======= -->
<script>
    function yesnoTattooCheck() {
        if (document.getElementById('radio_15').checked) {
            document.getElementById('ifYes').style.display = 'block';
        }
        else document.getElementById('ifYes').style.display = 'none';

    }
</script>
<script>
    function yesnoPiercingCheck() {
        if (document.getElementById('radio_13').checked) {
            document.getElementById('ifPiercingYes').style.display = 'block';
        }
        else document.getElementById('ifPiercingYes').style.display = 'none';

    }
</script>

<script>
    function yesnoBodyCheck() {
        if (document.getElementById('radio_11').checked) {
            document.getElementById('ifBodyYes').style.display = 'block';
        }
        else document.getElementById('ifBodyYes').style.display = 'none';

    }
</script>
<script>
    function yesnoNudeCheck() {
        if (document.getElementById('radio_9').checked) {
            document.getElementById('ifNudeYes').style.display = 'block';
        }
        else document.getElementById('ifNudeYes').style.display = 'none';

    }
</script>

<script>
    function yesnoReelCheck() {
        if (document.getElementById('radio_7').checked) {
            document.getElementById('ifReelYes').style.display = 'block';
        }
        else document.getElementById('ifReelYes').style.display = 'none';

    }
</script>

</body>








