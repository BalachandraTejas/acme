<?php

use Phinx\Migration\AbstractMigration;

class SeedTestimonialsTable extends AbstractMigration
{
   public function up()
    {
        $password_hash = password_hash('verysecret', PASSWORD_DEFAULT);

        $this->execute("
            insert into testimonials (title, testimonial, user_id)
            values
            ('Acme: Testimonials', 'This is a testimonial by the user and more text can be added.', 1)
        ");
    }

    public function down()
    {
        
    }
}
