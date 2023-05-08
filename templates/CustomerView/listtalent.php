<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent $talent
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 */
?>

<!-- ======= Page CSS ======= -->
<style>
    /* Style the button that is used to open and close the collapsible content */
    .collapsible {
        background-color: #662a90;
        color: #ffffff;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }

    /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
    .active2, .collapsible:hover {
        background-color: #8949c2;
    }

    /* Style the collapsible content. Note: hidden by default */
    .content {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        background-color: #fffdff;
    }

    .collapsible:after {
        content: '\02795'; /* Unicode character for "plus" sign (+) */
        font-size: 13px;
        color: white;
        float: right;
        margin-left: 5px;
    }

    .active2:after {
        content: "\2796"; /* Unicode character for "minus" sign (-) */
    }

</style>

<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <h2 class="title">Talents</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                            <a>
                                <?= $this->Html->link(
                                    '⌂ Home',
                                    ['controller' => 'CustomerView', 'action' => 'index'],
                                    ['class' => ''])
                                ?>
                            </a>
                            <a>> Talents</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Breadcrumb Area End ***** -->

<!-- ***** Model Area Start ***** -->
<section class="mona-model-area model-page section-padding-80-0 mb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="model-tab-area">
                    <ul class="nav nav-tabs mb-50" id="mona_modelTab" role="tablist">
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Advance Filters Tab Content -->
    <!-- If the user filters multiple fields, the results will only apply to talents that match all criteria -->
    <div class="mona-tab-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="collapsible">Advanced Filters</button>
                    <div class="content" style="padding-top: 15px">

                        <!-- Advance Filter -->
                    <div class="advance-search">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12 align-content-center">
                                    <?= $this->Form->create(null, ['type'=> 'get']); ?>
                                        <div class="form-row">
                                            <!--<div class="form-group col-xl-4 col-lg-3 col-md-6 align-baseline">
                                                <strong style="white-space: nowrap;"></strong> <?= $this->Form->control('namekey',['placeholder'=>'Search by name...', 'label'=>'','value'=>$this->request->getQuery('namekey'),'class'=>'form-control','id'=>'subject']) ?>
                                            </div>-->

                                            <!-- gender dropdown menu. note, the users input filters data using processing in the customer view controller -->
                                            <div class="form-group col-lg-3 col-md-6">
                                                <strong style="white-space: nowrap;">Gender</strong><?php $options = [''=>'All', 'Male'=>'Male', 'Female'=>'Female', 'Gender-Neutral'=>'Gender-Neutral', 'Non-Binary'=>'Non-Binary', 'Trans Man/Biox'=>'Trans Man/Biox', 'Trans Woman/Gyrl'=>'Trans Woman/Gyrl', 'Couple'=>'Couple'];
                                                echo $this->Form->select('genderkey', $options, ['escape' => false,'value'=>$this->request->getQuery('genderkey'),'class'=>'w-100 form-control mt-lg-1 mt-md-2']); ?>
                                            </div>

                                            <!-- location dropdown menu. note, the users input filters data using processing in the customer view controller -->
                                            <div class="form-group col-lg-3 col-md-6">
                                                 <strong style="white-space: nowrap;">Location</strong><?php $options = [''=>'All','VIC'=>'VIC', 'NSW'=>'NSW', 'QLD'=>'QLD', 'SA'=>'SA', 'WA'=>'WA',
                                                    'NT'=>'NT', 'ACT'=>'ACT', 'TAS'=>'TAS', 'International'=>'International'];
                                                    echo $this->Form->select('locationkey', $options, ['escape' => false,'value'=>$this->request->getQuery('locationkey'),'class'=>'form-control my-2 my-lg-1']); ?>
                                            </div>

                                            <!-- skills dropdown menu. note, the users input filters data using processing in the customer view controller -->
                                            <div class="form-group col-lg-3 col-md-6">
                                            <strong style="white-space: nowrap;">Skills</strong><?php $cat = [''=>'All', 'Accents'=>'Accents', 'Musician'=>'Musician', 'Singer'=>'Singer', 'Dancer'=>'Dancer', 'Performing Artist'=>'Performing Artist', 'Stunts'=>'Stunts'];
                                                echo $this->Form->select('key', $cat, ['escape' => false,'value'=>$this->request->getQuery('key'),'class'=>'form-control']); ?>
                                                </div>

                                            <!-- age dropdown menu. note, the users input filters data using processing in the customer view controller -->
                                            <!-- this will filter talents based on if the talent contains the given age range in any of the three age range attributes -->
                                            <div class="form-group col-lg-3 col-md-6">
                                                <strong style="white-space: nowrap;">Age Range</strong><?php $options = [''=>'All','18-25'=>'18-25', '25-50'=>'25-50', '45-60'=>'45-60', '55-70'=>'55-70', '70-85'=>'70-85'];
                                                echo $this->Form->select('agekey', $options, ['escape' => false,'value'=>$this->request->getQuery('agekey'),'class'=>'form-control']); ?>
                                            </div>


                                            <!-- apply filters button which filters the fields based on the data inputted in the form -->
                                            <div class="form-group col-xl-2 col-lg-3 col-md-6 align-items-center">
                                                <?= $this->Form->button(__('Apply Filters'),['class'=>'btn btn-primary active w-100']) ?>
                                            </div>

                                            <!-- button that resets all the inputted fields to empty -->
                                            <div class="form-group col-xl-2 col-lg-3 col-md-6 align-items-center">
                                                <?= $this->Form->button(__('Reset Filters'),['type' => 'reset','class'=>'btn btn-primary active w-100']) ?>
                                            </div>
                                        </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>



                            <div style="padding-bottom: 15px"></div>
                    </div>


                    <div class="tab-content" id="mona_modelTabContent" style="padding-top: 20px">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                            <div class="row flex-wrap">

                                <!-- If the advanced filter matches none of the talents, display no result found -->
                                <?php if ($talents->count() == null){ ?>
                                    <h4 class="title" style="margin: auto; width: 50%; text-align: center; padding-top: 80px">
                                No Results Found
                                    </h4>
                                <?php } ?>

                                <!-- If the advanced filter matches talents, display talent data -->
                                <?php foreach ($talents as $queries): ?>

                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl">
                                    <div class="single-model-item mb-50">
                                        <div class="model-thumbnail">
                                            <!--  Display the Talents Thumbnail -->
                                            <?php echo $this->Html->image($queries->featurephoto, [
                                                'class'=>'first-thumbnail',
                                                "alt" => "Feature Photo",
                                                'url' => ['action' => 'view', $queries->id]
                                            ]); ?>

                                            <?php echo $this->Html->image($queries->featurephoto, [
                                                'class'=>'second-thumbnail',
                                                "alt" => "Feature Photo",
                                                'url' => ['action' => 'view', $queries->id]
                                            ]); ?>

                                            <!-- Display IMPORTANT Talent Info -->
                                            <div class="share-info">
                                            </div>
                                        </div>
                                        <div class="model-info">
                                            <h3>
                                                <!-- Display Talent Pseudonym if the have one, else display their first name, else last name -->
                                                <?php if ($queries->name != null){ ?>
                                                <?= $this->Html->link(_($queries->name), ['action' => 'view', $queries->id]);?>
                                                <?php }  elseif ($queries->firstname != null){ ?>
                                                    <?= $this->Html->link(_($queries->firstname), ['action' => 'view', $queries->id]);?>
                                                <?php } else { ?>
                                                 <?= $this->Html->link(_($queries->lastname), ['action' => 'view', $queries->id]);} ?></h3>

                                            <!-- Display the Talent's location data -->
                                            <?php if ($queries->location->name != null) { ?>
                                                <h6 style="font-size: 12.5px; padding-top: 5px">
                                                    <?php echo $queries->location->name ?></h6>
                                            <?php } ?>

                                            <?php if ($queries->gender != null) { ?>
                                                <h6 style="font-size: 12.5px; padding-top: 5px">
                                                    <?php echo $queries->gender ?></h6>
                                            <?php } ?>

                                            <?php if ($queries->agerangeone != null) { ?>
                                                <h6 style="font-size: 12.5px; padding-top: 5px">
                                                    <?php echo $queries->agerangeone ?></h6>
                                            <?php } ?>

                                            <!-- Display category information and format it based on how many categories are inputted -->
                                            <?php if ($queries->category != null or $queries->categorytwo != null or $queries->categorythree != null) { ?>
                                                <h6 style="font-size: 12.5px; padding-top: 5px">
                                                    <?php if ($queries->category != null) { ?>
                                                        <?= $queries->category;?>
                                                    <?php } if ($queries->categorytwo != null and $queries->category != null) { ?>|
                                                        <?= $queries->categorytwo; ?>
                                                    <?php } if ($queries->categorythree != null and $queries->categorytwo != null)  { ?>|
                                                        <?= $queries->categorythree; } ?>
                                                </h6>
                                            <?php } ?>

                                            <!-- Display the talents age range and format it based on how many categories are inputted
                                            <h6 style="font-size: 12.5px; padding-top: 5px">
                                                <?php if ($queries->agerangeone != null) { ?>
                                                    <?php echo $queries->agerangeone;?>
                                                <?php } if ($queries->agerangetwo != null and $queries->agerangeone != null) { ?>|
                                                <?php } if ($queries->agerangetwo != null) { ?>
                                                    <?php echo $queries->agerangetwo; ?>
                                                <?php } if ($queries->agerangetwo != null and $queries->agerangethree != null) { ?>|
                                                <?php } if ($queries->agerangethree != null) { ?>
                                                <?php echo $queries->agerangethree; } ?></span>
                                            </h6>-->

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Page Javascript ***** -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/popper.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/bootstrap/bootstrap-slider.js"></script>
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="plugins/google-map/map.js" defer></script>


<!-- Advanced Filter Menu Javascript -->
<script src="js/script.js"></script>
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active2");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>

</body>
</html>
