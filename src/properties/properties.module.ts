import { Module } from '@nestjs/common';
import { PropertyService } from './properties.service';
import { PropertyController } from './properties.controller';
import { PrismaService } from 'src/prismaService';

@Module({
  controllers: [PropertyController],
  providers: [PropertyService, PrismaService],
})
export class PropertiesModule {}
