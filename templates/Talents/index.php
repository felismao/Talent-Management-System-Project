<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent[]|\Cake\Collection\CollectionInterface $talents
 */
?>

<!-- Core theme CSS (includes Bootstrap)-->
<?= $this->Html->css('admin.css') ?>
<?= $this->Html->css('soft-ui-dashboard.min.css') ?>

<html>

<!-- Set the background to white -->
<body style="background-color:#ffffff;">

<!-- ======= Page CSS ======= -->
<style>
    .grid {
        display: grid;
        grid-template-columns: 40px 35px 0px;
    }
    img {
        background: skin-tone.jpg;
        background-size: cover;
        height: 100%;
        width: 100%;
        width:100px;
        height:100px;
        object-fit: cover;
    }

    a {
        font-size: 13.5px;
    }
    .btn-get-started{
        float:right;
        font-family: var(--font-primary);
        font-weight: 400;
        font-size: 14px;
        display: inline-block;
        padding: 12px 40px;
        border-radius: 4px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: 0.3s;
        color: #fff;
        background: #7c37b9;
    }
    .btn-get-started:hover {
        background: #9d4edd;
    }

</style>

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <li class="nav-item d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none"></span>
                </a>
            </li>
        </nav>
    </div>
</nav>
<!-- ======= End Page Header ======= -->

<div style="padding-bottom: 0px">
</div>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12" style="padding: 100px">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="card-body px-0 pt-0 pb-2">
                        <!-- Add talent button -->
                        <?= $this->Html->link(
                            'Add Talent',
                            ['controller' => 'Talents', 'action' => 'add'],
                            ['class' => 'btn-get-started'])
                        ?>
                    </div>
                </div>

                <div style="padding-left: 25px"><?=
                // feedback message if success
                $this->Flash->render();?></div>

                <!-- ======= Create Talent Table Headers ======= -->
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7" style="width: 425px"><?= $this->Paginator->sort('Talent') ?></th>
                                <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ps-2"><?= $this->Paginator->sort('gender') ?></th>
                                <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ps-2" style="width: 135px"><?= $this->Paginator->sort('agerangeone', 'Age Range') ?></th>
                                <!--<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><?= $this->Paginator->sort('maxagerange') ?></th>-->
                                <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ps-2"><?= $this->Paginator->sort('height') ?></th>
                                <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ps-2"><?= $this->Paginator->sort('location') ?></th>
                                <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ps-2"><?= $this->Paginator->sort('category','Skill-Set') ?></th>
                           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 5px"></th>

                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <!-- ======= End Talent Table Header ======= -->

                            <!-- ======= Talent Table Body ======= -->
                            <tbody>
                            <!-- loop through all talents in the database -->
                            <?php foreach ($results as $talent): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <!-- display image not found if no feature photo is found -->
                                                <?php if ($talent->featurephoto == null){?>
                                                    <?php echo $this->Html->image('/image-not-found.png', array('alt' => 'CakePHP', 'class' => 'avatar avatar-lg me-3s')); ?>
                                                <?php } else { ?>
                                                    <img class="avatar avatar-lg me-3" alt="user1" <?= @$this->Html->image($talent->featurephoto); ?>
                                                <?php } ?>
                                            </div>

                                            <!-- display the talents first name if no pseudonym is present. if no first photo is found display the last name, else display no name -->
                                            <div class="d-flex flex-column justify-content-center">
                                                <div class="mb-0 text-lg text-bold">
                                                    <?php if ($talent->name != null){ ?>
                                                        <?= h($talent->name)?>
                                                    <?php }  elseif ($talent->firstname != null){ ?>
                                                        <?= h($talent->firstname);?>
                                                    <?php } elseif ($talent->lastname != null) { ?>
                                                        <?= h($talent->lastname); ?>
                                                    <?php } else { ?> No name <?php }?>
                                                </div>
                                                <!--<p class="text-xs text-secondary mb-0">john@creative-tim.com</p>-->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <!-- display the talents gender -->
                                        <span class="text-secondary text-s"><?= h($talent->gender) ?></span>
                                    </td>
                                    <td>
                                        <!-- display the talents age range data and format it based on the data inputted -->
                                        <span class="text-secondary text-s"><?php if ($talent->agerangeone != null) { ?>
                                                <?= $talent->agerangeone;?>
                                            <?php } if ($talent->agerangetwo != null and $talent->agerangeone != null) { ?>|
                                                <?php } if ($talent->agerangetwo != null) { ?>
                                                <?= $talent->agerangetwo; ?>
                                            <?php } if ($talent->agerangetwo != null and $talent->agerangethree != null) { ?>|
                                            <?php } if ($talent->agerangethree != null) { ?>
                                                    <?= $talent->agerangethree; ?>
                                            <?php } if ($talent->agerangethree == null and $talent->agerangetwo == null and $talent->agerangeone == null) { ?>
                                                N/A
                                            <?php }?>
                                        </span>
                                    </td>

                                    <td>
                                        <!-- display the talent's height if available -->
                                        <span class="text-secondary text-s"><?php if ($talent->height != null) { ?><?= $talent->height === null ? '' : $this->Number->format($talent->height) ?>cm<?php } ?></span>
                                    </td>

                                    <td>
                                        <!-- display the talent's location data if available -->
                                        <span class="text-secondary text-s"><?= h($talent->location->name) ?></span>
                                    </td>
                                    <td>
                                        <!-- display the talent's category data and format it based on the data inputted -->
                                        <span class="text-secondary text-s">
                                            <?php if ($talent->category != null) { ?>
                                                <?= $talent->category;?>
                                            <?php } if ($talent->categorytwo != null and $talent->category != null) { ?>|
                                                <?= $talent->categorytwo; ?>
                                            <?php } if ($talent->categorythree != null and $talent->categorytwo != null)  { ?>|
                                                    <?= $talent->categorythree; ?>
                                            <?php } if ($talent->category == null and $talent->categorytwo == null and $talent->categorythree == null) { ?>N/A<?php }?>
                                           </span>
