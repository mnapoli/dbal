<?php

namespace Doctrine\Tests\DBAL\Functional\Ticket;

use Doctrine\DBAL\Schema\Table;
use Doctrine\Tests\DbalFunctionalTestCase;

/**
 * @group DBAL-864
 */
class DBAL864Test extends DbalFunctionalTestCase
{
    public function testInsertFalse()
    {
        $table = new Table("dbal864tbl");
        $table->addColumn('foo', 'boolean');
        $this->_conn->getSchemaManager()->createTable($table);

        // Test that inserting false doesn't throw an exception
        $this->_conn->insert('dbal864tbl', array(
            'foo' => false,
        ));
    }
}
