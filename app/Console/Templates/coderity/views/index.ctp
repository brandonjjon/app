<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h1>
    </div>
</div>

<div class="well">
    <?php echo "<?php echo \$this->Form->create('{$modelClass}', array('action' => 'index')); ?>\n"; ?>
        <fieldset class="form-group">
            <div class="input-group custom-search-form">

                <?php echo "<?php if (!empty(\$search)) : ?>\n"; ?>
                    <?php echo "<?php echo \$this->Form->input('search', array('class' => 'form-control', 'label' => false, 'div' => false, 'value' => \$search));?>\n"; ?>
                <?php echo "<?php else : ?>\n"; ?>
                    <?php echo "<?php echo \$this->Form->input('search',
                                                  array('type' => 'text',
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Search...',
                                                        'label' => false,
                                                        'div' => false));?>\n"; ?>
                <?php echo "<?php endif; ?>\n"; ?>

                <span class="input-group-btn">
                        <?php echo "<?php echo \$this->Form->button('<i class=\"fa fa-search\"></i>',
                                                       array('class' => 'btn btn-default',
                                                             'escape' => false,
                                                             'type' => 'submit',
                                                             'div' => false));?>\n"; ?>
                </span>

            </div>
        </fieldset>
        <?php echo "<?php if (!empty(\$search)) : ?>"; ?>
            <?php echo "<?php echo \$this->Html->link(__('Reset'), array('action' => 'index')); ?>"; ?>
        <?php echo "<?php endif; ?>"; ?>
    <?php echo "<?php echo \$this->Form->end(); ?>"; ?>

    <?php echo "<?php echo \$this->Html->link('<i class=\"fa fa-plus\"></i> ' . __('Add a {$singularHumanName}'),
                                 array('action' => 'add'),
                                 array('class' => 'btn btn-primary',
                                       'escape' => false)); ?>"; ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?>
                <?php echo "\n"; ?>
            </div>

            <div class="panel-body">
                <?php echo "<?php if (\${$pluralVar}) : ?>"; ?>
                <?php echo "\n"; ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                <?php foreach ($fields as $field): ?>
    <th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
                                <?php endforeach; ?>
    <th><?php echo "<?php echo __('Options');?>"; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                            echo "\t\t\t\t\t\t\t<tr>\n";
                                foreach ($fields as $field) {
                                    $isKey = false;
                                    if (!empty($associations['belongsTo'])) {
                                        foreach ($associations['belongsTo'] as $alias => $details) {
                                            if ($field === $details['foreignKey']) {
                                                $isKey = true;
                                                echo "\t\t\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t\t\t\t\t\t</td>\n";
                                                break;
                                            }
                                        }
                                    }
                                    if ($isKey !== true) {
                                        echo "\t\t\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></td>\n";
                                    }
                                }

                                echo "\t\t\t\t\t\t\t\t<td>\n";
                                echo "\t\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(__('<i class=\"fa fa-file-picture-o\"></i> View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?>\n";
                                echo "\t\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(__('<i class=\"fa fa-edit\"></i> Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?>\n";
                                echo "\t\t\t\t\t\t\t\t\t<?php echo \$this->Form->postLink(__('<i class=\"fa fa-trash-o\"></i> Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false, 'class' => 'btn btn-danger btn-sm'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
                                echo "\t\t\t\t\t\t\t\t</td>\n";
                            echo "\t\t\t\t\t\t\t</tr>\n";

                            echo "\t\t\t\t\t\t\t<?php endforeach; ?>\n";
                            ?>
                            </tbody>
                        </table>
                        <?php echo "<?php echo \$this->element('admin/pagination'); ?>\n"; ?>
                    </div>
                <?php echo "<?php elseif (!empty(\$search)) : ?>\n"; ?>
                    <?php echo "<?php echo __('Your search returned no results, please try again!'); ?>\n"; ?>
                <?php echo "<?php else : ?>\n"; ?>
                    <?php echo "<?php echo __('There are no {$pluralVar} at the moment!'); ?>\n"; ?>
                <?php echo "<?php endif; ?>\n"; ?>
                <?php echo "\n"; ?>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-lg-12">
        <div class="actions">
            <h3><?php echo "<?php echo __('Actions'); ?>"; ?></h3>
            <ul>
                <li><?php echo "<?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add')); ?>"; ?></li>
        <?php
            $done = array();
            foreach ($associations as $type => $data) {
                foreach ($data as $alias => $details) {
                    if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                        echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
                        echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
                        $done[] = $details['controller'];
                    }
                }
            }
        ?>
            </ul>
        </div>
    </div>
</div>
