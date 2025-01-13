/*
  Warnings:

  - You are about to drop the `Animals` table. If the table is not empty, all the data it contains will be lost.

*/
-- DropForeignKey
ALTER TABLE "Animals" DROP CONSTRAINT "Animals_property_id_fkey";

-- DropTable
DROP TABLE "Animals";

-- CreateTable
CREATE TABLE "Cattle" (
    "id" UUID NOT NULL,
    "avatar" TEXT NOT NULL,
    "origin_id" TEXT NOT NULL,
    "property_id" TEXT NOT NULL,
    "gender" TEXT NOT NULL,
    "discription" TEXT NOT NULL,
    "identification_number" INTEGER NOT NULL,
    "date_of_birth" TIMESTAMP(3) NOT NULL,
    "created_at" TIMESTAMP(3) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" TIMESTAMP(3) NOT NULL,

    CONSTRAINT "Cattle_pkey" PRIMARY KEY ("id")
);

-- AddForeignKey
ALTER TABLE "Cattle" ADD CONSTRAINT "Cattle_property_id_fkey" FOREIGN KEY ("property_id") REFERENCES "Properties"("id") ON DELETE RESTRICT ON UPDATE CASCADE;
