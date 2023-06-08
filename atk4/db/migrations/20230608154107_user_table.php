<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UserTable extends AbstractMigration
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
    public function up(): void
    {
		$this->table('user')
		     ->addColumn('name', 'string', ['null' => false])
		     ->addColumn('email', 'string', ['null' => false])
		     ->addColumn('email_verified_at', 'datetime', ['null' => true])
		     ->addTimestampsWithTimezone()
		     ->addIndex('email', ['unique' => true])
		     ->save();
    }

	public function down(): void
	{
		$this->table('user')->drop()->save();
	}
}
