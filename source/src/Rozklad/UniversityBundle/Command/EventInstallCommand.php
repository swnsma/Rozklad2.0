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
DELIMITER //

CREATE PROCEDURE  `addSingleEvent` ( IN  `sId` INT, IN  `aud` INT, IN  `subj` INT, IN  `teacher` INT, IN  `gId` INT, IN `e_date` DATE, IN `period` INT ) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER
BEGIN
SELECT from_d, to_d into @from, @to FROM semester WHERE is_active = 1 limit 1;

IF @from IS NULL OR @to IS NULL
THEN
	call errorHandler('No active semesters.');
END IF;

IF @from > e_date OR @to < e_date
THEN
	call errorHandler('Selected date not in range of active semester.');
END IF;

CREATE TEMPORARY TABLE dates(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    date DATE
    ) ENGINE=memory;
INSERT dates.date INTO dates VALUES (e_date);

collect_dates: LOOP
	SET e_date=DATE_ADD(e_date,INTERVAL 7*period DAY);
    IF e_dates > @to THEN
    LEAVE collect_dates;
    END IF;
    INSERT IGNORE dates.date INTO dates VALUES (e_date);
END LOOP collect_dates;

SELECT id
INTO @id, @invalid_date
FROM event
WHERE schedule_id = sId
AND event.`date` IN dates
AND auditory_id = aud
LIMIT 1 ;

IF @id > 0 OR @invalid_date IS NOT NULL THEN call errorHandler(
 CONCAT('Auditory not empty. Date: ', @invalid_date)
);

END IF ;

SELECT id
INTO @id, @invalid_date
FROM event
WHERE schedule_id = sId
AND event.`date` IN dates
AND teacher_id = teacher
LIMIT 1 ;

IF @id >0 OR @invalid_date IS NOT NULL THEN call errorHandler(
 CONCAT('Teacher have a lesson. Date: ', @invalid_date)
);

END IF ;

SELECT id
INTO @id, @invalid_date
FROM event inner join `event_group` on `event`.id = `event_group`.event_id
WHERE schedule_id = sId
AND event.`date` IN dates
AND `event_group`.`group_id` = gId
LIMIT 1 ;

IF @id >0 OR @invalid_date IS NOT NULL THEN call errorHandler(
 CONCAT('Group have a lesson. Date: ', @invalid_date);
);

END IF ;

INSERT INTO event( schedule_id, auditory_id, subject_id, teacher_id, DATE )
SELECT sId, aud, subj, teacher, `dates`.`date` FROM dates;

SELECT COUNT(*) INTO @e_count FROM dates;
DECLATE @last_id INT;
SET @last_id = LAST_INSERTED_ID();

INSERT INTO group_event SELECT @last_id - @e_count + dates.id, gId FROM dates;
END //

DELIMITER ;
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