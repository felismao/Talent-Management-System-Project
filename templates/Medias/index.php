<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Media[]|\Cake\Collection\CollectionInterface $medias
 */
?>

<!-- ======= THIS VIEW IS NO LONGER BEING USED ======= -->
<!-- Core theme CSS (includes Bootstrap)-->
<?= $this->Html->css('admin.css') ?>
<?= $this->Html->css('soft-ui-dashboard.min.css') ?>

<html>
<body style="background-color:#ffffff;">
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
        font-size: 12.5px;
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
                <a href="javascript:" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none"></span>
                </a>
            </li>
        </nav>
    </div>
</nav>

<div style="padding-bottom: 0px">
</div>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12" style="padding: 75px">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <!--<h6>Talent Table</h6>-->
                    <div class="card-body px-0 pt-0 pb-2">
                        <?= $this->Html->link(
                            'Add Media',
                            ['controller' => 'Medias', 'action' => 'add'],
                            ['class' => 'btn-get-started'])
                        ?>
                    </div>
                </div>


                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 "><?= $this->Paginator->sort('filename',['label'=>'Image']) ?></th>
                                <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ps-2"><?= $this->Paginator->sort('talent_id') ?></th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($medias as $media): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <?php if ($media->filename == null){?> <?php echo $this->Html->image('image-not-found.png', array('alt' => 'CakePHP', 'class' => 'avatar avatar-lg me-1s')); ?> <?php } else { ?> <img class="avatar avatar-lg me-3" alt="user1" <?= @$this->Html->image($media->filename); ?> <?php } ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-0 text-lg"><?= $media->has('talent') ? $this->Html->link($media->talent->name, ['controller' => 'Talents', 'action' => 'view', $media->talent->id], ['class' => 'mb-0 text-lg']) : '' ?></div>
                                    </td>
                                    <td class="text-secondary font-weight-bold text-lg">
                                        <div class="grid">
                                            <!--<div><?= $this->Html->link(__('View'), ['action' => 'view', $media->id]) ?></div>-->
                                            <div><?= $this->Html->link(__('Edit'), ['action' => 'edit', $media->id],array('class' => 'text-sm')) ?></div>
                                            <div><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $media->id], array('confirm' => __('Are you sure you want to delete {0}?', $media->filename),'class' => 'text-sm')) ?></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                </div>

                <section class="u-section-1" id="sec-7d1c">
                    <div class="u-list u-list-1">
                        <div class="u-repeater u-repeater-1">
                            <div class="u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                                    <p class="u-align-left u-custom-item u-text u-text-default u-text-4">
                                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2">
                                        <span style="width: 100px; list-style: none" class="badge badge-sm bg-gradient-faded-light">
                                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                        </span>
                                </div>
                            </div>
                            <div class="u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
                                    <span style="width: 100px; list-style: none" class="badge badge-sm bg-gradient-faded-light">
                                        <?= $this->Paginator->next(__('next') . ' >') ?></span>
                                </div>
                            </div>
                            <div class="u-container-style u-list-item u-repeater-item">
                                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-4">
                                    <p class="u-align-left u-custom-item u-text u-text-default u-text-4">
                                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-secondary text-sm " style="padding-left: 15px"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                </section>
            </div>


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



