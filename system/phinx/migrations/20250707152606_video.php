<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Video extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        if ($this->hasTable('video')) {
            return;
        }

        $this->table('video', ['id' => false, 'primary_key' => 'id'])
            ->addColumn('id', 'integer', ['identity' => true])
            ->addColumn('title', 'string', ['limit' => 50])
            ->addColumn('description', 'string', ['limit' => 500])
            ->addColumn('videoid', 'string', ['limit' => 11])
            ->create();
    }
}
