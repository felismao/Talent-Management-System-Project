<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>

<!-- ======= THIS VIEW IS NOT BEING USED ======= -->
<!-- ======= DEFAULT CAKEPHP LAYOUT ======= -->
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Locations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Location'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="locations view content">
            <h3><?= h($location->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($location->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($location->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Talents') ?></h4>
                <?php if (!empty($location->talents)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Gender') ?></th>
                            <th><?= __('Minagerange') ?></th>
                            <th><?= __('Maxagerange') ?></th>
                            <th><?= __('Height') ?></th>
                            <th><?= __('Location') ?></th>
                            <th><?= __('Bio') ?></th>
                            <th><?= __('Featurephoto') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Location Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($location->talents as $talents) : ?>
                        <tr>
                            <td><?= h($talents->id) ?></td>
                            <td><?= h($talents->name) ?></td>
                            <td><?= h($talents->gender) ?></td>
                            <td><?= h($talents->minagerange) ?></td>
                            <td><?= h($talents->maxagerange) ?></td>
                            <td><?= h($talents->height) ?></td>
                            <td><?= h($talents->location) ?></td>
                            <td><?= h($talents->bio) ?></td>
                            <td><?= h($talents->featurephoto) ?></td>
                            <td><?= h($talents->category_id) ?></td>
                            <td><?= h($talents->location_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Talents', 'action' => 'view', $talents->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Talents', 'action' => 'edit', $talents->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Talents', 'action' => 'delete', $talents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $talents->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
