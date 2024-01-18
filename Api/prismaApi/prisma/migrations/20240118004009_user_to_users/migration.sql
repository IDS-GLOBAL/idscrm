/*
  Warnings:

  - You are about to drop the `user` table. If the table is not empty, all the data it contains will be lost.

*/
-- DropIndex
DROP INDEX `Dealers_userId_fkey` ON `dealers`;

-- DropIndex
DROP INDEX `DealersContent_dealerId_fkey` ON `dealerscontent`;

-- DropIndex
DROP INDEX `News_userId_fkey` ON `news`;

-- DropIndex
DROP INDEX `Post_userId_fkey` ON `post`;

-- DropIndex
DROP INDEX `VehiclesFeatures_vehicleId_fkey` ON `vehiclesfeatures`;

-- DropTable
DROP TABLE `user`;

-- CreateTable
CREATE TABLE `Users` (
    `Id` INTEGER NOT NULL AUTO_INCREMENT,
    `uuid` VARCHAR(191) NOT NULL,
    `role` VARCHAR(191) NOT NULL DEFAULT 'USER',
    `email` VARCHAR(191) NOT NULL,
    `name` VARCHAR(191) NULL,
    `firstName` VARCHAR(191) NOT NULL,
    `lastName` VARCHAR(191) NOT NULL,
    `password` VARCHAR(191) NOT NULL,
    `usrImage` VARCHAR(191) NOT NULL,
    `created_at` DATETIME(3) NULL DEFAULT CURRENT_TIMESTAMP(3),

    UNIQUE INDEX `Users_uuid_key`(`uuid`),
    UNIQUE INDEX `Users_email_key`(`email`),
    PRIMARY KEY (`Id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- AddForeignKey
ALTER TABLE `Dealers` ADD CONSTRAINT `Dealers_userId_fkey` FOREIGN KEY (`userId`) REFERENCES `Users`(`Id`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- AddForeignKey
ALTER TABLE `DealersContent` ADD CONSTRAINT `DealersContent_dealerId_fkey` FOREIGN KEY (`dealerId`) REFERENCES `Dealers`(`Id`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- AddForeignKey
ALTER TABLE `Post` ADD CONSTRAINT `Post_userId_fkey` FOREIGN KEY (`userId`) REFERENCES `Users`(`Id`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- AddForeignKey
ALTER TABLE `News` ADD CONSTRAINT `News_userId_fkey` FOREIGN KEY (`userId`) REFERENCES `Users`(`Id`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- AddForeignKey
ALTER TABLE `VehiclesFeatures` ADD CONSTRAINT `VehiclesFeatures_vehicleId_fkey` FOREIGN KEY (`vehicleId`) REFERENCES `Vehicles`(`vid`) ON DELETE RESTRICT ON UPDATE CASCADE;
