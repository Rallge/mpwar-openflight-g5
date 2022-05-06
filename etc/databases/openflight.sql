DROP
    DATABASE IF EXISTS `open_flight`;
CREATE
    DATABASE IF NOT EXISTS `open_flight`;
USE `open_flight`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`
(
    `Id`       CHAR(36) NOT NULL,
    `Username` TEXT     NOT NULL,
    `Name`     TEXT     NOT NULL,
    `LastName` TEXT     NOT NULL,
    `Password` TEXT     NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE = InnoDB;

DROP TABLE IF EXISTS `flight`;
CREATE TABLE `flight`
(
    `Id`            CHAR(36)     NOT NULL,
    `Origin`        TEXT         NOT NULL,
    `Destination`   TEXT         NOT NULL,
    `FlightHours`   INT          NOT NULL,
    `Price`         INT          NOT NULL,
    `Currency`      CHAR(5)      NOT NULL,
    `DepartureDate` DATETIME     NOT NULL,
    `Aircraft`      VARCHAR(50)  NOT NULL,
    `Airline`       VARCHAR(50)  NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE = InnoDB;