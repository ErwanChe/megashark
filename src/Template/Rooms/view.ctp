<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Showtimes'), ['controller' => 'Showtimes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Showtime'), ['controller' => 'Showtimes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rooms view large-9 medium-8 columns content">
    <h3><?= h($room->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($room->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($room->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($room->capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($room->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($room->modified) ?></td>
        </tr>
    </table>
    
    <!------------------>
    
        <h3>Seance cette semaine</h3>
    <table cellpadding="0" cellspacing="0">
            <tr>
                <th> Lundi </th>
                <th> Mardi </th>
                <th> Mercredi </th>
                <th> Jeudi </th>
                <th> Vendredi </th>
                <th> Samedi </th>
                <th> Dimanche </th>
            </tr>
        <tbody>
            <tr>
            <?php 
                for($i = 1; $i <= 7; $i++)
                {
                  echo'<td>';
                        if (isset($showTimesThisWeek[$i])) {
                          foreach ($showTimesThisWeek[$i] as $value) {
                            echo $value->movie->name;
                            echo '<br>';
                            echo $value->start->format('H:i');
                            echo ' / ';
                            echo $value->end->format('H:i');
                            echo '<br>';
                            echo '<br>';
                          } 
                        }
                  echo'</td>';  
                }
            ?>
            </tr>
        </tbody>
    </table>
    
    <ul>
    </ul>
</div>