<!--                                        <span class="text-secondary text-xs font-weight-bold"></span>-->
                                    </td>
                                    <td class="text-secondary font-weight-bold text-xs">
                                        <div class="grid">
                                            <!-- display link to the view page -->
                                            <div><?= $this->Html->link(__('View'), ['action' => 'view', $talent->id],array('class' => 'text-sm')) ?></div>
                                            <!-- display link to the edit page -->
                                            <div><?= $this->Html->link(__('Edit'), ['action' => 'edit', $talent->id],array('class' => 'text-sm')) ?></div>
                                            <!-- display link to the delete page -->
                                            <div><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $talent->id], array('confirm' => __('Are you sure you want to delete {0}?', $talent->name),'class' => 'text-sm')) ?></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ======= Table End ======= -->

                <!-- ======= Table Navigation ======= -->
                <section class="u-section-1" id="sec-7d1c">
                    <div class="u-list u-list-1">
                        <div class="u-repeater u-repeater-1">
                            <div class="u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                                    <p class="u-align-left u-custom-item u-text u-text-default u-text-4">
                                        <!-- navigate to the first page -->
                                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2">
                                        <span style="width: 100px; list-style: none" class="bg-gradient-faded-light badge badge-sm">
                                            <!-- navigate to the previous page -->
                                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                        </span>
                                </div>
                            </div>
                            <div class="u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
                                    <span style="width: 100px; list-style: none" class="badge badge-sm bg-gradient-faded-light">
                                        <!-- navigate to the next page -->
                                        <?= $this->Paginator->next(__('next') . ' >') ?></span>
                                </div>
                            </div>
                            <!-- <div class="u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-4">
                                    <p class="u-align-left u-custom-item u-text u-text-default u-text-4">
                                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                                    </p>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <p class="text-secondary text-sm " style="padding-left: 15px"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                </section>
                </div>
            <!-- ======= Table Navigation End ======= -->


            <!--<div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <span style="width: 100px" class="badge badge-sm bg-gradient-success"><?= $this->Paginator->prev('< ' . __('previous')) ?></span>

                    <?= $this->Paginator->numbers() ?>
                    <span style="width: 100px" class="badge badge-sm bg-gradient-success"><?= $this->Paginator->next(__('next') . ' >') ?></span>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
            </div>-->
        </div>
    </div>
</div>

</body>
</html>


