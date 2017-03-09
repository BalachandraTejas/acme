<?php

use Phinx\Migration\AbstractMigration;

class SeedPagesTable extends AbstractMigration
{
    public function up()
    {
        $password_hash = password_hash('verysecret', PASSWORD_DEFAULT);

        $this->execute("
            insert into pages (browser_title, page_content)
            values
            ('Acme: About Us Page', 'This is an about Us page and here you can add more static content. Just update the database.')
        ");
    }

    public function down()
    {
        
    }
}
