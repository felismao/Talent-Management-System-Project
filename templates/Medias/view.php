<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Media $media
 */
?>

<!-- ======= THIS VIEW IS NO LONGER BEING USED ======= -->
<style>
    h2{
        color:#000000!important;
    }
    p, li, div{
        color:#000000!important;
    }
</style>
<body style="background-color:#ffffff;">
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Media'), ['action' => 'edit', $media->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Media'), ['action' => 'delete', $media->id], ['confirm' => __('Are you sure you want to delete # {0}?', $media->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Medias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Media'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="medias view content">
            <h3><?= h($media->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Filename') ?></th>
                    <td><?= h($media->filename) ?></td>
                </tr>
                <tr>
                    <th><?= __('Filepath') ?></th>
                    <td><?= h($media->filepath) ?></td>
                </tr>
                <tr>
                    <th><?= __('Talent') ?></th>
                    <td><?= $media->has('talent') ? $this->Html->link($media->talent->name, ['controller' => 'Talents', 'action' => 'view', $media->talent->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($media->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
