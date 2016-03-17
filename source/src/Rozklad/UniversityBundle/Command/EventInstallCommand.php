<?php

namespace Rozklad\UniversityBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class EventInstallCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('rozklad:install')
            ->setDescription('Execute install scripts.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entityManager = $this->getContainer()->get('doctrine')->getEntityManager('default');
        $output->writeln('I here');
        /**
         * CREATE PROCEDURE  `errorHandler` ( IN  `message` TEXT ) DETERMINISTIC MODIFIES SQL DATA SQL SECURITY INVOKER BEGIN BEGIN SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = message;

        END ;

        END
         */
        /*
CREATE PROCEDURE  `addSingleEvent` ( IN  `sId` INT, IN  `aud` INT, IN  `subj` INT, IN  `teacher` INT, IN  `gId` INT, IN `e_date` DATE ) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER
BEGIN SELECT id
INTO @id
FROM event
WHERE schedule_id = sId
AND event.`date` = e_date
AND auditory_id = aud
LIMIT 1 ;

IF @id >0 THEN call errorHandler(
 'Auditory not empty.'
);

END IF ;

SELECT id
INTO @id
FROM event
WHERE schedule_id = sId
AND event.`date` = e_date
AND teacher_id = teacher
LIMIT 1 ;

IF @id >0 THEN call errorHandler(
 'Teacher have a lesson.'
);

END IF ;

SELECT id
INTO @id
FROM event inner join `event_group` on `event`.id = `event_group`.event_id
WHERE schedule_id = sId
AND event.`date` = e_date
AND `event_group`.`group_id` = gId
LIMIT 1 ;

IF @id >0 THEN call errorHandler(
 'Group have a lesson.'
);

END IF ;

INSERT INTO event( schedule_id, auditory_id, subject_id, teacher_id, DATE )
VALUES (
sId, aud, subj, teacher, e_date
);
INSERT INTO group_event values (LAST_INSERTED_ID(), gId);
END
         */
        /*
delimiter //
CREATE PROCEDURE  `addMultiGroupEvent` (in eId INT, in gId INT, in sId INT, in e_date DATE ) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER
BEGIN SELECT `group`.`name`
INTO @name
FROM event INNER JOIN `event_group` on `event_group`.`event_id` = event.id INNER JOIN `group` ON `event_group`.`group_id` = `group`.`id`
WHERE schedule_id = sId
AND event.`date` = e_date
AND `event_group`.`group_id` = gId
LIMIT 1 ;

IF @name is NOT NULL THEN call errorHandler(
 CONCAT('Group ', @name, ' have a lesson on that time.')
);

END IF ;

INSERT INTO group_event values (eId, gId);
END
delimiter ;
         */
    }
}